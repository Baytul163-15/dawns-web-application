<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Category;
use DB;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title','id')->all();
        $categories = Category::all();       
        return view('backend.menu.menuTreeview',compact('menus','allMenus','categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required',
        ]);

        $menu = new Menu();

        $menu->title            = $request->title;
        $menu->parent_id             = $request->parent_id;
        $menu->category_id             = $request->category_id;
        $menu->slug          = $request->slug;
        $menu->class          = $request->class;

        // Default image
        $defaultImage = $request->file('default_image');
        if ($defaultImage) {
            $imageName = time() . '_' . uniqid() . '.' . $defaultImage->getClientOriginalExtension();
            $defaultImage->move(base_path('uploaded/product'), $imageName);
            $menu->default_image = '/uploaded/product/' . $imageName;
        }

        $menu->save();

        $notification = array(
            'message' => 'Menu created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'title' => 'required',
        ]);

        $menu = Menu::find($id);

        $menu->title            = $request->title;
        $menu->parent_id             = $request->parent_id;
        $menu->category_id             = $request->category_id;
        $menu->slug          = $request->slug;
        $menu->class          = $request->class;

        // Default image
        $defaultImage = $request->file('default_image');
        if ($defaultImage) {
            $image_path = base_path($menu->default_image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $defaultImage->getClientOriginalExtension();
            $defaultImage->move(base_path('uploaded/product'), $imageName);
            $menu->default_image = '/uploaded/product/' . $imageName;
        }

        $menu->save();

        $notification = array(
            'message' => 'Menu updated successfully!',
            'alert-type' => 'success'
        );

        return view('backend.menu.menuTreeview')->with($notification);
    }

    public function show()
    {
        $menus = Menu::where('parent_id', '=', 0)->get();
        return view('backend.menu.dynamicMenu',compact('menus'));
    }

    public function edit(Menu $menu)
    {
        $menus = Menu::where('parent_id', '=', 0)->get();
        $allMenus = Menu::pluck('title','id')->all();
        $categories = Category::all();
        return view('backend.menu.edit', compact('menu','menus','allMenus','categories'));
    }

    public function destroy($id)
    {   
        $menu = Menu::find($id);
        $menu->delete();

        return back()->with('success', 'Menu deleted successfully.');
    }

    public function SearchautoComplete(Request $request)
    {
        $query = $request->get('term','');
        $products = Product::where('product_name','LIKE','%'.$query.'%')->where('status','1')->get();

        $data = [];
        foreach ($products as $items) {
            $data[] = [
                'value' => $items->product_name,
                'id' => $items->id
            ];
        }
        if(count($data))
        {
            return $data;
        }
        else
        {
            return ['value'=>'No Result Found','id'=>''];
        }
    }

    public function result(Request $request)
    {
        $searchingdata = $request->input('search_product');
        $products = Product::where('product_name','LIKE','%'.$searchingdata.'%')->where('status','1')->first();

        if ($products) 
        {   
            // echo "Hello";
            return redirect('product/details/'.$products->id);
            // if(isset($_POST['searchbtn']))
            // {
            //     return redirect('product/details/'.$products->id);
            // }
            // else
            // {
            //     redirect('product/details/'.$products->id);
            // }
        }
        else
        {
            //return redirect('/')-with('status','Product Not Available');
            $notification = array(
            'message' => 'Product not found!',
            'alert-type' => 'Danger'
        );
        return redirect()->back()->with($notification);
        }
    }

    public function refillData($id)
    {   
        // echo $id;
        $data = OrderDetail::where('order_id', '=', $id)->get();
        return response()->json($data);
    }

    public function ViewBannerDetails1($id){
        $categories = Category::latest()->get();
        $products = Product::where('status',1)->where('brand_id',$id)->orderBy('id','DESC')->get();
        // dd($products);
        return view('frontend.banner_details',compact('products','categories')); 
    }
}

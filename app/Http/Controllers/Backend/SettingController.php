<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Validator;
use App\Models\Brand;

class settingController extends Controller 
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Setting::latest()->get();
        return view('backend.setting.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'setting_name' => 'required|unique:settings,setting_name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Setting;
        $data->setting_name = $request->setting_name;
        $image = $request->file('setting_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(base_path('uploaded/setting'), $imageName);
            $data->setting_logo = '/uploaded/setting/' . $imageName;
        }
        $data->save();
        
        $notification = array(
            'message' => 'Setting created successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::latest()->get();
        $data = Setting::find($id);
        return view('backend.setting.edit', compact('data','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'setting_name' => 'required|unique:settings,setting_name,'.$id,
        ]);
        $data = Setting::find($id);
        $data->setting_name = $request->setting_name;
        $data->header_title = $request->header_title;
        $data->header_phone1 = $request->header_phone1;
        $data->header_phone2 = $request->header_phone2;
        $data->brand_id_1 = $request->brand_id_1;
        $data->brand_id_2 = $request->brand_id_2;
        $data->brand_id_3 = $request->brand_id_3;
        $data->email = $request->email;
        $data->working_hour = $request->working_hour;
        $data->footer_social_link1 = $request->footer_social_link1;
        $data->footer_social_link2 = $request->footer_social_link2;
        $data->footer_social_link3 = $request->footer_social_link3;
        $data->how_to_order = $request->how_to_order;
        $data->about_us = $request->about_us;
        $data->policy = $request->policy;
        $data->footer_copyright = $request->footer_copyright;
        
        $image = $request->file('setting_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->setting_logo;
            @unlink(base_path($image_path));
            $image->move(base_path('uploaded/setting'), $imageName);
            $data->setting_logo = '/uploaded/setting/' . $imageName;
        }

        $image = $request->file('slider1');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->slider1;
            @unlink(base_path($image_path));
            $image->move(base_path('uploaded/setting'), $imageName);
            $data->slider1 = '/uploaded/setting/' . $imageName;
        }

        $image = $request->file('slider2');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->slider2;
            @unlink(base_path($image_path));
            $image->move(base_path('uploaded/setting'), $imageName);
            $data->slider2 = '/uploaded/setting/' . $imageName;
        }

        $image = $request->file('slider3');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->slider3;
            @unlink(base_path($image_path));
            $image->move(base_path('uploaded/setting'), $imageName);
            $data->slider3 = '/uploaded/setting/' . $imageName;
        }

        $image = $request->file('home_banner_1');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->home_banner_1;
            @unlink(base_path($image_path));
            $image->move(base_path('uploaded/setting'), $imageName);
            $data->home_banner_1 = '/uploaded/setting/' . $imageName;
        }

        $image = $request->file('home_banner_2');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->home_banner_2;
            @unlink(base_path($image_path));
            $image->move(base_path('uploaded/setting'), $imageName);
            $data->home_banner_2 = '/uploaded/setting/' . $imageName;
        }

        $image = $request->file('home_banner_3');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->home_banner_3;
            @unlink(base_path($image_path));
            $image->move(base_path('uploaded/setting'), $imageName);
            $data->home_banner_3 = '/uploaded/setting/' . $imageName;
        }

        $data->save();
        
        $notification = array(
            'message' => 'Setting updated successfully!',
            'alert-type' => 'success'
        );
        // return response()->json(['success' => 'Setting updated successfully!']);
        
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Setting::find($id);
        $image_path = $data->setting_logo;
        @unlink(base_path($image_path));
        $data->delete();

        $notification = array(
            'message' => 'Setting deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
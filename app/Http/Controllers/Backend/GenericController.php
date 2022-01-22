<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Generic;
use Validator;

class genericController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Generic::latest()->get();
        return view('backend.generic.index-generic', compact('data'));
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
            'generic_name' => 'required|unique:generics,generic_name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Generic;
        $data->generic_name = $request->generic_name;
        $image = $request->file('generic_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/generic'), $imageName);
            $data->generic_logo = '/uploaded/generic/' . $imageName;
        }
        $data->save();
        
        $notification = array(
            'message' => 'Generic created successfully!',
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
        $data = Generic::find($id);
        return view('backend.generic.edit-generic', compact('data'));
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
            'generic_name' => 'required|unique:generics,generic_name,'.$id,
        ]);
        $data = Generic::find($id);
        $data->generic_name = $request->generic_name;
        $image = $request->file('generic_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->generic_logo;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/generic'), $imageName);
            $data->generic_logo = '/uploaded/generic/' . $imageName;
        }
        $data->save();
        
        $notification = array(
            'message' => 'generic updated successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('generic.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Generic::find($id);
        $image_path = $data->generic_logo;
        @unlink(public_path($image_path));
        $data->delete();

        $notification = array(
            'message' => 'generic deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
@extends('backend.layouts.master')
@section('title','Setting')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Setting</li>
    </ol>
    <h1 class="page-header">Setting</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Setting List</h4>
                    <div class="panel-heading-btn">
                        <a href="#" class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#addmodal"><i class="fa fa-plus-circle"></i> Add New</a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Setting Name</th>
                                <th class="text-nowrap">setting Logo</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->setting_name}}</td>
                                <td><img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;" id="showDefaultImage" src="@if(!empty($row->setting_logo)) {{asset($row->setting_logo)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="image"></td>
                                <td>
                                    <a href="{{route('setting.edit',$row->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a id="delete" href="{{route('setting.destroy',$row->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setting Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('setting.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Site Name</label>
                        <input type="text" name="setting_name" placeholder="setting name" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('setting_name'))?($errors->first('setting_name')):''}}</div>
                    </div>
                    <div class="form-group">
                        <label for="">Setting Logo</label>
                        <input id="noImage" type="file" name="setting_logo" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('setting_logo'))?($errors->first('setting_logo')):''}}</div>
                    </div>
                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset('defaults/noimage/no_img.jpg')}}" alt="image">

                    <div class="form-group">
                        <label for="">Header Title</label>
                        <input type="text" name="header_title" placeholder="header_title" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('header_title'))?($errors->first('header_title')):''}}</div>
                    </div>

                    <div class="form-group">
                        <label for="">header_phone1</label>
                        <input type="text" name="header_title" placeholder="header_phone1" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('header_phone1'))?($errors->first('header_phone1')):''}}</div>
                    </div>

                    <div class="form-group">
                        <label for="">header_phone2</label>
                        <input type="text" name="header_title" placeholder="header_phone2" class="form-control">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('header_phone2'))?($errors->first('header_phone2')):''}}</div>
                    </div>

                    <div class="form-group">
                        <label for="">slider1</label>
                        <input id="slider1" type="file" name="slider1" class="form-control">
                        <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;" id="slider1" src="{{asset('defaults/noimage/no_img.jpg')}}" alt="image">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('slider1'))?($errors->first('slider1')):''}}</div>
                    </div>

                    <div class="form-group">
                        <label for="">slider2</label>
                        <input id="slider2" type="file" name="slider2" class="form-control">
                        <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;" id="slider2" src="{{asset('defaults/noimage/no_img.jpg')}}" alt="image">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('slider2'))?($errors->first('slider2')):''}}</div>
                    </div>

                    <div class="form-group">
                        <label for="">slider3</label>
                        <input id="slider3" type="file" name="slider3" class="form-control">
                        <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;" id="slider3" src="{{asset('defaults/noimage/no_img.jpg')}}" alt="image">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('slider3'))?($errors->first('slider3')):''}}</div>
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
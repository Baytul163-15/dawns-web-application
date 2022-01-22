@extends('backend.layouts.master')
@section('title','Prescription Upload')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Prescription Upload</li>
    </ol>
    <h1 class="page-header">Prescription Upload</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Newslater List</h4>
                    <div class="panel-heading-btn">
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
                                <th class="text-nowrap">Name</th>
                                <th class="text-nowrap">Mobile</th>
                                <th class="text-nowrap">Email</th>
                                <th class="text-nowrap">Preview</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->mobile}}</td>
                                <td>{{$row->email}}</td>
                                <td><img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;" id="showDefaultImage" src="@if(!empty($row->file)) {{asset($row->file)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="image"></td>
                                <td>
                                    <a target="_blank" href="@if(!empty($row->file)) {{asset($row->file)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" class="btn btn-info btn-xs"> View</a>
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
@endsection
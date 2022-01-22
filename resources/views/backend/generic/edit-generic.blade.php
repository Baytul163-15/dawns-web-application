@extends('backend.layouts.master')
@section('title','Edit Generic')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('generic.index')}}">Generic Name</a></li>
        <li class="breadcrumb-item active">Edit Generics</li>
    </ol>
    <h1 class="page-header">generics</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Edit Generic Name</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('generic.index') }}" class="btn btn-info btn-xs mr-2"><i class="fa fa-tags"></i> Generic Name</a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{route('generic.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Generic Name</label>
                                    <input type="text" name="generic_name" value="{{$data->generic_name}}" placeholder="generic name" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('generic_name'))?($errors->first('generic_name')):''}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="">Generic Logo</label>
                                    <input id="noImage" type="file" name="generic_logo" class="form-control">
                                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset($data->generic_logo)}}" alt="image">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('generic_logo'))?($errors->first('generic_logo')):''}}</div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
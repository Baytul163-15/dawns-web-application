@extends('backend.layouts.master')
@section('title','Menu')
@section('content')
<style>
  label {
    font-weight: bold;
    font-size: 14px;
  }

  p,
  span {
    font-size: 14px;
  }
</style>
<div id="content" class="content">
  <ol class="breadcrumb float-xl-right">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('product.index')}}">Products</a></li>
    <li class="breadcrumb-item active">Edit Menu</li>
  </ol>
  <h1 class="page-header">Menu</h1>
  <div class="row">
    <div class="col-12">
      <div class="panel panel-default">

        <div class="panel-heading">
          <h4 class="panel-title">Edit Menu</h4>
          <div class="panel-heading-btn">
            <a href="{{ url('admin/menus') }}" class="btn btn-info btn-xs mr-2"><i class="fa fa-list"></i> Menu Items</a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
          </div>
        </div>

        <div class="panel-body">
        @php
        $cid = request()->route('id');
        $emenu= App\Menu::where('id', '=', $cid)->get();
        @endphp
        <div class="row">
            <div class="col-md-4">
                <h5>Edit Menu Item</h5>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form accept="{{ url('edit-menu') }}/{{ $emenu[0]->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $emenu[0]->title }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control myselect2" name="category_id">
                                    <option value="0">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if( $category->id == $emenu[0]->category_id ) selected @endif >{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Parent</label>
                                <select class="form-control myselect2" name="parent_id">
                                    <option value="0">Select Parent Menu</option>
                                    @foreach($allMenus as $key => $value)
                                        <option value="{{ $key }}" 
                                        @if ( $key == $emenu[0]->parent_id)
                                        selected
                                        @endif
                                         >{{ $value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" value="{{ $emenu[0]->slug }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Class</label>
                                <input type="text" name="class" class="form-control" value="{{ $emenu[0]->class }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Default Image</label>
                                <input id="defaultImage" type="file" name="default_image" class="form-control">
                                <img style="padding:4px;border:1px solid gray; margin: 10px 0; width:100px;" id="showDefaultImage" src="@if(!empty($emenu[0]->default_image)) {{asset($emenu[0]->default_image)}} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt="image">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('default_image'))?($errors->first('default_image')):''}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <h5>Menu Structure</h5>
                <ul id="tree1">
                    @foreach($menus as $menu)
                        <li>
                            {{ $menu->title }}
                            @if(count($menu->childs))
                                @include('menu.manageChild',['childs' => $menu->childs])
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
@endsection
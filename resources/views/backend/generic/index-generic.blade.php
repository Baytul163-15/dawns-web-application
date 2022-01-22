@extends('backend.layouts.master')
@section('title','Generic')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Generic</li>
    </ol>
    <h1 class="page-header">Generic Name</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Generic List</h4>
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
                                <th class="text-nowrap">Generic Name</th>
                                {{-- <th class="text-nowrap">generic Logo</th> --}}
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->generic_name}}</td>
                                {{-- <td><img src="{{asset($row->generic_logo)}}" alt="image" width="60"></td> --}}
                                <td>
                                    <a href="{{route('generic.edit',$row->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a id="delete" href="{{route('generic.destroy',$row->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                       
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
                <h5 class="modal-title" id="exampleModalLabel">Generic Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('generic.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                    <label for="">Generic Name</label>
                    <input type="text" name="generic_name" placeholder="Generic name" class="form-control">
                    <div style='color:red; padding: 0 5px;'>{{($errors->has('generic_name'))?($errors->first('generic_name')):''}}</div>
                    </div>
                    <div class="form-group">
                    <label for="">Generic Logo</label>
                    <input id="noImage" type="file" name="generic_logo" class="form-control">
                    <div style='color:red; padding: 0 5px;'>{{($errors->has('generic_logo'))?($errors->first('generic_logo')):''}}</div>
                    </div>
                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset('defaults/noimage/no_img.jpg')}}" alt="image">
                    
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
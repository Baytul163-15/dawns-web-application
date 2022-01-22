@extends('backend.layouts.master')
@section('title','Edit SettingSetting')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('setting.index')}}">settings</a></li>
        <li class="breadcrumb-item active">Edit Setting</li>
    </ol>
    <h1 class="page-header">Setting</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Edit Setting</h4>
                    <div class="panel-heading-btn">
                        {{-- <a href="{{ route('setting.index') }}" class="btn btn-info btn-xs mr-2"><i class="fa fa-tags"></i> Setting</a> --}}
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{route('setting.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Setting Name</label>
                                    <input type="text" name="setting_name" value="{{$data->setting_name}}" placeholder="Setting name" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('setting_name'))?($errors->first('setting_name')):''}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="">Site Logo</label>
                                    <input id="noImage" type="file" name="setting_logo" class="form-control">
                                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset($data->setting_logo)}}" alt="image">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('setting_logo'))?($errors->first('setting_logo')):''}}</div>
                                </div>
                                

                                <div class="form-group">
                                    <label for="">Header Title</label>
                                    <input type="text" name="header_title" value="{{$data->header_title}}" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('header_title'))?($errors->first('header_title')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Header Phone 1</label>
                                    <input type="text" name="header_phone1" value="{{$data->header_phone1}}" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('header_phone1'))?($errors->first('header_phone1')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Header Phone 2</label>
                                    <input type="text" name="header_phone2" value="{{$data->header_phone2}}" placeholder="header_phone2" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('header_phone2'))?($errors->first('header_phone2')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Slider 1</label>
                                    <input id="slider1" type="file" name="slider1" class="form-control">
                                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset($data->slider1)}}" alt="image">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('slider1'))?($errors->first('slider1')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Slider 2</label>
                                    <input id="slider2" type="file" name="slider2" class="form-control">
                                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset($data->slider2)}}" alt="image">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('slider2'))?($errors->first('slider2')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Slider 3</label>
                                    <input id="slider3" type="file" name="slider3" class="form-control">
                                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset($data->slider3)}}" alt="image">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('slider3'))?($errors->first('slider3')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Home Banner 1</label>
                                    <input id="home_banner_1" type="file" name="home_banner_1" class="form-control">
                                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset($data->home_banner_1)}}" alt="image">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('home_banner_1'))?($errors->first('home_banner_1')):''}}</div>
                                </div>

                                {{-- //brand select 1--}}
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id_1" id="brand_id_1" class="form-control" >

                                            <option value="" selected="" disabled="">Select brand</option>
                                            @foreach ($brands as $brand )
                                            <option value="{{ $brand->id }}" {{ $brand->id==$data->brand_id_1 ? 'selected': '' }}>{{ $brand->brand_name }}</option>
                                            @endforeach

                                        </select>

                                        @error('brand_id_1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Home Banner 2</label>
                                    <input id="home_banner_2" type="file" name="home_banner_2" class="form-control">
                                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset($data->home_banner_2)}}" alt="image">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('home_banner_2'))?($errors->first('home_banner_2')):''}}</div>
                                </div>

                                {{-- //brand select 2 --}}
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id_2" id="brand_id_2" class="form-control" >

                                            <option value="" selected="" disabled="">Select brand</option>
                                            @foreach ($brands as $brand )
                                            <option value="{{ $brand->id }}" {{ $brand->id==$data->brand_id_2 ? 'selected': '' }}>{{ $brand->brand_name }}</option>
                                            @endforeach

                                        </select>

                                        @error('brand_id_2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Home Banner 3</label>
                                    <input id="home_banner_3" type="file" name="home_banner_3" class="form-control">
                                    <img style="padding:4px;border:1px solid #ddd; margin: 10px 0; width:100px;" id="showNoImage" src="{{asset($data->home_banner_3)}}" alt="image">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('home_banner_3'))?($errors->first('home_banner_3')):''}}</div>
                                </div>

                                {{-- //brand select 3 --}}
                                <div class="form-group">
                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="brand_id_3" id="brand_id_3" class="form-control" >

                                            <option value="" selected="" disabled="">Select brand</option>
                                            @foreach ($brands as $brand )
                                            <option value="{{ $brand->id }}" {{ $brand->id==$data->brand_id_3 ? 'selected': '' }}>{{ $brand->brand_name }}</option>
                                            @endforeach

                                        </select>

                                        @error('brand_id_3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="{{$data->email}}" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Working Hour</label>
                                    <input type="text" name="working_hour" value="{{$data->working_hour}}" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('working_hour'))?($errors->first('working_hour')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Footer Social Link 1 (Facebook)</label>
                                    <input type="text" name="footer_social_link1" value="{{$data->footer_social_link1}}" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('footer_social_link1'))?($errors->first('footer_social_link1')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Footer Social Link 2 (Linkedin)</label>
                                    <input type="text" name="footer_social_link2" value="{{$data->footer_social_link2}}" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('footer_social_link2'))?($errors->first('footer_social_link2')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Footer Social Link 3 (Youtube)</label>
                                    <input type="text" name="footer_social_link3" value="{{$data->footer_social_link3}}" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('footer_social_link3'))?($errors->first('footer_social_link3')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">How To Order</label>
                                    <textarea class="summernote" name="how_to_order">{{$data->how_to_order}}</textarea>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('how_to_order'))?($errors->first('how_to_order')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Policy</label>
                                    <textarea class="summernote" name="policy">{{$data->policy}}</textarea>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('policy'))?($errors->first('policy')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">About Us</label>
                                    <textarea class="summernote" name="about_us">{{$data->about_us}}</textarea>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('about_us'))?($errors->first('about_us')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <label for="">Footer Copyright</label>
                                    <textarea class="summernote" name="footer_copyright">{{$data->footer_copyright}}</textarea>
                                            <div style='color:red; padding: 0 5px;'>{{($errors->has('footer_copyright'))?($errors->first('footer_copyright')):''}}</div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
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
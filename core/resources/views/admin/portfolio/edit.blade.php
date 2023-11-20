@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ __('Blogs') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i>{{ __('Home') }}</a></li>
            <li class="breadcrumb-item">{{ __('Blogs') }}</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1">{{ __('Edit Blog Category') }}</h3>
                                <div class="card-tools">
                                    <a href="{{ route('admin.portfolio.index'). '?language=' . $currentLang->code }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> {{ __('Back') }}
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">{{ __('Language') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id" id="blog_lan">
                                                <option value="" selected disabled>Select a Language</option>
                                                @foreach($langs as $lang)
                                                    <option value="{{$lang->id}}" {{ $portfolio->language_id == $lang->id ? 'selected' : '' }} >{{$lang->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('language_id'))
                                                <p class="text-danger"> {{ $errors->first('language_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label">{{ __('Slider Image ') }}</label>
        
                                        <div class="col-sm-10">
                                            @foreach ($sliders as $slider)
                                            <div class="edit-slider">
                                                <img class="mb-2 show-img img-demo" src="{{ asset('assets/front/img/portfolio/'.$slider->image) }}" alt="">
                                                <div class="icheck-danger d-inline mr-2">
                                                <input type="checkbox" id="{{ $slider->id }}" name="sliders[]"  value="{{ $slider->id }}">
                                                    <label for="{{ $slider->id }}">{{ __('Delete') }}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="custom-file h80 drop-img mt-3">
                                                <label class="custom-file-label h80 " for="image"><h5 class="text-center">{{ __('Drop Or Select multiple image at a time') }}</h5></label>
                                                <input type="file" multiple class="custom-file-input h80" name="image[]" id="image">
                                            </div>
                                            
                                            @if ($errors->has('image'))
                                                <p class="text-danger"> {{ $errors->first('image') }} </p>
                                            @endif
                                            <p class="help-block text-info">{{ __('Upload 710X400 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="featured_image" class="col-sm-2 control-label">{{ __('Featured Image') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mb-3 mw-400 show-img img-demo" src="{{ asset('assets/front/img/portfolio/'.$portfolio->featured_image) }}" alt="">
                                            <div class="custom-file">
                                                <label for="featured_image" class="custom-file-label">{{ __('Choose New Image') }}</label>
                                                <input type="file" class="custom-file-input up-img" name="featured_image" id="featured_image">
                                            </div>
                                            @if ($errors->has('featured_image'))
                                                <p class="text-danger"> {{ $errors->first('featured_image') }} </p>
                                            @endif
                                            <p class="help-block text-info">{{ __('Upload 710X400 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.') }}
                                            </p>
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label">{{ __('Title') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $portfolio->title }}">
                                            @if ($errors->has('title'))
                                                <p class="text-danger"> {{ $errors->first('title') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="client_name" class="col-sm-2 control-label">{{ __('Client Name') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="client_name" placeholder="Client Name" value="{{ $portfolio->client_name }}">
                                            @if ($errors->has('client_name'))
                                                <p class="text-danger"> {{ $errors->first('client_name') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bcategory_id" class="col-sm-2 control-label">{{ __('Category') }}<span class="text-danger">*</span></label>
                                
                                        <div class="col-sm-10">
                                            <select class="form-control" name="service_id" id="service_id">
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" {{ $service->id == $portfolio->service_id ? 'selected' : '' }} >{{ $service->title }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('service_id'))
                                                <p class="text-danger"> {{ $errors->first('service_id') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="start_date" class="col-sm-2 control-label">{{ __('Start Date') }}<span class="text-danger">*</span></label>
                                        <div class="input-group col-sm-10">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="start_date" id="start_date" placeholder="{{ __('Start Date') }}" value="{{ $portfolio->start_date }}">
                                            @if ($errors->has('start_date'))
                                                <p class="text-danger"> {{ $errors->first('start_date') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="submission_date" class="col-sm-2 control-label">{{ __('Submission Date') }}<span class="text-danger">*</span></label>
        
                                            <div class="input-group col-sm-10">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="submission_date" id="submission_date" placeholder="{{ __('Submission Date') }}" value="{{ $portfolio->submission_date }}">
                                                @if ($errors->has('submission_date'))
                                                    <p class="text-danger"> {{ $errors->first('submission_date') }} </p>
                                                @endif
                                            </div>
                                    </div>
                                    
                                <div class="form-group row">
                                    <label for="client_name" class="col-sm-2 control-label">{{ __('Live Link') }}</label>
    
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="link" placeholder="Live Link" value="{{ $portfolio->link }}">
                                        @if ($errors->has('link'))
                                            <p class="text-danger"> {{ $errors->first('link') }} </p>
                                        @endif
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">{{ __('Status') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                               <option value="" selected disabled>{{ __('Select a Status') }}</option>
                                               <option value="0" {{ $portfolio->status == 0 ? 'selected' : '' }} >{{ __('In Progress') }}</option>
                                               <option value="1"  {{ $portfolio->status == 1 ? 'selected' : '' }}>{{ __('Completed') }}</option>
                                              </select>
                                            @if ($errors->has('status'))
                                                <p class="text-danger"> {{ $errors->first('status') }} </p>
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="form-group row">
                                        <label for="content" class="col-sm-2 control-label">{{ __('Content') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <textarea name="content" class="form-control summernote"  rows="4" placeholder="{{ __('Description') }}">{{ $portfolio->content }}</textarea>
                                            @if ($errors->has('content'))
                                                <p class="text-danger"> {{ $errors->first('content') }} </p>
                                            @endif
                                        </div>
                                    </div>
    
                                    <div class="form-group row">
                                        <label for="meta_keywords" class="col-sm-2 control-label">{{ __('Meta Keywords') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" data-role="tagsinput" name="meta_keywords" placeholder="{{ __('Meta Keywords') }}" value="{{ $portfolio->meta_keywords }}">
                                            @if ($errors->has('meta_keywords'))
                                                <p class="text-danger"> {{ $errors->first('meta_keywords') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_description" class="col-sm-2 control-label">{{ __('Meta Description') }}</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="meta_description" placeholder="{{ __('Meta Description') }}"  rows="4">{{ $portfolio->meta_description }}</textarea>
                                            @if ($errors->has('meta_description'))
                                                <p class="text-danger"> {{ $errors->first('meta_description') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label">{{ __('Order') }}<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="serial_number" placeholder="{{ __('Order') }}" value="{{ $portfolio->serial_number }}">
                                            @if ($errors->has('serial_number'))
                                                <p class="text-danger"> {{ $errors->first('serial_number') }} </p>
                                            @endif
                                        </div>
                                    </div>
                                


                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                        </div>
                                    </div>
                                
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
@endsection

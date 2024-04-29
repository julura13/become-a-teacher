@extends('layouts.main') 
@section('title', 'Add Pathway')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Edit Pathway')}}</h5>
                            <span>{{ __('Change the pathway')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Edit Pathway')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3>{{ __('Edit pathway')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="/pathway/update" >
                        @csrf
                            
                        <div class="row">
                            <div class="col-sm-6">

                                <input type="hidden" name="id" value="{{ $pathway->id }}">
                                <div class="form-group">
                                    <label for="name">{{ __('Pathway name')}}<span class="text-red">*</span></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ clean($pathway->name, 'titles')}}" placeholder="Enter pathway name" required>
                                    <div class="help-block with-errors"></div>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('Description')}}<span class="text-red">*</span></label>
                                    <textarea id="description" class="form-control tw-pl-3 @error('description') is-invalid @enderror" name="description" value="" placeholder="Enter pathway description" required>{{ $pathway->description }}</textarea>
                                    <div class="help-block with-errors" ></div>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="more_info">{{ __('More information')}}<span class="text-red">*</span></label>
                                    <textarea id="more_info" class="form-control tw-pl-3 @error('more_info') is-invalid @enderror" name="more_info" value="{{ old('more_info') }}" placeholder="Enter pathway additional information" required>{{ $pathway->more_info }}</textarea>
                                    <div class="help-block with-errors" ></div>

                                    @error('more_info')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> 
                                
                                <div class="col-sm-6">
                                    <h1>Requirement<span class="text-red">*</span></h1>
                                    <div class="form-group">
                                        <label class="tw-text-lg" for="any_one[]">{{ __('Any one')}}</label><br>
                                        @foreach ($categories as $category)
                                            <label class="tw-font-bold">{{ $category->name }}</label>
                                            <br>
                                            @foreach ($courses as $course)
                                            {!! ($course->category == $category->id) ? "<input type='checkbox' class='tw-mr-3' name='any_one[]' value='$course->id'>$course->name $course->level<br>" : "" !!}
                                            @endforeach
                                            <br>
                                        @endforeach
                                    </div>                        
                                </div>
    
                                <div class="col-sm-6">
                                    <h1>Requirement<span class="text-red">*</span></h1>
                                    <div class="form-group">
                                        <label class="tw-text-lg" for="any_two[]">{{ __('Any two')}}</label><br>
                                        @foreach ($categories as $category)
                                            <label class="tw-font-bold">{{ $category->name }}</label>
                                            <br>
                                            @foreach ($courses as $course)
                                            {!! ($course->category == $category->id) ? "<input type='checkbox' class='tw-mr-3' name='any_two[]' value='$course->id'>$course->name $course->level<br>" : "" !!}
                                            @endforeach
                                            <br>
                                        @endforeach
                                    </div>                        
                                </div>
                            
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit')}}</button>
                                </div>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script') 
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
         <!--get role wise permissiom ajax script-->
        <script src="{{ asset('js/get-role.js') }}"></script>
    @endpush
@endsection

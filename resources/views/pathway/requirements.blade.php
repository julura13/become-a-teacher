@extends('layouts.main') 
@section('title', 'Pathway Requirements')
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
                            <h5>{{ __('Pathway Requirements')}}</h5>
                            <span>{{ __('Create pathway requirements')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            {{-- <li class="breadcrumb-item">
                                <a href="#">{{ __('Add Pathway')}}</a>
                            </li> --}}
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
                        <h3>{{ __('Pathway requirements')}}</h3>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-sm-6">

                                <input type="hidden" name="id" value="{{ $pathway->id }}">
                                <div class="form-group">
                                    <label for="name">{{ __('Pathway name')}}</label>
                                    <input readonly id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ clean($pathway->name, 'titles')}}" placeholder="Enter pathway name" required>
                                    <div class="help-block with-errors"></div>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ __('Description')}}</label>
                                    <textarea readonly id="description" class="form-control tw-pl-3 @error('description') is-invalid @enderror" name="description" value="" placeholder="Enter pathway description" required>{{ $pathway->description }}</textarea>
                                    <div class="help-block with-errors" ></div>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>    
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col">
                                <div class="tw-flex tw-justify-between">
                                    <div>
                                        <h1 class="tw-text-base ">Requirements</h1>
                                    </div>
                                    <div>
                                        <button type="button" class="tw-rounded tw-bg-blue-500 tw-px-2 tw-py-1 tw-text-white tw-mt-2 hover:tw-bg-blue-700" data-toggle="modal" data-target="#formModal" data-pathway_id="{{ $pathway->id }}" onclick="requirementModal('{{ $pathway->id }}', '{{ $pathway->name }}')"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                @if (count($pathway->requirement) == 0)
                                    <div class="tw-text-center">
                                        <h4 class="tw-text-gray-400">No requirements yet</h4>
                                    </div>
                                @else
                                <table class="table">
                                    <tr>
                                        <td class="tw-font-bold">Course 1</td>
                                        <td class="tw-font-bold">Course 2</td>
                                        <td class="tw-font-bold">Course 3</td>
                                        <td class="tw-font-bold">Actions</td>
                                    </tr>
                                    @foreach ($pathway->requirement as $requirement)
                                    <tr>
                                        <td>{{ $requirement->course_1_name }}</td>
                                        <td>{{ $requirement->course_2_name }}</td>
                                        <td>{{ $requirement->course_3_name }}</td>
                                        <td>
                                            <a href="/requirement/delete/{{ $requirement->id }}" class="tw-rounded tw-px-2 tw-py-1 tw-bg-red-500 tw-text-white"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                        
                                    @endforeach
                                </table>    
                                @endif
                                       
                            </div>

                            </div>

                        {{-- <div class="row">
                            <div class="col-md-12 tw-mt-5">
                                <div class="form-group tw-ml-0">
                                    <button type="submit" class="btn btn-primary">{{ __('Submit')}}</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" style="display: none" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Requirements</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                @foreach ($categories as $category)

                                    <ul class="tw-mb-1">
                                        <li class="tw-font-bold tw-cursor-pointer"  onclick="listMore({{ $category->id }})">
                                            <i class="far fa-plus-square tw-mr-1" id="not_selected_{{ $category->id }}"></i>
                                            <i class="far fa-minus-square tw-mr-1 tw-hidden" id="selected_{{ $category->id }}"></i>
                                            {{ $category->name }}
                                        </li>
                                    </ul>
                                    <ul class="tw-ml-5 tw-hidden" id="courses_{{ $category->id }}">
                                    @foreach ($category->courses as $course)
                                        <li class="tw-cursor-pointer" onclick="selectCourse({{ $course->id }}, '{{ $course->name . ' - ' . $course->level }}', '{{ $course->name }}')">
                                            <i class="far fa-square" id="course_not_selected_{{ $course->id }}"></i>
                                            <i class="far fa-check-square tw-hidden" id="course_selected_{{ $course->id }}"></i>
                                            {{ $course->name . " - " . $course->level }}
                                        </li>
                                    @endforeach
                                    </ul>
                                    
                                    @endforeach
                                </div>

                            </div>
                        </div>     
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="saveRequirement()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- push external js -->
<script>
    function requirementModal(id, name) {
        console.log(name);
    }


            function saveRequirement() {
                let pathway_name = $("input[name='name']").val();
                // console.log(pathway_name);
                let pathway_id = $("input[name='id']").val();
                // console.log(pathway_id);

                axios.post('/requirements/add', {
                    pathway_id: pathway_id,
                    pathway_name: pathway_name,
                    course_list: courseList,
                    course_names: courseNames
                })
                .then(function (response) {
                    console.log(response);
                    $("#closeBtn").trigger("click");
                    location.reload(); 
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
</script>

    @push('script') 
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
         <!--get role wise permissiom ajax script-->
        <script src="{{ asset('js/get-role.js') }}"></script>
    @endpush
@endsection

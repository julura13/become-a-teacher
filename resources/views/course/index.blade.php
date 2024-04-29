@extends('layouts.main') 
@section('title', 'Courses')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        {{-- <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}"> --}}
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Courses')}}</h5>
                            <span>{{ __('List of courses')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Courses')}}</a>
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
                <div class="card p-3">
                    <div class="card-header tw-flex tw-justify-between">
                        <h3>{{ __('Courses')}}</h3>
                        <a href="/create/course" class="btn btn-primary btn-sm">+</a>
                    </div>
                    <div class="card-body">
                        <livewire:courses-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script> --}}
    <!--server side courses table script-->
    <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
@endsection

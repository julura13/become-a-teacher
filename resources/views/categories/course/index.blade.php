@extends('layouts.main') 
@section('title', 'Categories')
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
                            <h5>{{ __('Categories')}}</h5>
                            <span>{{ __('List of categories')}}</span>
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
                                <a href="#">{{ __('Categories')}}</a>
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
                        <h3>{{ __('Categories')}}</h3>
                        <a href="/create/category" class="btn btn-primary btn-sm">+</a>
                    </div>
                    <div class="card-body">
                        <livewire:course-categories-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script> --}}
    <!--server side categories table script-->
    <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
@endsection

@extends('layouts.dashboard')

@section('page_title')
    {{ __('dashboard.layout.home') }}
@endsection
@section('content')
    <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row"> <!--begin::Col-->

                <div class="col-lg-4 col-6"> <!--begin::Small Box Widget 1-->
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3>{{ $admins }}</h3>
                            <p>{{ __('dashboard.home.admins') }}</p>
                        </div>
                        <div class="small-box-icon">
                            <i class="bi bi-person-fill-check" fill="currentColor"></i>
                        </div>
                        <a href="{{ route('admins.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            {{ __('dashboard.home.more') }} <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>

                <div class="col-lg-4 col-6"> <!--begin::Small Box Widget 1-->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ $categories }}</h3>
                            <p>{{ __('dashboard.home.categories') }}</p>
                        </div>
                        <div class="small-box-icon">
                            <i class="fa-solid fa-tags" fill="currentColor"></i>
                        </div>
                        <a href="{{ route('categories.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            {{ __('dashboard.home.more') }} <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>

                <div class="col-lg-4 col-6"> <!--begin::Small Box Widget 1-->
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>{{ $items }}</h3>
                            <p>{{ __('dashboard.home.items') }}</p>
                        </div>
                        <div class="small-box-icon">
                            <i class="fa-solid bi bi-shield-check" fill="currentColor"></i>
                        </div>
                        <a href="{{ route('items.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            {{ __('dashboard.home.more') }} <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>

                <div class="col-lg-8 col-6"> <!--begin::Small Box Widget 1-->
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ $reports }}</h3>
                            <p>{{ __('dashboard.home.reports') }}</p>
                        </div>
                        <div class="small-box-icon">
                            <i class="fa-solid fa-file-invoice" fill="currentColor"></i>
                        </div>
                        <a href="{{ route('reports.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            {{ __('dashboard.home.more') }} <i class="bi bi-link-45deg"></i> </a>
                    </div>
                </div>

            </div> <!--end::Row--> <!--begin::Row-->

        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
@endsection

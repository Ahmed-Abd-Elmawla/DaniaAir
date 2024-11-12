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
                    <div class="small-box text-bg-primary">
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
                    <!--end::Small Box Widget 1-->
                </div> <!--end::Col-->

            </div> <!--end::Row--> <!--begin::Row-->

        </div> <!-- /.row (main row) -->
    </div> <!--end::Container-->
@endsection

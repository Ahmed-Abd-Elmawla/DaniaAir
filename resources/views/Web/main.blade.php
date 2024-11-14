
@extends('Web.layouts.webMain')
@section('page_title')
    {{ __('web.home.title') }}
@endsection

@section('content')
          {{-- <img src="{{ asset('assets/images/home.jpg') }}" alt="" srcset=""> --}}
<div class="web-content">
    {{-- <button class="btn web-btn p-2 ps-5 pe-5">{{__('web.home.safety-reports-add')}}</button> --}}
    <div class="row">
        <div class="col-8 web-home" style="background-image: url('{{ asset('assets/images/home.jpg') }}');">
            <div class="overlay d-flex flex-column align-items-center justify-content-center">
                <h1 class="web_main_color">{{__('web.home.h1')}}</h1>
                <h1 class="text-light">{{__('web.home.h2')}}</h1>
            </div>
        </div>

        <div class="col-4 d-flex flex-column align-items-center justify-content-center">
            <a href="{{ route('report.index') }}" class="btn web-home-btn p-2 ps-5 pe-5 mb-3">
                {{ __('web.home.safety-reports-add') }}
            </a>

            @if (Auth::user())
            <a href="{{ route('dashboard') }}" class="btn web-home-btn p-2 ps-5 pe-5">
                {{ __('web.login.dashboard') }}
            </a>
            @else
            <a href="{{ route('login') }}" class="btn web-home-btn p-2 ps-5 pe-5">
                {{ __('web.login.title') }}
            </a>
            @endif
        </div>
    </div>

</div>

@endsection

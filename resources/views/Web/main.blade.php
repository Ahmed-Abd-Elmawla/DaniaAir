
@extends('Web.layouts.webMain')
@section('page_title')
    {{ __('web.home.title') }}
@endsection

@section('content')

<div class="text-center mt-5">
    {{-- <button class="btn web-btn p-2 ps-5 pe-5">{{__('web.home.safety-reports-add')}}</button> --}}
    <a href="{{ route('report.index') }}" class="btn web-btn p-2 ps-5 pe-5">
        {{ __('web.home.safety-reports-add') }}
    </a>
</div>

@endsection

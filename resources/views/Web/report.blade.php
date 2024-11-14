@extends('Web.layouts.webMain')
@section('page_title')
    {{ __('web.report.title') }}
@endsection

@section('content')
    <div class="container mb-5">
        <form class="needs-validation mt-5" id="safetyForm" enctype="multipart/form-data" novalidate>
            {{-- @csrf --}}
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Row-->
                <div class="row g-3">
                    <input type="hidden" id="itemId">
                    <input type="hidden" id="appLocal" value="{{ app()->getLocale() }}">
                    <!--begin::Col-->
                    <div class="col-12 text-center">
                        <h2 class="web_main_color">
                            {{ __('web.report.title') }}
                        </h2>
                    </div>
                    <div>
                        <hr class="opacity-100">
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="web_main_color web_main_font">{{ __('web.report.desc') }}</h4>
                            </div>
                            <div class="col-1 d-flex align-items-center">
                                <h4 class="me-1 web_main_color web_main_font">{{ __('web.report.status') }}</h4>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <h4 class="web_main_color web_main_font">{{ __('web.report.comment') }}</h4>
                            </div>
                        </div>
                    </div>
                    <div>
                        <hr class="opacity-25">
                    </div>

                    @foreach ($categories as $category)
                        <div class="col-12 text-center">
                            <h4 class="web_main_color web_main_font">{{ $loop->iteration }} . {{ $category->name }}</h4>
                        </div>
                        @foreach ($category->items as $item)
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label class="text-wrap" for="status_{{ $item->id }}">
                                            {{ $item->item_desc }}
                                        </label>
                                    </div>

                                    <div class="col-1 d-flex align-items-center">
                                        <label class="web_main_color me-1">{{ __('web.report.yes') }}</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input green-checked" type="radio"
                                                name="status_{{ $item->id }}" value="1" required>
                                        </div>
                                        <label class="web_main_color me-1">{{ __('web.report.no') }}</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input red-checked" type="radio"
                                                name="status_{{ $item->id }}" value="0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex align-items-center">
                                        <input type="text" name="comment_{{ $item->id }}" class="form-control custom-placeholder"
                                            minlength="2" placeholder="{{__('web.report.place_holder')}}" required>
                                        <input type="hidden" name="item_id_{{ $item->id }}"
                                            value="{{ $item->id }}">
                                    </div>
                                    <div class="col-12 text-center">
                                        <span class="invalid-feedback-req" id="reportItems.{{ $item->id }}.status-error"></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="opacity-25">
                        @endforeach
                    @endforeach

                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-6">
                        <label for="inspector_name"
                            class="form-label web_main_color">{{ __('dashboard.layout.inspector_name') }}</label>
                        <input type="text" name="inspector_name" class="form-control" id="inspector_name" minlength="2"
                            required>
                        <span class="invalid-feedback-req" id="inspector_name-error"></span>
                    </div>
                    <div class="col-3">
                        <label for="date" class="form-label web_main_color">{{ __('dashboard.layout.date') }}</label>
                        <input type="date" name="date" class="form-control" id="date" required>
                        <span class="invalid-feedback-req" id="date-error"></span>
                    </div>
                    <div class="col-3">
                        <label for="time" class="form-label web_main_color">{{ __('dashboard.layout.time') }}</label>
                        <input type="time" name="time" class="form-control" id="time" required>
                        <span class="invalid-feedback-req" id="time-error"></span>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <hr class="opacity-25 mt-3">
            </div>
            <div class="col-12 mt-4 text-center">
                <button id="CreateFormSubmit" onclick="submitReport(event)"
                    class="btn web-btn pe-5 ps-5 mb-5 mt-5">{{ __('dashboard.layout.save') }}</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function submitReport(event) {
            if (event) {
                event.preventDefault();
            }

            document.querySelectorAll('[id$="-error"]').forEach(element => {
                element.textContent = '';
            });

            const form = document.getElementById('safetyForm');
            const formData = new FormData(form);

            formData.append('date', form.elements.date.value);
            formData.append('time', form.elements.time.value);
            formData.append('inspector_name', form.elements.inspector_name.value);

            form.querySelectorAll('[name^="item_id_"]').forEach(hiddenInput => {
                const itemId = hiddenInput.value;
                const status = form.elements[`status_${itemId}`].value;
                const comment = form.elements[`comment_${itemId}`].value;

                formData.append(`reportItems[${itemId}][item_id]`, itemId);
                formData.append(`reportItems[${itemId}][status]`, status);
                formData.append(`reportItems[${itemId}][comment]`, comment);
            });
            var local = document.getElementById('appLocal').value;
            var action = `/${local}/report/store`;

            console.log(formData);

            fetch(action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(data => Promise.reject(data));
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        window.location.href = '/';
                    }
                })
                .catch(error => {
                    // console.error('Error:', error);
                    // Clear any existing validation errors
                    document.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');

                    // Handle validation errors
                    if (error.errors) {
                        for (const field in error.errors) {
                            const errorMessage = error.errors[field][0];
                            document.getElementById(`${field}-error`).textContent = errorMessage;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: '{{ __('dashboard.validation.error') }}',
                            text: error.errors[Object.keys(error.errors)[0]][0],
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-outline-danger p-2 pe-3 ps-3',
                            },
                            confirmButtonText: '{{ __('dashboard.layout.close') }}',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '{{ __('dashboard.validation.error') }}',
                            text: '{{ __('dashboard.validation.error_occurred') }}',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-outline-danger p-2 pe-3 ps-3',
                            },
                            confirmButtonText: '{{ __('dashboard.layout.close') }}',
                        });
                    }
                });
        }
    </script>
@endsection

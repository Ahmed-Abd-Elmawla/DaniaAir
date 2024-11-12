@extends('layouts.dashboard')
@section('page_title')
    {{ __('dashboard.item.item') }}
@endsection

@section('content')
    <div class="card card-success card-outline mb-4">
        {{-- <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
    </div> --}}
        <!-- /.card-header -->
        <div class="card-body mt-3 mb-3">
            <!-- Button to trigger modal -->
            <button type="button" class="btn btn-outline-success rounded-0 float-end mb-2" data-bs-toggle="modal"
                onclick="openModal('create')"><i class="bi bi-shield-check m-1 ms-0"></i>
                {{ __('dashboard.item.add') }}
            </button>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th scope="col">{{ __('dashboard.layout.item_desc') }}</th>
                        <th scope="col">{{ __('dashboard.layout.category') }}</th>
                        <th style="width:108px">{{ __('dashboard.layout.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itemsData as $item)
                        <tr class="align-middle table-row-height">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->item_desc }}</td>
                            <td>{{ $item->category->name }}</td>

                            <td class="p-0">
                                <div class="actions-cell">
                                    <a href="#" class="btn btn-link"
                                        data-bs-title="{{ __('dashboard.item.update') }}"
                                        onclick="openModal('edit',{{ json_encode($item) }})">
                                        <i class="bi bi-pencil-square fs-4 text-info"></i>
                                    </a>
                                    <a href="#" class="btn btn-link"
                                        data-bs-title="{{ __('dashboard.item.delete') }}"
                                        onclick="deleteElement('{{ $item->uuid }}','{{ app()->getLocale() }}/dashboard/items')">
                                        <i class="bi bi-trash3 fs-4 text-danger"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="clearfix"></div>
            <div class="custom-pagination d-flex justify-content-center mt-5">
                {{ $itemsData->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <!-- /.card-body -->

    </div> <!-- /.card -->


    <!-- Start Edit Modal -->
    <div class="modal fade" id="EditCreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="EditCreateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Using the modal-lg class for a large modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditCreateModalLabel">title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editCreateForm" enctype="multipart/form-data" novalidate>
                        {{-- @csrf --}}
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row g-3">
                                <input type="hidden" id="itemId">
                                <input type="hidden" id="appLocal" value="{{ app()->getLocale() }}">
                                <!--begin::Col-->
                                <div class="col-md-12">
                                    <label for="item_desc"
                                        class="form-label">{{ __('dashboard.layout.item_desc_ar') }}</label>
                                    <input type="text" class="form-control" id="item_desc_ar" minlength="2" required>
                                    <div class="invalid-feedback">{{ __('dashboard.validation.inter_item_desc') }}</div>
                                    <span class="invalid-feedback-req" id="item_desc.ar-error"></span>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-12">
                                    <label for="item_desc"
                                        class="form-label">{{ __('dashboard.layout.item_desc_en') }}</label>
                                    <input type="text" class="form-control" id="item_desc_en" minlength="2" required>
                                    <div class="invalid-feedback">{{ __('dashboard.validation.inter_item_desc') }}</div>
                                    <span class="invalid-feedback-req" id="item_desc.en-error"></span>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-6">
                                    <label for="category_id"
                                        class="form-label">{{ __('dashboard.layout.category') }}</label>
                                    <select class="form-select" id="category_id" required>
                                        <option selected disabled value="">{{ __('dashboard.layout.Choose') }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">{{ __('dashboard.validation.inter_category') }}</div>
                                    <span class="invalid-feedback-req" id="category_id-error"></span>
                                </div>
                                <!--end::Col-->

                            </div> <!--end::Body-->
                        </div>
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-outline-danger"
                                data-bs-dismiss="modal">{{ __('dashboard.layout.close') }}</button>
                            <button id="editFormSubmit" onclick="submitForm(event,'edit')"
                                class="btn btn-outline-success">{{ __('dashboard.layout.save') }}</button>
                            <button id="CreateFormSubmit" onclick="submitForm(event)"
                                class="btn btn-outline-success">{{ __('dashboard.layout.save') }}</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
    <!-- End Edit Modal -->

    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-title]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });

        // When the modal is hidden, reset the form
        document.getElementById('EditCreateModal').addEventListener('hidden.bs.modal', function() {
            var modalForm = document.getElementById('editCreateForm');
            modalForm.reset();
        });

        function openModal(type, data = null) {
            console.log(data);

            var modal = new bootstrap.Modal(document.getElementById('EditCreateModal'));
            var modalTitle = document.getElementById('EditCreateModalLabel');
            var itemId = document.getElementById('itemId');

            var item_desc_ar = document.getElementById('item_desc_ar');
            var item_desc_en = document.getElementById('item_desc_en');
            var category = document.getElementById('category_id');

            var editBtn = document.getElementById('editFormSubmit');
            var CreateBtn = document.getElementById('CreateFormSubmit');

            // Set content and form action based on the action type
            if (type === 'edit') {
                modalTitle.textContent = '{{ __('dashboard.item.update') }}';
                itemId.value = data.id;
                item_desc_ar.value = data.item_desc.ar;
                item_desc_en.value = data.item_desc.en;

                category.value = data.category_id;

                editBtn.style.display = 'block'
                CreateBtn.style.display = 'none'

            } else if (type === 'create') {
                modalTitle.textContent = '{{ __('dashboard.item.add') }}';
                editBtn.style.display = 'none'
                CreateBtn.style.display = 'block'
            }
            modal.show();
        }
    </script>

    <script>
        function submitForm(event, type = null) {
            if (event) {
                event.preventDefault();
            }

            document.querySelectorAll('[id$="-error"]').forEach(element => {
                element.textContent = '';
            });

            // Create a new FormData object and append form fields
            const locales = ['en', 'ar'];
            let data = new FormData();

            locales.forEach(locale => {
                const item_desc_input = document.getElementById(`item_desc_${locale}`);
                if (item_desc_input) {
                    data.append(`item_desc[${locale}]`, item_desc_input.value);
                }
            });

            data.append('category_id', document.getElementById('category_id').value);


            // Get the UUID and locale
            var uuid = document.getElementById('itemId').value;
            var local = document.getElementById('appLocal').value;
            var action = ''

            if (type === 'edit') {
                action = `/${local}/dashboard/items/update/${uuid}`;
            } else {
                action = `/${local}/dashboard/items/store`;
            }

            // Perform the fetch request
            fetch(action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: data
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(data => Promise.reject(data));
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        window.location.reload();
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

@extends('layouts.dashboard')
@section('page_title')
    {{ __('dashboard.report.reports') }}
@endsection

@section('content')
    <div class="card card-success card-outline mb-4">
        {{-- <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
    </div> --}}
        <!-- /.card-header -->
        <div class="card-body mt-3 mb-3">
            <!-- Button to trigger modal -->
            <a type="button" href="{{ route('report.index') }}" target="_blank" class="btn btn-outline-success rounded-0 float-end mb-2"><i
                    class="fa-solid fa-file-invoice m-1 ms-0"></i>
                {{ __('web.home.safety-reports-add') }}
            </a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th scope="col">{{ __('dashboard.layout.inspector_name') }}</th>
                        <th scope="col">{{ __('dashboard.layout.date') }}</th>
                        <th scope="col">{{ __('dashboard.layout.time') }}</th>
                        <th style="width:108px">{{ __('dashboard.layout.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reportsData as $report)
                        <tr class="align-middle table-row-height">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $report->inspector_name }}</td>
                            <td>{{ $report->date }}</td>
                            <td>{{ $report->time }}</td>
                            <td class="p-0">
                                <div class="actions-cell">
                                    <a href="#" class="btn btn-link" data-bs-title="{{ __('dashboard.report.show') }}"
                                        onclick="openInfoModal({{ json_encode($report) }})">
                                        <i class="bi bi-eye fs-4 text-warning"></i>
                                    </a>
                                    <a href="#" class="btn btn-link"
                                        data-bs-title="{{ __('dashboard.report.delete') }}"
                                        onclick="deleteElement('{{ $report->uuid }}','{{ app()->getLocale() }}/dashboard/reports')">
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
                {{ $reportsData->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <!-- /.card-body -->
    </div> <!-- /.card -->



    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-title]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });


        function openInfoModal(report) {
            // console.log(report.items)
            var local = document.getElementById('appLocal').value;
            console.log(local)
            var modal = new bootstrap.Modal(document.getElementById('InfoModal'));
            document.getElementById('infoModalLabel').textContent = '{{ __('dashboard.report.info') }}';

            document.getElementById('date').textContent = report.date;
            document.getElementById('time').textContent = report.time;
            document.getElementById('inspector_name').textContent = report.inspector_name;


            let productsTableBody = document.getElementById('reportInfo');
            productsTableBody.innerHTML = '';


            report.items.forEach((item, index) => {

                let row = `<tr class="align-middle table-row-height">
                <td>${index + 1}</td>
                <td>${item.item_desc[local]}</td>
                <td>${item.category.name[local]}</td>
                <td>${item.status}</td>
                <td>${item.comment}</td>
            </tr>`;
                productsTableBody.innerHTML += row;
            });

            modal.show();
        }
    </script>


    <!-- Start show Modal -->
    <div class="modal fade" id="InfoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="InfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen"> <!-- Using the modal-lg class for a large modal -->
            <div class="modal-content">
                <div class="modal-header">
                    <i class="nav-icon fa-solid fa-file-invoice me-1"></i>
                    <h5 class="modal-title" id="infoModalLabel">title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editCreateForm" enctype="multipart/form-data" novalidate>
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row g-3">
                                <input type="hidden" id="itemId">
                                <input type="hidden" id="appLocal" value="{{ app()->getLocale() }}">

                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <label for="inspector_name"
                                        class="form-label">{{ __('dashboard.layout.inspector_name') }}&nbsp;:&nbsp;</label>
                                    <label for="inspector_name" class="form-label text-success" id="inspector_name"></label>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <label for="date"
                                        class="form-label">{{ __('dashboard.layout.date') }}&nbsp;:&nbsp;</label>
                                    <label for="date" class="form-label text-success" id="date"></label>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-4">
                                    <label for="time"
                                        class="form-label">{{ __('dashboard.layout.time') }}&nbsp;:&nbsp;</label>
                                    <label for="time" class="form-label text-success" id="time"></label>
                                </div>
                                <!--end::Col-->

                                <!--begin::Col-->
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th scope="col">{{ __('dashboard.layout.item_desc') }}</th>
                                                <th scope="col">{{ __('dashboard.layout.category') }}</th>
                                                <th scope="col">{{ __('dashboard.layout.status') }}</th>
                                                <th scope="col">{{ __('dashboard.layout.comment') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reportInfo">

                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Col-->

                            </div>
                        </div>
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-outline-danger"
                                data-bs-dismiss="modal">{{ __('dashboard.layout.close') }}</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!-- End show Modal -->
    @endsection

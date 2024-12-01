<div>
    <div  class="app-content flex-column-fluid">
        <!--begin::Card-->
        <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('assets/media/illustrations/sketchy-1/4.png')">
            <!--begin::Card header-->
            <div class="card-header pt-10">
                <div class="d-flex align-items-center">
                    <!--begin::Icon-->
                    <div class="symbol symbol-circle me-5">
                        <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                            <i class="ki-outline ki-abstract-47 fs-2x text-primary"></i>
                        </div>
                    </div>
                    <!--end::Icon-->
                    <!--begin::Title-->
                    <div class="d-flex flex-column">
                        <h2 class="mb-1">Settings</h2>
                    </div>
                    <!--end::Title-->
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pb-0">
                <!--begin::Navs-->
                <div class="d-flex overflow-auto h-55px">
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold flex-nowrap">
                        <!--begin::Nav item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary me-6" href="apps/file-manager/folders.html">Files</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary me-6 active" href="apps/file-manager/settings.html">Settings</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                </div>
                <!--begin::Navs-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header pt-8">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Preferences</h2>
                    @if (session()->has('success'))
                    <span class="badge badge-light-success badge-lg ms-3">Saved</span>
                    @endif
                </div>
                <!--end::Card title-->

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Form-->
                <form class="form" id="kt_file_manager_settings">
                    <!--begin::Input group-->
                    <div class="fv-row row mb-15">
                        <!--begin::Col-->
                        <div class="col-md-3">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold">Year of Record</label>
                            <div class="text-muted fs-7">For data creation and view student data, major data and university data.</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-9" wire:ignore>
                            <!--begin::Input-->
                            <select wire:model.lazy="yearOfRecord" id="year_of_record" aria-label="Select a date format" data-hide-search="true" data-control="select2" data-placeholder="Select a date format..." class="form-select">
                                <option></option>
                                @for ($year = 2015; $year <= 2060; $year++)
                                    <option @selected($year == $yearOfRecord) value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Action buttons-->
{{--                    <div class="row mt-12">--}}
{{--                        <div class="col-md-9 offset-md-3">--}}
{{--                            <!--begin::Cancel-->--}}
{{--                            <button type="button" class="btn btn-light me-3">Cancel</button>--}}
{{--                            <!--end::Cancel-->--}}
{{--                            <!--begin::Button-->--}}
{{--                            <button type="button" class="btn btn-primary" id="kt_file_manager_settings_submit">--}}
{{--                                <span class="indicator-label">Save</span>--}}
{{--                                <span class="indicator-progress">Please wait...--}}
{{--															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                            </button>--}}
{{--                            <!--end::Button-->--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!--begin::Action buttons-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
</div>
@push('scripts')
    <script>
        $('#year_of_record').select2().on('select2:select', function (e) {
        @this.set('yearOfRecord', $('#year_of_record').select2("val"));
        }).on('select2:unselect', function (e) {
        @this.set('yearOfRecord', null);
        });
    </script>
@endpush

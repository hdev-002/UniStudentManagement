<div class="mb-10">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="d-flex align-items-center"><span class="fw-bolder fs-2 ms-2">
                @if('uni-registration')
                    ကျောင်းအပ်
                @else
                    မေဂျာတင်
                @endif
            </span></span>


        <!--begin::Add students-->
        @if($for != 'draft')
            <a href="{{ $for == 'major-registration' ? route('major-registration.create') : ($for == 'uni-registration' ? route('uin-registration.create') : route('students.create')) }}" class="btn btn-sm btn-flex btn-dark align-self-center px-3">
                <i class="ki-outline ki-plus-square fs-3"></i>
               Create
            </a>
        @endif
        <!--end::Add students-->

    </div>
    <!--begin::Card-->
    <div class="card w-md-800px w-lg-1000px shadow-none border-1 border-gray-400">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <!--begin::Card header-->
        <div class="card-header border-0 ps-6 pe-0 pt-3">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                    <input type="text" wire:model.live.debounce.300ms="search" class="form-control form-control-sm w-30  0px ps-13" placeholder="{{__('unistudentmanagement::students.search_students')}}">
                    <!--begin::Spinner-->
                    <span class="position-absolute top-50 end-0 translate-middle-y lh-0 me-5" wire:loading wire:target="search" >
                     <span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
                            </span>
                    <!--end::Spinner-->

                    <!--begin::Reset-->
                    @if (!empty($search))
                        <span   wire:click="resetSearch" class="btn btn-flush btn-active-color-primary position-absolute text-gray-700 top-50 end-0 translate-middle-y lh-0 me-5">
                        x
                            <!--begin::Svg Icon | path: cross-->
                    </span>
                    @endif
                    <!--end::Reset-->
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar m-0">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Filter-->
{{--                    <button type="button" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px btn-active-light-secondary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">--}}
{{--                        <i class="ki-outline ki-filter fs-2"></i></button>--}}
                    <!--begin::Menu 1-->
{{--                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">--}}
{{--                        <!--begin::Header-->--}}
{{--                        <div class="px-7 py-5">--}}
{{--                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>--}}
{{--                        </div>--}}
{{--                        <!--end::Header-->--}}
{{--                        <!--begin::Separator-->--}}
{{--                        <div class="separator border-gray-200"></div>--}}
{{--                        <!--end::Separator-->--}}
{{--                        <!--begin::Content-->--}}
{{--                        <div class="px-7 py-5" data-kt-user-table-filter="form">--}}
{{--                            <!--begin::Input group-->--}}
{{--                            <div class="mb-10">--}}
{{--                                <label class="form-label fs-6 fw-semibold">Role:</label>--}}
{{--                                <select class="form-select form-select-solid fw-bold select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true" data-select2-id="select2-data-7-rde7" tabindex="-1" aria-hidden="true" data-kt-initialized="1">--}}
{{--                                    <option data-select2-id="select2-data-9-hxsl"></option>--}}
{{--                                    <option value="Administrator">Administrator</option>--}}
{{--                                    <option value="Analyst">Analyst</option>--}}
{{--                                    <option value="Developer">Developer</option>--}}
{{--                                    <option value="Support">Support</option>--}}
{{--                                    <option value="Trial">Trial</option>--}}
{{--                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-ktwm" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-xqop-container" aria-controls="select2-xqop-container"><span class="select2-selection__rendered" id="select2-xqop-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
{{--                            </div>--}}
{{--                            <!--end::Input group-->--}}
{{--                            <!--begin::Input group-->--}}
{{--                            <div class="mb-10">--}}
{{--                                <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>--}}
{{--                                <select class="form-select form-select-solid fw-bold select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true" data-select2-id="select2-data-10-3cqs" tabindex="-1" aria-hidden="true" data-kt-initialized="1">--}}
{{--                                    <option data-select2-id="select2-data-12-hruo"></option>--}}
{{--                                    <option value="Enabled">Enabled</option>--}}
{{--                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-2lud" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-a38z-container" aria-controls="select2-a38z-container"><span class="select2-selection__rendered" id="select2-a38z-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
{{--                            </div>--}}
{{--                            <!--end::Input group-->--}}
{{--                            <!--begin::Actions-->--}}
{{--                            <div class="d-flex justify-content-end">--}}
{{--                                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>--}}
{{--                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>--}}
{{--                            </div>--}}
{{--                            <!--end::Actions-->--}}
{{--                        </div>--}}
{{--                        <!--end::Content-->--}}
{{--                    </div>--}}
                    <!--end::Menu 1-->
                    <!--end::Filter-->

                    @if (count($selectedStudents) > 0)
                        <span class="fw-bold me-2 my-auto">{{ count($selectedStudents) }} Selected</span>
                       @if($for == 'uni-registration')
                            <button type="button" class="btn btn-sm btn-flex btn-danger align-self-center me-3" wire:click="bulkDeleteRequest">
                                Delete Selected</button>
                        @else
                            <button type="button" class="btn btn-sm btn-flex btn-danger align-self-center me-3" wire:click="bulkDeleteRequest">
                                Delete Selected</button>
                       @endif
                        <button type="button" class="btn btn-sm btn-flex btn-dark align-self-center me-3" wire:click="bulkPrint">
                            Print Selected</button>
                   @else
                        <div class="me-3" wire:ignore>
                            @if($for === 'major-registration')
                                <select wire:model.change="filters.type" id="register_type_filter" data-hide-search="true" data-kt-select2="true" class="form-select form-select-sm w-150px border-1 border-dark">
                                    <option value="">{{ __('unistudentmanagement::students.all') }}</option>
                                    <option value="day">{{ __('unistudentmanagement::students.day') }}</option>
                                    <option value="distance">{{ __('unistudentmanagement::students.distance') }}</option>
                                    <option value="vip">{{ __('unistudentmanagement::students.vip') }}</option>
                                </select>
                            @endif
                        </div>
                    <!--begin::Export-->
{{--                    <button type="button" class="btn btn-sm btn-flex btn-outline btn-outline-dark align-self-center me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">--}}
{{--                        <i class="ki-outline ki-exit-up fs-2"></i>Export</button>--}}
                    <!--end::Export-->
                    @endif
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                </div>
                <!--end::Group actions-->
                <!--begin::Modal - Adjust Balance-->
                <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Export Users</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                    <i class="ki-outline ki-cross fs-1"></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_export_users_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bold select2-hidden-accessible" data-select2-id="select2-data-13-tdkd" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                            <option data-select2-id="select2-data-15-tytj"></option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Analyst">Analyst</option>
                                            <option value="Developer">Developer</option>
                                            <option value="Support">Support</option>
                                            <option value="Trial">Trial</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-51iy" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-role-zv-container" aria-controls="select2-role-zv-container"><span class="select2-selection__rendered" id="select2-role-zv-container" role="textbox" aria-readonly="true" title="Select a role"><span class="select2-selection__placeholder">Select a role</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold select2-hidden-accessible" data-select2-id="select2-data-16-a2kl" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                            <option data-select2-id="select2-data-18-y5vh"></option>
                                            <option value="excel">Excel</option>
                                            <option value="pdf">PDF</option>
                                            <option value="cvs">CVS</option>
                                            <option value="zip">ZIP</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-zuwh" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-format-gx-container" aria-controls="select2-format-gx-container"><span class="select2-selection__rendered" id="select2-format-gx-container" role="textbox" aria-readonly="true" title="Select a format"><span class="select2-selection__placeholder">Select a format</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Input-->
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--begin::Modal - Add task-->
                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_user_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Add User</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                    <i class="ki-outline ki-cross fs-1"></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body px-5 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_add_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px" style="max-height: 413px;">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">
                                            <!--begin::Label-->
                                            <label class="d-block fw-semibold fs-6 mb-5">Avatar</label>
                                            <!--end::Label-->
                                            <!--begin::Image placeholder-->
                                            <style>.image-input-placeholder { background-image: url('assets/media/svg/files/blank-image.svg'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('assets/media/svg/files/blank-image-dark.svg'); }</style>
                                            <!--end::Image placeholder-->
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-6.jpg);"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                    <i class="ki-outline ki-pencil fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="avatar_remove">
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
																					<i class="ki-outline ki-cross fs-2"></i>
																				</span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
																					<i class="ki-outline ki-cross fs-2"></i>
																				</span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" value="Emma Smith">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="email" name="user_email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="example@domain.com" value="smith@kpmg.com">
                                            <!--end::Input-->
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-5">Role</label>
                                            <!--end::Label-->
                                            <!--begin::Roles-->
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="0" id="kt_modal_update_role_option_0" checked="checked">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
                                                        <div class="fw-bold text-gray-800">Administrator</div>
                                                        <div class="text-gray-600">Best for business owners and company administrators</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="1" id="kt_modal_update_role_option_1">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                                        <div class="fw-bold text-gray-800">Developer</div>
                                                        <div class="text-gray-600">Best for developers or people primarily using the API</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="2" id="kt_modal_update_role_option_2">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_2">
                                                        <div class="fw-bold text-gray-800">Analyst</div>
                                                        <div class="text-gray-600">Best for people who need full access to analytics data, but don't need to update business settings</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="3" id="kt_modal_update_role_option_3">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_3">
                                                        <div class="fw-bold text-gray-800">Support</div>
                                                        <div class="text-gray-600">Best for employees who regularly refund payments and respond to disputes</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <div class="separator separator-dashed my-5"></div>
                                            <!--begin::Input row-->
                                            <div class="d-flex fv-row">
                                                <!--begin::Radio-->
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input me-3" name="user_role" type="radio" value="4" id="kt_modal_update_role_option_4">
                                                    <!--end::Input-->
                                                    <!--begin::Label-->
                                                    <label class="form-check-label" for="kt_modal_update_role_option_4">
                                                        <div class="fw-bold text-gray-800">Trial</div>
                                                        <div class="text-gray-600">Best for people who need to preview content data, but don't need to make any updates</div>
                                                    </label>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Radio-->
                                            </div>
                                            <!--end::Input row-->
                                            <!--end::Roles-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Scroll-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-10">
                                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - Add task-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-1 pb-5 px-5">
            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                <div id="" class="table-responsive">
                    <table  class="table align-middle table-row-bordered fs-6">
                        <thead class="text-nowrap">
                        <tr class="fw-semibold fs-6 text-gray-900  border-bottom border-gray-200" role="row">
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox"  wire:click="toggleSelectAll"
                                        {{ count($selectedStudents) > 0 ? 'checked' : '' }}>
                                </div>
                            </td>
                            <th class="text-nowrap" wire:click="sortBy('name')">
                               အမည်

                                @if ($sortField === 'name')
                                    <i class="{{ $sortDirection === 'asc' ? 'ki-duotone ki-up' : 'ki-duotone ki-down' }}"></i>
                                @endif
                            </th>
                            @if($for == 'major-registration')
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.university') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.major') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.type') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.approved_no') }}</th>
                            @elseif($for == 'uni-registration')
                                <th>ယခုနှစ် ခုံနံပါတ်</th>
                                <th>ယခင်နှစ် ခုံနံပါတ်</th>
                                <th>တက္ကသိုလ်</th>
                                <th>ရလဒ်</th>
                            @else
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.level') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.student_nrc') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.father') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.father_nrc') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.mother') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.mother_nrc') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.phone') }}</th>
                                <th class="min-w-90px"> {{ __('unistudentmanagement::students.address') }}</th>
                            @endif
                            <th></th>

                        </tr>
                        </thead>
                        <tbody  class="text-gray-600 fw-semibold text-nowrap">
                        @if($for == 'uni-registration')
                            @forelse ($students as $student)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox"  value="{{ $student->id }}"
                                                   wire:model.live="selectedStudents">
                                        </div>
                                    </td>
                                   <td>
                                       <a href="{{ route('students.show', $student->student_id) }}" class="text-gray-800 text-hover-primary">{{ $student->name }}</a>
                                   </td>
                                    <td>{{ $student->current_desk_symbol }}-{{ $student->current_desk_no }}</td>
                                    <td>{{ $student->current_desk_symbol }}-{{ $student->current_desk_no }}</td>
                                    <td>{{ $student->get_university }}</td>
                                    <td>
                                        @if($student->is_win !== null)
                                            {{$student->is_win == 0 ? 'ကျ' : 'အောင်'}}
                                        @else
                                            {{ 'N/A' }}
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="printStudent({{ $student->student_id }})" class="btn btn-light btn-active-light-primary btn-icon  w-10px h-10px">
                                            <i class="ki-outline ki-printer text-gray-900 fs-3"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        @else
                            @forelse ($students as $student)
                                <tr class="border border-top-0 border-left-0 border-right-0 border-bottom-1">
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox"  value="{{ $student->id }}"
                                                   wire:model.live="selectedStudents">
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $student->name }}</a>
                                    </td>
                                    @if($for == 'major-registration')
                                        <td>{{ $student->get_university }}</td>
                                        <td>{{ $student?->major }}</td>
                                        <td>{{ $student?->type }}</td>
                                        <td>{{ $student?->approval_no }}</td>
                                        <td>
                                            <button wire:click="printStudent({{ $student->id }})" class="btn btn-light btn-active-light-primary btn-icon w-10px h-10px">
                                                <i class="ki-outline ki-printer text-gray-900 fs-2"></i>
                                            </button>
                                        </td>
                                    @else
                                        <td>{{ $student->level ?? 'N/A' }}</td>
                                        <td>
                                            @if (!empty($student->studentNRC->nrc_code) && !empty($student->studentNRC->name_mm) && !empty($student->student_nrc_no))
                                                {{ $student->studentNRC->nrc_code }} / {{ $student->studentNRC->name_mm }} - {{ $student->student_nrc_no }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $student?->father_name }}</td>
                                        <td>
                                            @if (!empty($student->fatherNRC->nrc_code) && !empty($student->fatherNRC->name_mm) && !empty($student->father_nrc_no))
                                                {{ $student->fatherNRC->nrc_code }} / {{ $student->fatherNRC->name_mm }} - {{ $student->father_nrc_no }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $student?->mother_name }}</td>
                                        <td>
                                            @if (!empty($student->motherNRC->nrc_code) && !empty($student->motherNRC->name_mm) && !empty($student->mother_nrc_no))
                                                {{ $student->motherNRC->nrc_code }} / {{ $student->motherNRC->name_mm }} - {{ $student->mother_nrc_no }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $student->student_phone ?? $student->parent_phone }}</td>
                                        <td>{{ $student?->address ? Str::words($student->address, 3, '...') : 'N/A' }}</td>
                                    @endif

                                </tr>
                            @empty
                                <tr class="border border-top-0 border-left-0 border-right-0 border-bottom-1">
                                    <td @if($for == 'major-registration') colspan="6" @else colspan="10" @endif >
                                        <div data-kt-search-element="empty" class="text-center">
                                            <!--begin::Message-->
                                            <div class="fw-semibold py-10">
                                                <div class="text-gray-600 fs-3 mb-2">
                                                    {{ __('unistudentmanagement::students.no_student_found') }}
                                                </div>
                                                <div class="text-muted fs-6">{{ __('unistudentmanagement::students.try_to_search_by_student_name') }}</div>
                                            </div>
                                            <!--end::Message-->
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        @endif

                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
                <div class="mt-2">
                    @if($students instanceof Illuminate\Pagination\LengthAwarePaginator)
                    {{ $students->links('vendor.livewire.custom-pagination') }}
                    @endif
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('print-table-student-details', (html) => {

                const originalContent = document.body.innerHTML;
                document.body.innerHTML = html;
                window.print();
                document.body.innerHTML = originalContent;
                Livewire.restart();
            });



            Livewire.on('bulk-delete-warning', (html) => {


                Swal.fire({
                    text: "Are you sure you want to delete selected students?",
                    icon: "warning",
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete it!",
                    showCancelButton: true,
                    cancelButtonText: "No, cancel!",
                    customClass: {
                        confirmButton: "btn btn-active-light-danger",
                        cancelButton: "btn btn-primary",
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                    @this.call('bulkDelete');
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Your imaginary data is safe :)",
                            icon: "error"
                        });
                    }
                });
            });

            Livewire.on('student-deleted-success', () => {
                Swal.fire({
                    text: "You have deleted all selected students!.",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            });

            Livewire.on('student-deleted-error', () => {
                Swal.fire({
                    text: "Selected students was not deleted.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            });

        });
    </script>
@endpush

@push('scripts')


    <script>
        $('#register_type_filter').select2().on('select2:select', function (e) {
        @this.set('filters.type', $('#register_type_filter').select2("val"));
        }).on('select2:unselect', function (e) {
        @this.set('filters.type', null);
        });
    </script>
    <script>
        // Pagination functionality with space or arrow keys (next/prev)
        function triggerPaginationAction(action) {
            const $activePage = $('.page-item.active');
            let $targetPage;

            if (action === 'next' && $activePage.length) {
                $targetPage = $activePage.next('.page-item');  // Get the next page link
            } else if (action === 'prev' && $activePage.length) {
                $targetPage = $activePage.prev('.page-item');  // Get the previous page link
            }

            if ($targetPage.length && $targetPage.find('a').length) {
                $targetPage.find('a').click();  // Trigger the click on the page link
            }
        }

        // Listen for the Spacebar (32), Right Arrow (39), and Left Arrow (37) keys
        $(document).on('keydown', function(event) {
            if (event.which === 32) {  // Spacebar key
                event.preventDefault();  // Prevent default browser behavior
                triggerPaginationAction('next');  // Trigger next page
            } else if (event.which === 39) {  // Right arrow key
                triggerPaginationAction('next');  // Trigger next page
            } else if (event.which === 37) {  // Left arrow key
                triggerPaginationAction('prev');  // Trigger previous page
            }
        });
    </script>

@endpush


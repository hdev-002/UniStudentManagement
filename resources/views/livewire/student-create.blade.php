<div class="mt-9 max-w-100">
    <div class="card card-flush pt-1 mb-5 mb-lg-10">
        <!--begin::Card header-->
        <div class="card-header mb-5">
            <!--begin::Card title-->
            <h3 class="card-title">

                    <div class="text-secondary-emphasis fs-5" wire:loading>
                        <i class="fa fa-spinner fa-spin"></i>  Saving Draft...
                    </div>
            </h3>
            <div class="card-toolbar">
                <!--begin::Actions-->
{{--                <div class="text-center pt-10">--}}
{{--                    <button type="reset" class="btn btn-light btn-sm me-3" data-kt-users-modal-action="cancel">Discard</button>--}}
{{--                    <button type="submit" class="btn btn-primary btn-sm" data-kt-users-modal-action="submit">--}}
{{--                        <span class="indicator-label">Create</span>--}}
{{--                        <span class="indicator-progress" wire:loading>Please wait...--}}
{{--            																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                    </button>--}}
{{--                </div>--}}
                <!--end::Actions-->
            </div>
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Form-->
            <form wire:ignore.self>
                <!--begin::Scroll-->
                <div class="d-flex flex-column px-5 px-lg-10">
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="col-12 col-md-6 mb-3">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Student Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="name" wire:model.lazy="name" class="form-control" placeholder="Student name">
                            <!--end::Input-->
                            @error('name')<div class="fv-plugins-message-container fv-plugins-message-container--enabled text-danger">{{ $message }}</div>@enderror
                        </div>
                        <!--end::Input group-->

                        <!-- Student Code -->
{{--                        <div class="col-12 col-md-6 mb-3">--}}
{{--                            <label class="required fw-semibold fs-6 mb-2">Student Code</label>--}}
{{--                            <input type="text" wire:model="student_code" class="form-control" placeholder="Student Code">--}}
{{--                            @error('student_code')<div class="text-danger">{{ $message }}</div>@enderror--}}
{{--                        </div>--}}

                        <!-- Business Location ID -->
{{--                        <div class="col-12 col-md-6 mb-3">--}}
{{--                            <label class="fw-semibold fs-6 mb-2">Business Location ID</label>--}}
{{--                            <input type="number" wire:model="business_location_id" class="form-control" placeholder="Business Location ID">--}}
{{--                            @error('business_location_id')<div class="text-danger">{{ $message }}</div>@enderror--}}
{{--                        </div>--}}

                        <!-- Student NRC Code and NRC No -->
                        <div class="col-12 col-md-3 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Student NRC Code</label>

                            <livewire:data-select2
                                :options="$nrcs"
                                componentId="studentNrcSelect"
                                valueField="id"
                                labelField="name_mm"
                            />

                            @error('student_nrc_code')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Student NRC No</label>
                            <input type="number" wire:model.lazy="student_nrc_no" class="form-control" placeholder="NRC No">
                            @error('student_nrc_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Date of Birth
                                @if($age)
                                    <span class="small text-gray-600">({{ $age }} years old)</span>
                                @endif
                            </label>
                            <input class="form-control" wire:model.lazy="date_of_birth" placeholder="Pick a date" id="date_of_birth"/>
                            <div class="form-text">
                                Date format: <code>dd-mm-yyyy</code>
                            </div>

                            @error('date_of_birth')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <!-- Grade 10 Desk ID, Total Mark, and Passed Year -->
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Grade 10 Desk ID</label>
                            <input type="text" wire:model.lazy="grade_10_desk_id" class="form-control" placeholder="Desk ID">
                            @error('grade_10_desk_id')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Grade 10 Total Mark</label>
                            <input type="number" wire:model.lazy="grade_10_total_mark" class="form-control @error('grade_10_total_mark') is-invalid @enderror" placeholder="Total Mark" min="240"  max="600">
                            @error('grade_10_total_mark')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Grade 10 Passed Year</label>
                            <input type="number" wire:model.lazy="grade_10_passed_year" class="form-control @error('grade_10_passed_year') is-invalid @enderror" placeholder="Passed Year" min="1900" max="2100">
                            @error('grade_10_passed_year')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <!-- Father and Mother Details -->
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Father's Name</label>
                            <input type="text" wire:model.lazy="father_name" class="form-control" placeholder="Father's Name">
                            @error('father_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Father NRC Code</label>
                            <livewire:data-select2
                                :options="$nrcs"
                                componentId="fatherNrcSelect"
                                valueField="id"
                                labelField="name_mm"
                            />
                            @error('father_nrc_code')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Father NRC No</label>
                            <input type="text" wire:model.lazy="father_nrc_no" class="form-control @error('father_nrc_no') is-invalid @enderror" placeholder="NRC No">
                            @error('father_nrc_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Mother's Name</label>
                            <input type="text" wire:model.lazy="mother_name" class="form-control" placeholder="Mother's Name">
                            @error('mother_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Mother NRC Code</label>
                            <livewire:data-select2
                                :options="$nrcs"
                                componentId="motherNrcSelect"
                                valueField="id"
                                labelField="name_mm"
                            />
                            @error('mother_nrc_code')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-3 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Mother NRC No</label>
                            <input type="text" wire:model.lazy="mother_nrc_no" class="form-control @error('mother_nrc_no') is-invalid @enderror" placeholder="NRC No">
                            @error('mother_nrc_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <!-- Contact and Address Details -->
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Student Phone</label>
                            <input type="tel" wire:model.lazy="student_phone" id="student_phone" class="form-control @error('student_phone') is-invalid @enderror" placeholder="Student Phone">
                            @error('student_phone')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Parent Phone</label>
                            <input type="text" wire:model.lazy="parent_phone" id="parent_phone" class="form-control @error('student_phone') is-invalid @enderror" placeholder="Parent Phone">
                            @error('parent_phone')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Address</label>
                            <textarea wire:model.lazy="address" class="form-control" placeholder="Address"></textarea>
                            @error('address')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        @if($for != 'major-registration')
                        <div class="col-12 mb-3">
                            <div class="form-check">
                                <input wire:model.lazy="is_major_register" wire:click="$refresh" class="form-check-input" type="checkbox" id="flexCheckDefault" />

                                <label class="form-check-label" for="flexCheckDefault">
                                    Major Register
                                </label>
                            </div>
                        </div>
                        @endif


                    @if($is_major_register || $for == 'major-registration')
                            <!-- Additional Information -->
                            <div class="col-12 col-md-6 mb-3">
                                <label class="fw-semibold fs-6 mb-2">Approval No</label>
                                <input type="text" wire:model.lazy="approval_no" class="form-control" placeholder="Approval No">
                                @error('approval_no')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <label class="fw-semibold fs-6 mb-2">AR WA THA No</label>
                                <input type="text" wire:model.lazy="ar_wa_tha_no" class="form-control" placeholder="AR WA THA No">
                                @error('ar_wa_tha_no')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <!-- Other Fields -->
                            <div class="col-12 col-md-4 mb-3">
                                <label class="fw-semibold fs-6 mb-2">Type</label>
{{--                                <input type="text" wire:model="type" class="form-control" placeholder="Type">--}}
                                <livewire:data-select2
                                    :options="$registerType"
                                    componentId="registerTypeSelect"
                                    valueField="key"
                                    labelField="value"
                                />
                                @error('type')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <label class="fw-semibold fs-6 mb-2">Major</label>
                                <livewire:data-select2
                                    :options="$majorType"
                                    componentId="majorTypeSelect"
                                    valueField="key"
                                    labelField="value"
                                />
                                @error('major')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <label class="fw-semibold fs-6 mb-2">University</label>
                                <livewire:data-select2
                                    :options="$uniType"
                                    componentId="uniTypeSelect"
                                    valueField="key"
                                    labelField="value"
                                />
                                @error('get_university')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                       @endif
                    </div>


                </div>
                <!--end::Scroll-->
                <!--begin::Actions-->
                                <div class="text-center pt-10">
                                    <button type="button" class="btn btn-light me-3" wire:click="discardData()">Discard</button>

                                    <button type="button" class="btn btn-primary" wire:click="createAndOtherStudent" wire:loading.attr="disabled">
                                        <span class="indicator-label">Create & Other</span>
                                        <span class="indicator-progress" wire:loading wire:targe="createAndOtherStudent">Please wait...
                																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>

                                    <button type="button" class="btn btn-primary" wire:click="createStudent" wire:loading.attr="disabled">
                                        <span class="indicator-label">Create</span>
                                        <span class="indicator-progress" wire:loading wire:targe="createStudent">Please wait...
                																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
    </div>


</div>

@push('scripts')
    <script>
        Inputmask({
            "mask" : "99-99-9999"
        }).mask("#date_of_birth");


        // $('#date_of_birth').flatpickr();
        // Inputmask({
        //     "mask" : "(09) 99-999-9999",
        //     "placeholder": "(09) 99-999-9999",
        // }).mask("#student_phone");
        //
        // Inputmask({
        //     "mask" : "(09) 99-999-9999",
        //     "placeholder": "(09) 99-999-9999",
        // }).mask("#parent_phone");
    </script>
@endpush

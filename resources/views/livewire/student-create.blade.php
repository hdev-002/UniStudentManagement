<div>
    <div class="d-flex align-items-center justify-content-between mb-3" wire:ignore.self>
        <span class="d-flex align-items-center">
            <a href="{{ route('students.index') }}" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px btn-active-light-secondary"><i class="fa-solid fa-arrow-left"></i></a>
            <span class="fw-bolder fs-2 ms-2">Student</span>
            <span wire:loading class="text-secondary-emphasis ms-2"> <i class="fa fa-spinner fa-spin"></i>  Saving Draft...</span></span>

        @if($name)
        <button type="button" class="btn btn-sm btn-flex btn-secondary align-self-center px-3" wire:click="createStudent" wire:loading.attr="disabled">
            <i class="ki-outline ki-plus-square fs-3 text-dark-emphasis"></i> <span class="indicator-label">Save</span>
            <span class="indicator-progress" wire:loading wire:targe="createStudent">Saving...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
        @endif

    </div>
    <!--begin::Form-->
    <form  wire:ignore.self>
        <div class="card card-flush pt-3 mb-5 w-md-700px shadow-none border-1 border-gray-400">
            <!--begin::Card body-->
            <div class="card-body p-3 pb-6">
                <!--begin::Scroll-->
                <div class="d-flex flex-column px-5 px-lg-10">
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="col-12 mb-3">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Student Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="name" wire:model.lazy="name" class="form-control form-control-sm" placeholder="Student name">
                            <!--end::Input-->
                            @error('name')<div class="fv-plugins-message-container fv-plugins-message-container--enabled text-danger">{{ $message }}</div>@enderror
                        </div>
                        <!--end::Input group-->
                        <!-- Student NRC Code and NRC No -->
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Student NRC Code</label>

                            <livewire:data-select2
                                :options="$nrcs"
                                componentId="studentNrcSelect"
                                valueField="id"
                                labelField="name_mm"
                            />

                            @error('student_nrc_code')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-8 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Student NRC No</label>
                            <input type="number" wire:model.lazy="student_nrc_no" class="form-control form-control-sm" placeholder="NRC No">
                            @error('student_nrc_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Date of Birth
                                @if($age)
                                    <span class="small text-gray-600">({{ $age }} years old)</span>
                                @endif
                            </label>
                            <input class="form-control form-control-sm" wire:model.lazy="date_of_birth" placeholder="Pick a date" id="date_of_birth"/>
                            <div class="form-text">
                                Date format: <code>dd-mm-yyyy</code>
                            </div>

                            @error('date_of_birth')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <!-- Grade 10 Desk ID, Total Mark, and Passed Year -->
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Grade 10 Desk ID</label>
                            <input type="text" wire:model.lazy="grade_10_desk_id" class="form-control form-control-sm" placeholder="Desk ID">
                            @error('grade_10_desk_id')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Grade 10 Total Mark</label>
                            <input type="number" wire:model.lazy="grade_10_total_mark" class="form-control form-control-sm @error('grade_10_total_mark') is-invalid @enderror" placeholder="Total Mark" min="240"  max="600">
                            @error('grade_10_total_mark')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Grade 10 Passed Year</label>
                            <input type="number" wire:model.lazy="grade_10_passed_year" class="form-control form-control-sm @error('grade_10_passed_year') is-invalid @enderror" placeholder="Passed Year" min="1900" max="2100">
                            @error('grade_10_passed_year')<div class="text-danger">{{ $message }}</div>@enderror
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
            </div>
        </div>

        <div class="pt-3 pb-2 fs-5 fw-bold">Parent Info</div>
        <div class="card card-flush pt-3 mb-5 w-md-700px shadow-none border-1 border-gray-400">
            <!--begin::Card body-->
            <div class="card-body p-3 pb-6">
                <!--begin::Scroll-->
                <div class="d-flex flex-column px-5 px-lg-10">
                    <div class="row">
                        <!-- Father and Mother Details -->
                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Father's Name</label>
                            <input type="text" wire:model.lazy="father_name" class="form-control form-control-sm" placeholder="Father's Name">
                            @error('father_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Father NRC Code</label>
                            <livewire:data-select2
                                :options="$nrcs"
                                componentId="fatherNrcSelect"
                                valueField="id"
                                labelField="name_mm"
                            />
                            @error('father_nrc_code')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-8 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Father NRC No</label>
                            <input type="text" wire:model.lazy="father_nrc_no" class="form-control form-control-sm @error('father_nrc_no') is-invalid @enderror" placeholder="NRC No">
                            @error('father_nrc_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Mother's Name</label>
                            <input type="text" wire:model.lazy="mother_name" class="form-control form-control-sm" placeholder="Mother's Name">
                            @error('mother_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Mother NRC Code</label>
                            <livewire:data-select2
                                :options="$nrcs"
                                componentId="motherNrcSelect"
                                valueField="id"
                                labelField="name_mm"
                            />
                            @error('mother_nrc_code')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-8 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Mother NRC No</label>
                            <input type="text" wire:model.lazy="mother_nrc_no" class="form-control form-control-sm @error('mother_nrc_no') is-invalid @enderror" placeholder="NRC No">
                            @error('mother_nrc_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-3 pb-2 fs-5 fw-bold">Contact</div>
        <div class="card card-flush pt-3 mb-5 w-md-700px shadow-none border-1 border-gray-400">
            <!--begin::Card body-->
            <div class="card-body p-3 pb-6">
                <!--begin::Scroll-->
                <div class="d-flex flex-column px-5 px-lg-10">
                    <div class="row">
                        <!-- Contact and Address Details -->
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Student Phone</label>
                            <input type="tel" wire:model.lazy="student_phone" id="student_phone" class="form-control form-control-sm @error('student_phone') is-invalid @enderror" placeholder="Student Phone">
                            @error('student_phone')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Parent Phone</label>
                            <input type="text" wire:model.lazy="parent_phone" id="parent_phone" class="form-control form-control-sm @error('student_phone') is-invalid @enderror" placeholder="Parent Phone">
                            @error('parent_phone')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Address</label>
                            <textarea wire:model.lazy="address" class="form-control form-control-sm" placeholder="Address"></textarea>
                            @error('address')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--begin::Actions-->
        <div class="text-start mb-20">
            <button type="button" class="btn btn-sm btn-light me-3" wire:click="discardData()">Discard</button>
            <button type="button" class="btn btn-sm btn-dark me-3" wire:click="createAndOtherStudent" wire:loading.attr="disabled">
                <span class="indicator-label">Save and New</span>
                <span class="indicator-progress"  wire:loading wire:targe="createAndOtherStudent">Saving...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <button type="button" class="btn btn-sm btn-dark" wire:click="createStudent" wire:loading.attr="disabled">
                <span class="indicator-label">Save</span>
                <span class="indicator-progress" wire:loading wire:targe="createStudent">Saving...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
        <!--end::Actions-->
    </form>
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

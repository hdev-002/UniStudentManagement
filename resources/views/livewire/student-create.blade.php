<div>
    <div class="d-flex align-items-center justify-content-between mb-3" wire:ignore.self>
        <span class="d-flex align-items-center">
            <a href="{{ route('major-registration.index') }}" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px btn-active-light-secondary"><i class="fa-solid fa-arrow-left"></i></a>
            <span class="fw-bolder fs-2 ms-2">မေဂျာတင်</span>
            <span wire:loading class="text-secondary-emphasis ms-2"> <i class="fa fa-spinner fa-spin"></i>  Saving Draft...</span></span>


        <button type="button" class="btn btn-sm btn-flex btn-secondary align-self-center px-3" wire:click="createStudent" wire:loading.attr="disabled">
            <i class="ki-outline ki-plus-square fs-3 text-dark-emphasis"></i> <span class="indicator-label">Save</span>
            <span class="indicator-progress" wire:loading wire:targe="createStudent">Saving...
																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>


    </div>
    <!--begin::Form-->
    <form  wire:ignore.self>
        <div class="card card-flush mb-5 w-md-700px shadow-none border-1 border-gray-400">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#student_info_collapsible">
                <h3 class="card-title">ကျောင်းသား/သူ အချက်လက်</h3>
                <div class="card-toolbar rotate-180">
                    <i class="ki-duotone ki-down fs-1"></i>
                </div>
            </div>
            <div id="student_info_collapsible" class="collapse show">
            <!--begin::Card body-->
            <div class="card-body p-3 pb-6">
                <!--begin::Scroll-->
                <div class="d-flex flex-column px-5 px-lg-10">
                    <div class="row">
                        <!--begin::Input group-->
                        <div class="col-12 mb-3">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">အမည်</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" id="name" wire:model="name" class="form-control form-control-sm" placeholder="Student name">
                            <!--end::Input-->
                            @error('name')<div class="fv-plugins-message-container fv-plugins-message-container--enabled text-danger">{{ $message }}</div>@enderror
                        </div>
                        <!--end::Input group-->
                        <!-- Student NRC Code and NRC No -->
                        <div wire:ignore class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">မှတ်ပုံတင် အမှတ်</label>

                            <select
                                class="form-select form-select-sm select-student-nrc-code"
                                id="data-select-student-nrc-code"
                                wire:model="student_nrc_code"
                                data-control="select2"
                                data-placeholder="Select an option"
                            >
                                <option></option>
                                @foreach ($nrcs as $nrc)
                                    <option @selected($student_nrc_code == $nrc['id']) value="{{ $nrc['id'] }}">
                                        {{ $nrc['name_mm'] }}
                                    </option>
                                @endforeach
                            </select>

                            @error('student_nrc_code')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-8 mb-3">
                            <label class="fw-semibold fs-6 mb-2">မှတ်ပုံတင် နံပါတ်</label>
                            <input type="number" wire:model="student_nrc_no" class="form-control form-control-sm" placeholder="NRC No">
                            @error('student_nrc_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">မွေးသက္ကရာဇ်
                                @if($age)
                                    <span class="small text-gray-600">({{ $age }} years old)</span>
                                @endif
                            </label>
                            <input class="form-control form-control-sm" wire:model="date_of_birth" placeholder="ရက်ရွေးပါ" id="date_of_birth"/>
                            <div class="form-text">
                                Date format: <code>ရက်-လ-နှစ်</code>
                            </div>

                            @error('date_of_birth')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <!-- Grade 10 Desk ID, Total Mark, and Passed Year -->
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">ခုံနံပါတ် (၁၀တန်း)</label>
                            <input type="text" wire:model="grade_10_desk_id" class="form-control form-control-sm" placeholder="Desk ID">
                            @error('grade_10_desk_id')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">အမှတ်ပေါင်း (၁၀တန်း)</label>
                            <input type="number" wire:model="grade_10_total_mark" class="form-control form-control-sm @error('grade_10_total_mark') is-invalid @enderror" placeholder="Total Mark" min="240"  max="600">
                            @error('grade_10_total_mark')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">အောင်သည့်နှစ်(၁၀တန်း)</label>
                            <input type="number" wire:model="grade_10_passed_year" class="form-control form-control-sm @error('grade_10_passed_year') is-invalid @enderror" placeholder="Passed Year" min="1900" max="2100">
                            @error('grade_10_passed_year')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>


                        <!-- Additional Information -->
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">ဝင်ခွင့်စဥ်</label>
                            <input type="text" wire:model="approval_no" class="form-control form-control-sm" placeholder="Approval No">
                            @error('approval_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">အဝသအမှတ်</label>
                            <input type="text" wire:model="ar_wa_tha_no" class="form-control form-control-sm" placeholder="AR WA THA No">
                            @error('ar_wa_tha_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <!-- Other Fields -->
                        <div wire:ignore class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">အမျိုးစား</label>

                            <select
                                class="form-select form-select-sm select-type"
                                id="data-select-type"
                                wire:model="type"
                                data-control="select2"
                                data-placeholder="Select an option"
                            >
                                <option></option>
                                @foreach ($registerType as $type)
                                    <option @selected($type == $type['key']) value="{{ $type['key'] }}">
                                        {{ $type['value'] }}
                                    </option>
                                @endforeach
                            </select>

                            @error('type')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div wire:ignore class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">မေဂျာ</label>

                            <select
                                class="form-select form-select-sm select-major"
                                id="data-select-major"
                                wire:model="major"
                                data-control="select2"
                                data-placeholder="Select an option"
                            >
                                <option></option>
                                @foreach ($majorType as $major)
                                    <option @selected($major == $major['key']) value="{{ $major['key'] }}">
                                        {{ $major['value'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('major')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div wire:ignore class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">တက္ကသိုလ်</label>

                            <select
                                class="form-select form-select-sm select-get-university"
                                id="data-select-get-university"
                                wire:model="get_university"
                                data-control="select2"
                                data-placeholder="Select an option"
                            >
                                <option></option>
                                @foreach ($uniType as $uni)
                                    <option @selected($get_university == $uni['key']) value="{{ $uni['key'] }}">
                                        {{ $uni['value'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('get_university')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                    </div>


                </div>
                <!--end::Scroll-->
            </div>
            </div>
        </div>


        <div class="card card-flush mb-5 w-md-700px shadow-none border-1 border-gray-400">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#parent_info_collapsible">
                <h3 class="card-title">အုပ်ထိန်းသူအချက်လက်</h3>
                <div class="card-toolbar rotate-180">
                    <i class="ki-duotone ki-down fs-1"></i>
                </div>
            </div>
            <div id="parent_info_collapsible" class="collapse show">
            <!--begin::Card body-->
            <div class="card-body p-3 pb-6">
                <!--begin::Scroll-->
                <div class="d-flex flex-column px-5 px-lg-10">
                    <div class="row">
                        <!-- Father and Mother Details -->
                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">ဖခင် အမည်</label>
                            <input type="text" wire:model="father_name" class="form-control form-control-sm" placeholder="Father's Name">
                            @error('father_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div wire:ignore class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">မှတ်ပုံတင် အမှတ်</label>
                            <select
                                class="form-select form-select-sm select-father-nrc-code"
                                id="data-select-father-nrc-code"
                                wire:model="father_nrc_code"
                                data-control="select2"
                                data-placeholder="Select an option"
                            >
                                <option></option>
                                @foreach ($nrcs as $nrc)
                                    <option @selected($father_nrc_code == $nrc['id']) value="{{ $nrc['id'] }}">
                                        {{ $nrc['name_mm'] }}
                                    </option>
                                @endforeach
                            </select>

                            @error('father_nrc_code')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-8 mb-3">
                            <label class="fw-semibold fs-6 mb-2">မှတ်ပုံတင် နံပါတ်</label>
                            <input type="text" wire:model="father_nrc_no" class="form-control form-control-sm @error('father_nrc_no') is-invalid @enderror" placeholder="NRC No">
                            @error('father_nrc_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">မိခင် အမည်</label>
                            <input type="text" wire:model="mother_name" class="form-control form-control-sm" placeholder="Mother's Name">
                            @error('mother_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div wire:ignore class="col-12 col-md-4 mb-3">
                            <label class="fw-semibold fs-6 mb-2">မှတ်ပုံတင် အမှတ်</label>
                            <select
                                class="form-select form-select-sm select-mother-nrc-code"
                                id="data-select-mother-nrc-code"
                                wire:model="mother_nrc_code"
                                data-control="select2"
                                data-placeholder="Select an option"
                            >
                                <option></option>
                                @foreach ($nrcs as $nrc)
                                    <option @selected($father_nrc_code == $nrc['id']) value="{{ $nrc['id'] }}">
                                        {{ $nrc['name_mm'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mother_nrc_code')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-8 mb-3">
                            <label class="fw-semibold fs-6 mb-2">မှတ်ပုံတင် နံပါတ်</label>
                            <input type="text" wire:model="mother_nrc_no" class="form-control form-control-sm @error('mother_nrc_no') is-invalid @enderror" placeholder="NRC No">
                            @error('mother_nrc_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="card card-flush mb-5 w-md-700px shadow-none border-1 border-gray-400">
            <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse" data-bs-target="#contact_info_collapsible">
                <h3 class="card-title">ဆက်သွယ်ရန် အချက်လက်</h3>
                <div class="card-toolbar rotate-180">
                    <i class="ki-duotone ki-down fs-1"></i>
                </div>
            </div>
            <div id="contact_info_collapsible" class="collapse show">
            <!--begin::Card body-->
            <div class="card-body p-3 pb-6">
                <!--begin::Scroll-->
                <div class="d-flex flex-column px-5 px-lg-10">
                    <div class="row">
                        <!-- Contact and Address Details -->
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">ကျောင်သား ဖုန်း</label>
                            <input type="tel" wire:model="student_phone" id="student_phone" class="form-control form-control-sm @error('student_phone') is-invalid @enderror" placeholder="Student Phone">
                            @error('student_phone')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">အုပ်ထိန်းသူ ဖုန်း</label>
                            <input type="text" wire:model="parent_phone" id="parent_phone" class="form-control form-control-sm @error('student_phone') is-invalid @enderror" placeholder="Parent Phone">
                            @error('parent_phone')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">နေရပ်လိပ်စာ</label>
                            <textarea wire:model="address" class="form-control form-control-sm" placeholder="Address"></textarea>
                            @error('address')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
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

@script
<script>
    Inputmask({
        "mask" : "99-99-9999"
    }).mask("#date_of_birth");
</script>
@endscript


@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            function initializeSelect2(selectElementId, livewireProperty) {
                const selectElement = $(selectElementId);

                // Initialize Select2
                selectElement.select2({
                    placeholder: selectElement.data('placeholder'),
                    allowClear: true,
                });

                // Sync value with Livewire
                selectElement.on('change', function (e) {
                @this.set(livewireProperty, e.target.value || null);
                });

                // Reinitialize Select2 after Livewire updates
                Livewire.hook('morph.updated', (el, component) => {
                    if (el instanceof HTMLElement && el.querySelector(selectElementId)) {
                        selectElement.select2('destroy').select2({
                            placeholder: selectElement.data('placeholder'),
                            allowClear: true,
                        });
                    }
                });
            }



            initializeSelect2('#data-select-type', 'type');
            initializeSelect2('#data-select-major', 'major');
            initializeSelect2('#data-select-get-university', 'get_university');

            initializeSelect2('#data-select-student-nrc-code', 'student_nrc_code');
            initializeSelect2('#data-select-father-nrc-code', 'father_nrc_code');
            initializeSelect2('#data-select-mother-nrc-code', 'mother_nrc_code');
        });
    </script>
@endpush

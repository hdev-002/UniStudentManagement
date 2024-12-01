<div class="mt-9 max-w-100">
    <div class="card card-flush pt-1 mb-5 mb-lg-10" id="kt_block_ui_2_target">
        <!--begin::Card header-->
        <div class="card-header mb-5">
            <!--begin::Card title-->
            <h3 class="card-title">

                <div class="text-secondary-emphasis fs-5" wire:loading>
                    <i class="fa fa-spinner fa-spin"></i>  Saving Draft...
                </div>
            </h3>
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->

        <div class="card-body pt-0">
            <!--begin::Form-->

            <form wire:ignore.self>

                <div class="d-flex flex-column px-5 px-lg-10">

                    <div class="row">
                        <div class="col-12 col-md-12 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Student</label>
                            <livewire:student-select componentId="studentSelect" />
                            @error('studentId')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Major</label>
                            <select wire:model.lazy="major" id="major_type_select" class="form-select major_type_select">
                                <option value=""></option>
                                @foreach ($majorType as $major)
                                    <option @selected($major['key'] == $major) value="{{ $major['key'] }}">{{ $major['value'] }}</option>
                                @endforeach
                            </select>
                            @error('major')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">University</label>
                            {{--                            <livewire:data-select2--}}
                            {{--                                :options="$uniType"--}}
                            {{--                                componentId="uniTypeSelect"--}}
                            {{--                                valueField="key"--}}
                            {{--                                labelField="value"--}}
                            {{--                                :defaultSelected="$get_university"--}}
                            {{--                            />--}}

                            <select wire:model.lazy="get_university" id="unitype_type_select" class="form-select unitype_type_select">
                                <option value=""></option>
                                @foreach ($uniType as $uni)
                                    <option @selected($uni['key'] == $get_university) value="{{ $uni['key'] }}">{{ $uni['value'] }}</option>
                                @endforeach
                            </select>
                            @error('get_university')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Year of Attendance</label>
                            <select wire:model.lazy="year_of_attendance" id="year_of_attendance_select" class="form-select year_of_attendance_select">
                                <option value=""></option>
                                <option  @selected(1 == $year_of_attendance) value="1">First Year</option>
                                <option  @selected(2 == $year_of_attendance) value="2">Second Year</option>
                                <option  @selected(3 == $year_of_attendance) value="3">Third Year</option>
                                <option  @selected(4 == $year_of_attendance) value="4">Fourth Year</option>
                                <option  @selected(5 == $year_of_attendance) value="5">Fifth Year</option>

                            </select>
                            @error('approval_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label class="fw-semibold fs-6 mb-2">Desk No</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">{{ $desk_symbol }}</span>
                                <input wire:model.lazy="current_desk_no" type="number" class="form-control" />
                            </div>

                            @error('ar_wa_tha_no')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
                <!--begin::Actions-->
                <div class="text-center pt-10">
                    <button type="button" class="btn btn-light me-3" wire:click="discardData()">Discard</button>

                    {{--                    <button type="button" class="btn btn-primary" wire:click="createAndOtherStudent" wire:loading.attr="disabled">--}}
                    {{--                        <span class="indicator-label">Create & Other</span>--}}
                    {{--                        <span class="indicator-progress" wire:loading wire:targe="createAndOtherStudent">Please wait...--}}
                    {{--                																			<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
                    {{--                    </button>--}}

                    <button type="button" class="btn btn-primary" wire:click="createUniRegister" wire:loading.attr="disabled">
                        <span class="indicator-label">Create</span>
                        <span class="indicator-progress" wire:loading wire:targe="createUniRegister">Please wait...
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
        function initializeSelect2(selector, placeholder, livewireProperty) {
            $(selector).select2({
                placeholder: placeholder,
                allowClear: true,
            })
                .on('select2:select', function () {
                @this.set(livewireProperty, $(selector).select2("val"));
                })
                .on('select2:unselect', function () {
                @this.set(livewireProperty, null);
                });
        }

        document.addEventListener('livewire:init', () => {
            // Define target and button
            const button = document.querySelector("#kt_block_ui_2_button");
            const target = document.querySelector("#kt_block_ui_2_target");

            // Initialize KTBlockUI instance
            const blockUI = new KTBlockUI(target, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
            });

            // Function to toggle block state
            function toggleBlockUI() {
                if (blockUI.isBlocked()) {
                    blockUI.release();
                    if (button) button.innerText = "Block";
                } else {
                    blockUI.block();
                    if (button) button.innerText = "Release";
                }
            }

            // Block UI on page load
            blockUI.block();

            // Automatically unblock after initial content loads (optional delay)
            setTimeout(() => blockUI.release(), 500);

            // Add Livewire hooks for blocking during updates
            Livewire.hook('component.updating', () => {
                blockUI.block();
            });

            Livewire.hook('component.updated', () => {
                blockUI.release();
            });

            // Initial initialization
            initializeSelect2('#major_type_select', "Select Major", 'major');
            initializeSelect2('#unitype_type_select', "Select University", 'get_university');
            initializeSelect2('#year_of_attendance_select', "Select Years", 'year_of_attendance');

            // Re-initialize after Livewire updates
            Livewire.hook('morph.updated', () => {
                initializeSelect2('#major_type_select', "Select Major", 'major');
                initializeSelect2('#unitype_type_select', "Select University", 'get_university');
                initializeSelect2('#year_of_attendance_select', "Select Years", 'year_of_attendance');
            });
        });

    </script>


@endpush

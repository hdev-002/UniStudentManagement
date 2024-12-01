<div id="kt_app_content" class="app-content flex-column-fluid">

    <!-- Search Input -->
    <input type="text"
        class="form-control form-control-lg form-control-solid px-15"
        placeholder="Search "
        wire:model.live.debounce.150ms="search"
        wire:keydown.shift.enter="selectFirstResult" />
    <span class="text-gray-500 fs-6">Shift + Enter to Create Uni Record</span>

    <!-- Search Suggestions -->
    @if (strlen($search) >= 2)
        <div class="py-5">
            @if ($results->isEmpty())
                <!-- Empty State -->
                <div class="text-center">
                    <p class="text-gray-500">No results found for "{{ $search }}"</p>
                </div>
            @else
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-gray-800">Found {{ $results->count() }} {{ Str::plural('result', $results->count()) }}</span>
                </div>

                <!-- Results -->
                <div class="mh-200px scroll-y me-n5 pe-5">
                    @foreach ($results as $result)
                        <!--begin::User-->
                        <div class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 bg-gray-200 cursor-pointer mb-1" data-kt-search-element="customer">
                            <div class="symbol symbol-30px me-4">
                    <span class="symbol-label bg-light-primary">
                        <i class="ki-duotone ki-profile-circle fs-2 text-primary"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                    </span>
                            </div>

                            <!--begin::Info-->
                            <div class="fw-semibold">
                                <span class="fs-6 text-gray-800 me-2">{{ $result->name }}</span>
                                <span class="badge badge-light">{{ $result->student_code }}</span>
                                <div class="row">
                                    <span>{{ $result->father_name }}</span>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                    @endforeach
                </div>
            @endif
        </div>
    @endif
</div>

@script
<script>
    $wire.on('success', () => {
        toastr.success("New Uni Record Created");
    });
</script>
@endscript

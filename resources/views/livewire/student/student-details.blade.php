<div>
    <div class="d-flex align-items-center justify-content-between mb-3">
        <span class="d-flex align-items-center">
            <a href="{{ route('major-registration.index') }}" class="btn btn-icon btn-custom w-35px h-35px w-md-40px h-md-40px btn-active-light-secondary"><i class="fa-solid fa-arrow-left"></i></a>
            <span class="fw-bolder fs-2 ms-2">{{ $student->student_code }}</span>
            <span wire:loading class="text-secondary-emphasis ms-2"> <i class="fa fa-spinner fa-spin"></i>  Saving Draft...</span></span>

        <div>
            <a href="{{ route('uin-registration.edit', $student->id) }}" class="btn btn-sm btn-flex btn-outline-dark btn-outline btn-secondary align-self-center px-3">
                Edit
            </a>

            <button wire:click="printStudent()" class="btn btn-sm btn-flex btn-outline-dark btn-outline btn-secondary align-self-center px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                <i class="ki-outline ki-printer fs-3"></i>Print</button>
        </div>


    </div>
    <div id="print-area">
        <div class="card card-flush pt-3 mb-5 flex-row-fluid w-md-700px shadow-none border-1 border-gray-400">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2><i class="ki-outline ki-profile-circle fs-2 me-2"></i>{{ $student->name }}</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                        <tbody class="fw-semibold text-gray-900">

                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                            Level</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                            {{ $student->level == 0 ? 'မေဂျာတင်' : ($student->level == 1 ? 'First Year' : ($student->level == 2 ? 'Second Year' : ($student->level == 3 ? 'Third Year' : ($student->level == 4 ? 'Fourth Year' : ($student->level == 5 ? 'Fifth Year' : 'N/A'))))) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                            ဝင်ခွင့်စဥ်</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                               {{ $student->approval_no ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    အဝသ အမှတ်</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->ar_wa_tha_no ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    Type</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->type ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    Major</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->major ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    University</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->get_university ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    Student NRC</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{$student->studentNRC->nrc_code ?? '-'}}/{{ $student->studentNRC->name_mm ??'-' }} {{ $student->student_nrc_no ??'-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    Birthday</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                             {{ $student?->date_of_birth ? \Carbon\Carbon::parse($student->date_of_birth)->format('d M Y') : 'N/A' }} ({{ \Carbon\Carbon::parse($student?->date_of_birth)->age }} years)
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    Desk ID (Grade 10)</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->grade_10_desk_id ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    Total Mark (Grade 10)</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->grade_10_total_mark ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    Passed Year (Grade 10)</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->grade_10_passed_year ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    Father Name</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->father_name ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                   Father NRC</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{$student->fatherNRC->nrc_code ?? '-'}}/{{ $student->fatherNRC->name_mm ??'-' }} {{ $student->father_nrc_no ??'-'}}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                   Mother Name</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->mother_name ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                  Mother NRC</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{$student->motherNRC->nrc_code ?? '-'}}/{{ $student->motherNRC->name_mm ??'-' }} {{ $student->mother_nrc_no ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                   Student Phone</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->student_phone ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                    Parent Phone</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->parent_phone ?? '-' }}
                            </td>
                        </tr>

                        <tr>
                            <td class="text-muted py-2">
                                <div class="d-flex align-items-center">
                                   Address</div>
                            </td>
                            <td class="fw-bold text-end py-2">
                                {{ $student->address ?? '-' }}
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card body-->
        </div>

        <div class="card card-flush pt-3 mb-5 flex-row-fluid w-md-700px shadow-none border-1 border-gray-400">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>University Histories</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                        <thead>
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-nowrap gs-0">
                            <th class="">Desk ID</th>
                            <th class="">Year</th>
                            <th class="">Status</th>
                            <th class="">Assi A</th>
                            <th class="">Assi B</th>
                            <th class="">Remark</th>
                            <th class="min-w-100px">Date Added</th>
                        </tr>
                        </thead>

                        <tbody class="fw-semibold text-gray-900">
                        @forelse($universities as $university)
                            <tr>
                                <td>{{ $university->current_desk_symbol }}-{{$university->current_desk_no}}</td>
                                <td>{{ $university->year_of_attendance == 1 ? 'First Year' : ($university->year_of_attendance == 2 ? 'Second Year' : ($university->year_of_attendance == 3 ? 'Third Year' : ($university->year_of_attendance == 4 ? 'Fourth Year' : 'Fifth Year'))) }}</td>
                                <td>

                                    <!--begin::Badges-->
                                    <div class="badge {{ $university->is_win ? 'badge-light-success' : 'badge-light-danger' }}">
                                        {{ $university->is_win ? 'Win' : 'Fail' }}
                                    </div>
                                    <!--end::Badges-->
                                </td>
                                <td>{{ $university->assignment_a == 0 ? 'မပြီး' : 'ပြီး' }}</td>
                                <td>{{ $university->assignment_b == 0 ? 'မပြီး' : 'ပြီး' }}</td>
                                <td>{{ $university->note ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($university->created_at)->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card body-->
        </div>

    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('print-view-student-details', (html) => {

                const originalContent = document.body.innerHTML;
                document.body.innerHTML = html;
                window.print();
                document.body.innerHTML = originalContent;
                Livewire.restart();
            });
        });
    </script>
@endpush

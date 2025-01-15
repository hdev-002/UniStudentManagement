<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<style>
    @page {
        /*size: A5;*/
        margin: 5px;
    }
    .avoidBreak {
        page-break-inside:avoid;
    }
</style>
<body>
<div id="print-area" class="avoidBreak">
    <h2 class="fw-bold text-center">Mya Kun Thar</h2>
    <div class="card card-flush pt-3 mb-5 flex-row-fluid w-md-700px shadow-none border-0">
        <!--begin::Card header-->

        <!--end::Card header-->
        <div class="card-header ribbon ribbon-end">
            <div class="card-title">{{ $student->student_code }}</div>
            <div class="ribbon-label bg-primary text-dark fs-3">{{ $student->major }}</div>
        </div>
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Section-->
            <div class="mb-3">
                <!--begin::Details-->
                <div class="d-flex flex-wrap py-5">
                    <!--begin::Row-->
                    <div class="flex-equal me-5">
                        <!--begin::Details-->
                        <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                            <!--begin::Row-->
                            <tbody>
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">အမည် :</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $student->name ?? '-' }}
                                </td>
                            </tr>
                            <!--end::Row-->
                            <tr>
                                <td class="text-gray-500 min-w-175px w-175px">ဝင်ခွင့်စဥ် :</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $student->approval_no ?? '-' }}
                                </td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">အဝသအမှတ် :</td>
                                <td class="text-gray-800">{{ $student->ar_wa_tha_no ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">အမျိုးအစား :</td>
                                <td class="text-gray-800">{{ $student->type ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">မေဂျာ :</td>
                                <td class="text-gray-800"> {{ $student->major ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">တက္ကသိုလ် :</td>
                                <td class="text-gray-800"> {{ $student->get_university ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">ကျောင်းသားမှတ်ပုံတင် :</td>
                                <td class="text-gray-800">
                                    {{$student->studentNRC->nrc_code}}/{{ $student->studentNRC->name_mm }} {{ $student->student_nrc_no }}
                                </td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">မွေးသက္ကရ် :</td>
                                <td class="text-gray-800">
                                    {{ $student?->date_of_birth ? \Carbon\Carbon::parse($student->date_of_birth)->format('d M Y') : 'N/A' }} ({{ \Carbon\Carbon::parse($student?->date_of_birth)->age }} years)
                                </td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">ခုံနံပါတ်နှင့်ခုနှစ်(၁၀တန်း) :</td>
                                <td class="text-gray-800"> {{ $student->grade_10_desk_id ?? '-' }} ({{ $student?->grade_10_passed_year ?? '-' }})</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">အမှတ်ပေါင်း(၁၀တန်း) :</td>
                                <td class="text-gray-800"> {{ $student->grade_10_total_mark ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">အဖေအမည် :</td>
                                <td class="text-gray-800"> {{ $student->father_name ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">အဖေမှတ်ပုံတင် :</td>
                                <td class="text-gray-800">   {{$student->fatherNRC->nrc_code ?? '-'}}/{{ $student->fatherNRC->name_mm ?? '-' }} {{ $student->father_nrc_no ?? '-'}}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">အမေအမည် :</td>
                                <td class="text-gray-800"> {{ $student->mother_name ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">အမေမှတ်ပုံတင် :</td>
                                <td class="text-gray-800">   {{$student->motherNRC->nrc_code ?? '-'}}/{{ $student->motherNRC->name_mm ?? '-' }} {{ $student->mother_nrc_no ?? '-'}}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">ကျောင်းသားဖုန်း :</td>
                                <td class="text-gray-800"> {{ $student->student_phone ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">အုပ်ထိန်းသူဖုန်း :</td>
                                <td class="text-gray-800"> {{ $student->parent_phone ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">နေရပ်လိပ်စာ :</td>
                                <td class="text-gray-800"> {{ $student->address ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            </tbody></table>
                        <!--end::Details-->
                    </div>
                    <!--end::Row-->
            <!--begin::Section-->
            <div class="mt-2">
                <!--begin::Title-->
                <h5 class="mb-4 ">တက္ကသိုလ်မှတ်တမ်း:</h5>
                <!--end::Title-->
                <!--begin::Details-->
                <!--begin::Table-->
                <table class="table align-middle">
                    <!--begin::Table head-->
                    <thead>
                    <!--begin::Table row-->
                    <tr class="border-bottom border-gray-200 text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-150px">ခုံနံပါတ်</th>
                        <th class="min-w-125px">ခုနှစ်</th>
                        <th class="min-w-125px">အောင်/ရှုံး</th>

                    </tr>
                    <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-800">
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
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">တက္ကသိုလ် မှတ်တမ်းများ မရှိပါ</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Section-->
        </div>
        <!--end::Card body-->
    </div>
</div>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<style>
    @page {
        size: A5;
        margin: 5px;
    }
    .avoidBreak {
        page-break-inside:avoid;
    }
</style>
<body>
<div id="print-area" class="avoidBreak">
    <div class="card card-flush pt-3 mb-5 flex-row-fluid w-md-700px shadow-none border-1 border-gray-400">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2 class="fw-bold">{{ $student->name }}</h2>
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-2">
            <!--begin::Section-->
            <div class="mb-3">
                <!--begin::Details-->
                <div class="d-flex flex-wrap py-5">
                    <!--begin::Row-->
                    <div class="flex-equal me-5">
                        <!--begin::Details-->
                        <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                            <!--begin::Row-->
                            <tbody><tr>
                                <td class="text-gray-500 min-w-175px w-175px">ဝင်ခွင့်စဥ်:</td>
                                <td class="text-gray-800 min-w-200px">
                                    {{ $student->approval_no ?? '-' }}
                                </td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">အဝသအမှတ်:</td>
                                <td class="text-gray-800">{{ $student->ar_wa_tha_no ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">Type:</td>
                                <td class="text-gray-800">{{ $student->type ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">Major:</td>
                                <td class="text-gray-800"> {{ $student->major ?? '-' }}</td>
                            </tr>
                            <!--end::Row-->
                            </tbody></table>
                        <!--end::Details-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="flex-equal">
                        <!--begin::Details-->
                        <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                            <!--begin::Row-->
                            <tbody><tr>
                                <td class="text-gray-500 min-w-175px w-175px">Subscribed Product:</td>
                                <td class="text-gray-800 min-w-200px">
                                    <a href="#" class="text-gray-800 text-hover-primary">Basic Bundle</a>
                                </td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">Subscription Fees:</td>
                                <td class="text-gray-800">$149.99 / Year</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">Billing method:</td>
                                <td class="text-gray-800">Annually</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr>
                                <td class="text-gray-500">Currency:</td>
                                <td class="text-gray-800">USD - US Dollar</td>
                            </tr>
                            <!--end::Row-->
                            </tbody></table>
                        <!--end::Details-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Section-->
            <!--begin::Section-->
            <div class="mb-0">
                <!--begin::Title-->
                <h5 class="mb-4">Subscribed Products:</h5>
                <!--end::Title-->
                <!--begin::Product table-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                        <!--begin::Table head-->
                        <thead>
                        <!--begin::Table row-->
                        <tr class="border-bottom border-gray-200 text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-150px">Product</th>
                            <th class="min-w-125px">Qty</th>
                            <th class="min-w-125px">Total</th>

                        </tr>
                        <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-800">
                        <tr>
                            <td>
                                <label class="w-150px">Basic Bundle</label>
                                <div class="fw-normal text-gray-600">Basic yearly bundle</div>
                            </td>
                            <td>1</td>
                            <td>$149.99 / Year</td>
                        </tr>
                        <tr>
                            <td>
                                <label class="w-150px">Pro Bundle</label>
                                <div class="fw-normal text-gray-500">Basic yearly bundle</div>
                            </td>
                            <td>5</td>
                            <td>$949.99 / Year</td>
                        </tr>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Product table-->
            </div>
            <!--end::Section-->
        </div>
        <!--end::Card body-->
    </div>
</div>
</body>
</html>

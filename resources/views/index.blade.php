@php
$moduleName = "UniStudentManagement";
@endphp
<x-app-layout :navigationSection="$navSection" :moduleName="$moduleName">
    <livewire:unistudentmanagement::student-table />
</x-app-layout>


@push('scripts')
    <script>

    </script>
@endpush

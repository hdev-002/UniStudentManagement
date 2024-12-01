@php
$moduleName = "UniStudentManagement";
@endphp
<x-app-layout :navigationSection="$navSection" :moduleName="$moduleName">
    <livewire:unistudentmanagement::student-table for="major-registration" />
</x-app-layout>

@push('scripts')

@endpush


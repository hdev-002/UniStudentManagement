<div wire:ignore.self>
    <div wire:ignore>
        <select
            class="form-select select-{{ $componentId }}"
            id="data-select-{{ $componentId }}"
            wire:model="dataSelected"
            data-control="select2"
            data-placeholder="Select a student"
            data-url="{{ route('students.search') }}"
        >
        </select>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            function initSelect2() {
                const selectElement = $('#data-select-{{ $componentId }}');

                // Destroy any existing Select2 instance
                if (selectElement.hasClass('select2-initialized')) {
                    selectElement.select2('destroy');
                }

                // Initialize Select2 with AJAX loading
                selectElement.select2({
                    ajax: {
                        url: selectElement.data('url'),
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                search: params.term,
                                page: params.page || 1,
                            };
                        },
                        processResults: function (data, params) {
                            params.page = params.page || 1;
                            return {
                                results: data.results.map(item => {
                                    let level_label;
                                    if (item.level == 0) {
                                        level_label = "Major";
                                    } else if (item.level == 1) {
                                        level_label = "First Year";
                                    } else if (item.level == 2) {
                                        level_label = "Second Year";
                                    } else if (item.level == 3) {
                                        level_label = "Third Year";
                                    } else if (item.level == 4) {
                                        level_label = "Fourth Year";
                                    } else if (item.level == 5) {
                                        level_label = "Graduate";
                                    } else {
                                        level_label = "";
                                    }

                                    return {
                                        id: item.id,
                                        text: item.name + ' (' + item.student_code + ') ' + level_label
                                    };
                                }),
                                pagination: {
                                    more: data.pagination.more
                                }
                            };
                        },
                        cache: true,
                    },
                    placeholder: selectElement.data('placeholder'),
                    allowClear: true,
                });

                // Mark as initialized
                selectElement.addClass('select2-initialized');

                // Sync value with Livewire
                selectElement.on('change', function (e) {
                @this.set('dataSelected', e.target.value);
                });

                selectElement.val(1).trigger('change');
            }

            // Initialize Select2 when the page loads
            initSelect2();

            // Reinitialize Select2 when Livewire updates the DOM (DOM morphing)
            Livewire.hook('morph.updated', (info) => {
                const el = info.el;
                if ($(el).find('#data-select-{{ $componentId }}').length) {
                    initSelect2();
                }
            });
        });
    </script>
@endpush


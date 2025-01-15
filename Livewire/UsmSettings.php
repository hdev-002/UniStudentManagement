<?php

namespace Modules\UniStudentManagement\Livewire;

use Livewire\Component;

class UsmSettings extends Component
{
    public $yearOfRecord;

    public function mount()
    {
        $this->yearOfRecord = \Modules\UniStudentManagement\Models\UsmSettings::where('key', 'year_of_record')->value('value');
    }

    public function updated($field, $value)
    {
       if ($field == 'yearOfRecord') {
           $this->saveData();
       }
    }

    public function saveData()
    {
        // Validate the yearOfRecord
        $this->validate([
            'yearOfRecord' => 'required',
        ]);

        // Save or update the setting
        \Modules\UniStudentManagement\Models\UsmSettings::updateOrCreate(
            ['key' => 'year_of_record'],
            ['value' => $this->yearOfRecord]
        );

        session()->flash('success', 'Year of Record updated successfully!');
    }

    public function render()
    {
        return view('unistudentmanagement::livewire.usm-settings');
    }
}

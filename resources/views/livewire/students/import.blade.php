<?php
use App\Imports\StudentsImport;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

new class extends Component {
    use WithFileUploads;
    
    #[Validate('required|file|mimes:xlsx')]
    public $file;

    public function import()
    {
        $validated = $this->validate();

        Excel::import(new StudentsImport, $validated['file']);

        $this->file = null;
    }
}; ?>

<div>
    <form wire:submit.prevent="import">
        <input type="file" wire:model="file">
        <button type="submit">Import</button>
    </form>
</div>

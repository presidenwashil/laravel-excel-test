<?php
use App\Models\Course;
use App\Imports\StudentsImport;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

new class extends Component {
    use WithFileUploads;
    
    #[Validate('required|file|mimes:xlsx')]
    public $file;

    public $courses;

    public $course_id;

    public function mount()
    {
        $this->courses = Course::all();
    }

    public function import()
    {
        $validated = $this->validate();

        Excel::import(new StudentsImport($this->course_id), $validated['file']);

        $this->file = null;
    }
}; ?>

<div>
    <form wire:submit.prevent="import">
        <select name="course_id" id="course_id" wire:model="course_id" required>
            <option value="">Select a course</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>

        <input type="file" wire:model="file">
        <button type="submit">Import</button>
    </form>
</div>

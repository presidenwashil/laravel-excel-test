<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    protected $course_id;

    public function __construct($course_id)
    {
        $this->course_id = $course_id;
    }

    /**
    * @param array $row
    * @return Student | null
    */
    public function model(array $row)
    {
        $student = Student::firstOrCreate([
            'code' => $row[0],
            'name' => $row[1],
        ]);

        $course = Course::findOrFail($this->course_id);

        if (!$student->courses()->where('course_id', $course->id)->exists()) {
            $student->courses()->attach($course);
        }

        return null;
    }
}

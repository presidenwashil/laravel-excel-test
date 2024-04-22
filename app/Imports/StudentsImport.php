<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    * @return Student | null
    */
    public function model(array $row)
    {
        return new Student([
            'code' => $row[0],
            'name' => $row[1],
        ]);
    }
}

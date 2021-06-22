<?php

namespace App\Imports;


use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel as ConcernsToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow as ConcernsWhithHeadingRow;


class UserImport implements ConcernsToModel, ConcernsWhithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'rut' => $row['rut'],
            'email' => $row['email'],
            'password' => $row['password'],
        ]);
    }
}

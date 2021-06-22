<?php

namespace App\Imports;

use App\Models\Asignatura;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AsignaturaImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Asignatura([
            'nrc' => $row['nrc'],
            'codigo_asignatura' => $row['codigo_asignatura'],
            'rut_profesor' => $row['rut_profesor'],
            'nombre_profesor' => $row['nombre_profesor'],
        ]);
    }
}

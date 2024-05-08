<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegistrosRondines implements FromCollection,WithHeadings
{
    protected $data;


    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        // Define los encabezados que deseas agregar
        return [
            'Id',
            'Número_empleado',
            'Nombre_completo',
            'Hora',
            'Dia',
            'Plantel'
            // Agrega más encabezados según sea necesario
        ];
    }
}

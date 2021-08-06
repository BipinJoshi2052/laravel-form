<?php

namespace App\Exports;

use App\Models\Clients;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class CsvExport implements FromCollection
{
    public function headings():array {
        return [
                'Id',
                'Name',
                'Email',
                'Phone'
        ];
    }

    public function collection()
    {
        return collect(Clients::all());
    }
}

<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class UserViewExportQuery implements FromQuery
{
    use Exportable;

    public function __construct(string  $data, String $tipo)
    {
        $this->data = $data;
        $this->tipo = $tipo;
    }

    public function query()
    {
        //return Invoice::query()->whereYear('created_at', $this->year);
        return DB::select(
            'exec valetransp.relatoriogeral('.$this->data.', '.$this->tipo.')');

    }
}
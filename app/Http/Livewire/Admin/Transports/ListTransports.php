<?php

namespace App\Http\Livewire\Admin\Transports;

use App\Exports\UserViewExportQuery;
use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Transport;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListTransports extends AdminComponent
{
    public $state = [];

    public $transport;

    public function render()
    {
        $transports = Transport::where('TipoId', '=', 'T')
            ->where('MesAno', '=', '05/2022')->get();
        //dd($transports);
        return view('livewire.admin.transports.list-transports', [
            'transports' => $transports
        ]);
    }

    public function getCombustivel()
    {
        $dta = '05/2022';
        $combustivel = Transport::where('TipoId', '=', 'C')
            ->where('MesAno', '=', $dta)->get();
        //dd($combustivel);
        return view('livewire.admin.transports.list-combustivel', [
            'combustivel' => $combustivel
        ]);
    }

    public function exportVTransport($data, $tipo)
    {

       return (new UserViewExportQuery($data, $tipo))->download('vale_transport.xlsx');
    }
}
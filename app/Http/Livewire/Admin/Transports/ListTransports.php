<?php

namespace App\Http\Livewire\Admin\Transports;

use App\Exports\UserViewExportQuery;
use App\Http\Livewire\Admin\AdminComponent;
use App\Models\Transport;
use Livewire\Component;

class ListTransports extends AdminComponent
{
    public $state = [];

    public $transport;

    public function render()
    {
        $transports = Transport::query()->where('TipoId', '=','T');
        //dd($transports);
        return view('livewire.admin.transports.list-transports', [
            'transports' => $transports
        ]);
    }

    public function exportVTransport($data, $tipo)
    {

       return (new UserViewExportQuery($data, $tipo))->download('vale_transport.xlsx');
    }
}
<?php

namespace App\Http\Livewire\Admin\Transports;

use App\Models\Transport;
use Livewire\Component;

class ListCombustiveis extends Component
{
    public function render()
    {
        $dta = '05/2022';
        $combustivel = Transport::where('TipoId', '=', 'C')
            ->where('MesAno', '=', $dta)->get();
        //dd($combustivel);
        return view('livewire.admin.transports.list-combustiveis', [
            'combustivel' => $combustivel
        ]);
    }

    public function buscaEspecifica()
    {
        
        return view('livewire.admin.transports.list-combustiveis', [
            'combustivel' => $combustivel
        ]);

    }
}
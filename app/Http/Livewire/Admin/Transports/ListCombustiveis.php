<?php

namespace App\Http\Livewire\Admin\Transports;

use App\Models\Transport;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ListCombustiveis extends Component
{
    use WithFileUploads;

    public $transport;
    public $documentacao;

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
        $dta = '05/2022';
        $combustivel = Transport::where('TipoId', '=', 'C')
            ->where('MesAno', '=', $dta)->get();

        return view('livewire.admin.transports.list-combustiveis', [
            'combustivel' => $combustivel
        ]);

    }

    public function geraXML()
    {
        $combustivel = Transport::all();
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->setIndent(true);
        // Start a new document
        $xml->startDocument();
        // Start a element to put data in
        $xml->startElement('DSImpCEValor');
        // Data what goes in your element\
        foreach ($combustivel as $vl) {
            $xml->startElement('CE');
            $xml->writeAttribute('Nome', $vl->Nome);
            $xml->writeAttribute('CPF', $vl->CPF);
            $xml->writeAttribute('Cartao', $vl->Cartao);
            $xml->writeAttribute('Valor', $vl->Valor);
            $xml->endElement();
        }

        $xml->endElement();
        $xml->endDocument();

        // You put the XML content in this variable
        $contents = $xml->outputMemory();
        // Reset XML just in case
        $xml = null;

        Storage::put('projects.xml', $contents);

    }
}
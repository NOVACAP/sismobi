<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'valetransp.valetransportecombustivel';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'Id';

    protected $fillable = [
        'MesAno',
        'Data',
        'EmpregadoId',
        'Nome',
        'Matricula',
        'Cpf',
        'Linha',
        'LinhaDescricao',
        'Valor',
        'Quantidade',
        'QuantidadeExtra',
        'LiberaConsulta',
        'ValorTotal',
        'InclusaoManual',
        'TipoId',
    ];
}
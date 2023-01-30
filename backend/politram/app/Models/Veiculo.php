<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veiculo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'veiculos';
    protected $fillable = [
        'modelo',
        'marca',
        'placa',
        'cor',
        'quilometragem',
        'tipos_veiculo_id',
        'ano'
    ];

    public function tipo_veiculo()
    {
        return $this->belongsTo(TiposVeiculo::class);
    }
}

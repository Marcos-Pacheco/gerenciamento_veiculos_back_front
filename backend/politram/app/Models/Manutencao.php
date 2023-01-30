<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Manutencao extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'manutencoes';
    protected $fillable = [
        'descricao',
        'custo',
        'data_proxima_manutencao',
        'data_manutencao',
        'observacao',
        'tipos_servico_id',
        'veiculos_id',
        'users_id'
    ];

    public function tipo_servico()
    {
        return $this->belongsTo(TiposServico::class);
    }

    public function veiculo()
    {
        return $this->belongsTo(Veiculos::class);
    }
}

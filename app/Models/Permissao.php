<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PermissoesPremissa;

class Permissao extends Model {
    use HasFactory;

    protected $table = 'permissoes';
    protected $primaryKey = 'per_id';
    public $timestamps = false;

    protected $fillable = [
        'per_id',
        'per_nome',
        'per_rgb',
        'per_criado_em',
        'per_atualizado_em',
    ];

    public function Premissas() {
        return $this->hasMany(PermissoesPremissa::class, 'ppre_fk_per_id', 'per_id');
    }
}

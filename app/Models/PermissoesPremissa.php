<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Premissa;

class PermissoesPremissa extends Model {
    use HasFactory;

    protected $primaryKey = 'ppre_id';
    protected $table = 'permissoes_premissas';
    public $timestamps = false;

    protected $fillable = [
        'ppre_id',
        'ppre_fk_per_id',
        'ppre_fk_pre_id',
    ];

    public function Premissas() {
        return $this->hasMany(Premissa::class, 'pre_id', 'ppre_fk_pre_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}

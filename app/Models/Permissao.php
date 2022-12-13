<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    use HasFactory;

    protected $table = 'permissoes';
    protected $primaryKey = 'per_id';
    public $timestamps = false;

    protected $fillable = [
        'per_id',
        'per_nome',
        'per_rgb'
    ];
}

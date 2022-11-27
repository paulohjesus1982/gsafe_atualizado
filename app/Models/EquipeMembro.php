<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipeMembro extends Model {
    use HasFactory;
    protected $primaryKey = 'emem_id';

    protected $fillable = [
        'emem_id',
        'emem_fk_usu_id',
        'emem_fk_equ_id',
    ];
}

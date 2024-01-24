<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'departamento_id';
    protected $fillable = ['nome'];
    public $timestamps = true;

    public function cargos(): HasMany
    {
        return $this->hasMany(Cargo::class, 'departamento_id', 'departamento_id');
    }
}

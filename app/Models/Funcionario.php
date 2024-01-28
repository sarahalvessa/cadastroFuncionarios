<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    protected $primaryKey = 'func_id';
    protected $fillable = ['nome', 'email', 'password', 'data_nascimento', 'cargo_id'];
    public $timestamps = true;

    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'cargo_id');
    }
}

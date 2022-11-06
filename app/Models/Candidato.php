<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    public function vagas() {
        return $this->belongsToMany(Vaga::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

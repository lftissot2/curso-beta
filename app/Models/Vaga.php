<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    public const TIPO_PJ = 0;
    public const TIPO_CLT = 1;
    public const TIPO_FREELA = 2;

    public const VAGA_TITULO = [
        0 => "PJ",
        1 => "CLT",
        2 => "Freelancer",
    ];

    protected $fillable = [
        'titulo',
        'descricao',
        'ativa',
        'tipo',
    ];

    public function candidatos() {
        return $this->belongsToMany(User::class, 'candidato_vaga');
    }

    public function hasCandidato(User $user) {
        return $this->candidatos()->where('user_id', $user->id)->exists();
    }

    public function scopeAtivas($query) {
        return $query->whereAtiva(true);
    }
}

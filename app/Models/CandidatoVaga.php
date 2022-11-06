<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CandidatoVaga extends Pivot
{
    use HasFactory;

    public function scopeMinhasCandidaturas($query) {
        return $query->whereUserId(auth()->id());
    }
}

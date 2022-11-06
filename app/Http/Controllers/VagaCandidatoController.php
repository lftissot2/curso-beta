<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vaga;

class VagaCandidatoController extends Controller
{
    public function store(Vaga $vaga) {
        if ($vaga->ativa) {
            $vaga->candidatos()->attach(auth()->id());
        }
    }

    public function destroy(Vaga $vaga, User $user) {
        $vaga->candidatos()->detach(auth()->id());
    }
}

<?php

namespace App\Services;

use App\Models\CandidatoVaga;
use App\Models\User;
use App\Models\Vaga;

class DashboardService extends GenericService
{
    public function getAdminData() {
        return [
            'vagas' => Vaga::all()->count(),
            'candidatos' => User::whereCandidato()->count(),
            'candidaturas' => CandidatoVaga::count(),
        ];
    }

    public function getCandidatoData() {
        return [
            'vagas' => Vaga::whereAtiva(true)->count(),
            'candidaturas' => CandidatoVaga::minhasCandidaturas()->count(),
        ];
    }
}
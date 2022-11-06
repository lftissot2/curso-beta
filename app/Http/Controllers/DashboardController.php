<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function candidato(DashboardService $dashboardSvc) {
        if (auth()->user()->is_admin) {
            $stats = $dashboardSvc->getAdminData();
        } else {
            $stats = $dashboardSvc->getCandidatoData();
        }

        $data = [
            'stats' => $stats
        ];
        
        return view('dashboard.dashboard', $data);
    }
}

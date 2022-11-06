<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidatoService extends GenericService
{
    public string $model = User::class;

    use HasFactory;

    public function paginatedList($perPage, $filter = null, $sortBy = null, $sortDir = 'asc') {
        return $this->model::whereCandidato()
        ->when($filter, function ($q) use ($filter) {
            $q->where(function ($query) use ($filter) {
                $query->where('name', 'LIKE', "%$filter%")
                    ->orWhere('email', 'LIKE', "%$filter%")
                    ->orWhere('id', $filter);
            });
        })
        ->when($sortBy, fn ($q) => $q->orderBy($sortBy, $sortDir))
        ->paginate($perPage ?? 20);
    }
}
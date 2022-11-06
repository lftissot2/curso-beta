<?php

namespace App\Services;

use App\Models\Vaga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VagaService extends GenericService
{
    public string $model = Vaga::class;

    use HasFactory;

    public function paginatedList($perPage, $filter = null, $sortBy = null, $sortDir = 'asc') {
        return $this->model::when($filter, function ($q) use ($filter) {
                $q->where(function ($query) use ($filter) {
                    $query->where('titulo', 'LIKE', "%$filter%")
                        ->orWhere('descricao', 'LIKE', "%$filter%")
                        ->orWhere('id', $filter);
                });
            })
            ->when(! auth()->user()->is_admin, fn ($q) => $q->whereAtiva(true))
            ->when($sortBy, fn ($q) => $q->orderBy($sortBy, $sortDir))
            ->paginate($perPage ?? 20);
    }

    public function create(array $data): Model {
        if (! isset($data['ativa']))
            $data['ativa'] = false;
        
        return parent::create($data);
    }

    public function update(array $data): Model {
        if (! isset($data['ativa']))
            $data['ativa'] = false;
        
        return parent::update($data);
    }
}

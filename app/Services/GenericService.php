<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class GenericService
{
    use HasFactory;

    public string $model;

    public function create(array $data): Model {
        $newModel = new $this->model();
        $newModel->fill($data);
        $newModel->save();
        return $newModel;
    }

    public function update(array $data): Model {
        $modelToUpdate = $this->model::find($data['id']);
        $modelToUpdate->fill($data);
        $modelToUpdate->save();
        return $modelToUpdate;
    }

    public function delete(Model $model): ?bool {
        return $model->delete();
    }

    public function paginatedList($perPage) {
        return $this->model::paginate($perPage ?? 20);
    }
}

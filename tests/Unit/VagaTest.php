<?php

namespace Tests\Unit;

use App\Models\Vaga;
use App\Services\VagaService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class VagaTest extends TestCase
{
    use DatabaseTransactions;

    public VagaService $vagaSvc;

    public function setUp(): void
    {
        parent::setUp();
        $this->vagaSvc = resolve(VagaService::class);
    }

    public function testCanCreateVaga() {
        $data = [
            'titulo' => '::TITULO::',
            'descricao' => '::DESC::',
            'ativa' => true,
            'tipo' => 1,
        ];
        $this->vagaSvc->create($data);
        $this->assertDatabaseHas('vagas', $data);
    }

    public function testCanUpdateVaga() {
        $this->testCanCreateVaga();
        $data = [
            'id' => 1,
            'titulo' => 'MODIFIED TITLE'
        ];
        $this->vagaSvc->update($data);
        $this->assertDatabaseHas('vagas', $data);

    }

    public function testCanDeleteVaga() {
        $this->testCanCreateVaga();
        $vaga = Vaga::latest()->first();
        $this->vagaSvc->delete($vaga);
        $this->assertDatabaseMissing('vagas', ['titulo'=>'::TITULO::']);
    }
}

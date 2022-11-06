<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CandidatoTest extends TestCase
{
    use DatabaseTransactions;

    public User $user;

    public function setUp(): void {
        parent::setUp();
        $this->user = User::factory()->create(['is_admin'=>true]);
    }

    public function testeCanCreateCandidato(): void {
        $this->actingAs($this->user)->post('/candidatos', [
            'name' => '::NAME::',
            'email' => 'validemail@qjobs.com',
            'password' => '::PWD::',
        ]);

        $this->assertDatabaseHas('users', ['name'=>'::NAME::']);
    }

    public function testeCanUpdateCandidato(): void {
        $this->testeCanCreateCandidato();
        $userId = User::latest()->first()->id;
        $this->patch("/candidatos/$userId", ['name' => '::NEWNAME::']);
        $this->assertDatabaseHas('users', ['name' => '::NEWNAME::']);
    }

    public function testeCanDeleteCandidato(): void {
        $this->testeCanCreateCandidato();
        $userId = User::latest()->first()->id;
        $this->delete("/candidatos/$userId");
        $this->assertDatabaseMissing('users', ['id'=>$userId]);
    }
}

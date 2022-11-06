<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVagaRequest;
use App\Http\Requests\UpdateVagaRequest;
use App\Models\Vaga;
use App\Services\VagaService;

class VagaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('is-admin')
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VagaService $vagaSvc)
    {
        if (request()->wantsJson()) {
            $vagas = $vagaSvc->paginatedList(
                request()->get('per-page'),
                request()->get('filter'),
                request()->get('sort-by'),
                request()->get('sort-dir'),
            );
            
            return response()->json($vagas);
        }
        return view('vaga.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaga.form', ['vaga'=>new Vaga()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVagaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVagaRequest $request, VagaService $vagaSvc)
    {
        $vagaSvc->create($request->validated());
        return view('vaga.list', ['created'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show(Vaga $vaga)
    {
        return response()->view('vaga.view', ['vaga'=>$vaga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaga $vaga)
    {
        return view('vaga.form', ['vaga'=>$vaga]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVagaRequest  $request
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVagaRequest $request, Vaga $vaga, VagaService $vagaSvc)
    {
        $vagaSvc->update(array_merge(['id' => $vaga->id], $request->validated()));
        return view('vaga.list', ['updated'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaga $vaga, VagaService $vagaSvc)
    {
        $vagaSvc->delete($vaga);
    }
}

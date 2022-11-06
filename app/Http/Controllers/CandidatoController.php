<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidatoRequest;
use App\Http\Requests\UpdateCandidatoRequest;
use App\Models\Candidato;
use App\Models\User;
use App\Services\CandidatoService;

class CandidatoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is-admin']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CandidatoService $candidatoSvc)
    {
        $candidatos = $candidatoSvc->paginatedList(
            request()->get('per-page'),
            request()->get('filter'),
            request()->get('sort-by'),
            request()->get('sort-dir'),
        );
        if (request()->wantsJson()) {
            return response()->json($candidatos);
        }
        return view('candidato.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidato.form', ['candidato'=>new Candidato()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCandidatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCandidatoRequest $request, CandidatoService $candidatoSvc)
    {
        $candidatoSvc->create($request->validated());
        return view('candidato.list', ['created'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(User $candidato)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(User $candidato)
    {
        unset($candidato->password);
        return view('candidato.form', ['candidato'=>$candidato]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCandidatoRequest  $request
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCandidatoRequest $request, User $candidato, CandidatoService $candidatoSvc)
    {
        $candidatoSvc->update(array_merge(['id' => $candidato->id], $request->validated()));
        return view('candidato.list', ['updated'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $candidato, CandidatoService $candidatoSvc)
    {
        $candidatoSvc->delete($candidato);
        return view('candidato.list', ['deleted' => true]);
    }
}

@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="alert">
    <b>Dados inválidos</b>
    <ul>
        @foreach($errors->getMessages() as $this_error)
        <li>{{$this_error[0]}}</li>
        @endforeach

    </ul>
</div>
@endif

<h4 class="blue-grey-text text-darken">Nova vaga</h4>
<form action="/vagas/{{ $vaga->id }}" method="POST">
    @method($vaga->id ? 'PATCH' : 'POST')
    @csrf
    <div class="row">
        <div class="input-field col m4">
            <input id="titulo" name="titulo" type="text" value="{{ $vaga->titulo }}">
            <label for="titulo">Título</label>
        </div>
        <div class="input-field col m4">
            <select name="tipo" value="{{ $vaga->tipo }}">
                <option value="0">PJ</option>
                <option value="1">CLT</option>
                <option value="2">Freelancer</option>
            </select>
            <label>Tipo da vaga</label>
        </div>
        <div class="col m4">
            <div class="switch" style="margin-top: 18px;">
                <label>
                    <input type="checkbox" name="ativa" value="1" {{ $vaga->ativa ? 'checked' : '' }}>
                    <span class="lever" style="margin-left: 0px;"></span>
                    Visível
                </label>
            </div>
        </div>
        <div class="input-field col s12">
            <textarea id="descricao" name="descricao" type="text" class="materialize-textarea">{{ $vaga->descricao }}</textarea>
            <label for="descricao">Descrição</label>
        </div>
        <div class="input-field col s12">
            <button type="submit" class="btn right">SALVAR</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('select').formSelect();
    });
</script>
@endsection

@section('styles')
<style>
    .alert {
        background-color: #ffcccc;
        border-radius: 8px;
        padding: 16px;
        border: 1px solid #ff8080;
    }

    .alert>ul {
        margin: 0px;
    }
</style>
@endsection
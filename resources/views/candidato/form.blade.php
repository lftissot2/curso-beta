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

<h4 class="blue-grey-text text-darken">Novo candidato</h4>
<form action="/candidatos/{{ $candidato->id }}/" method="POST">
    @csrf
    @method($candidato->id ? 'PATCH' : 'POST')
    <div class="row">
        <div class="input-field col s6">
            <input id="name" name="name" type="text" class="validate" value="{{ $candidato->name }}">
            <label for="name">Nome</label>
        </div>
        <div class="input-field col s6">
            <input id="email" name="email" type="text" class="validate" value="{{ $candidato->email }}">
            <label for="email">Email</label>
        </div>
        <div class="input-field col s6">
            <input id="password" name="password" type="password" class="validate" value="{{ $candidato->password }}">
            <label for="password">Senha</label>
        </div>
        <div class="input-field col s12">
            <button type="submit" class="btn right">SALVAR</button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
@endsection

@section('styles')
<style>
    .alert {
        background-color: #ffcccc;
        border-radius: 8px;
        padding: 16px;
        border: 1px solid #ff8080;
    }

    .alert > ul {
        margin: 0px;
    }
</style>
@endsection
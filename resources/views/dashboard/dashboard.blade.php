@extends('layouts.app')

@section('content')
<h3 class="grey-text text-lighten-1" style="font-weight: 100;">Olá, {{ auth()->user()->name}}!</h3>
<div class="row">
    @if(auth()->user()->is_admin)
    <div class="card col s3 blue lighten-2 dash-card white-text">
        <span class="value">{{ $stats['candidatos'] }}</span>
        <span class="label">CANDIDATOS</span>
    </div>
    @endif
    <div class="card col s3 green lighten-2 dash-card white-text">
        <span class="value">{{ $stats['vagas'] }}</span>
        <span class="label">VAGAS</span>
    </div>
    <div class="card col s3 orange lighten-2 dash-card white-text">
        <span class="value">{{ $stats['candidaturas'] }}</span>
        <span class="label">CANDIDATURAS</span>
    </div>
</div>
@endsection

@section('styles')
<style>
    .dash-card {
        margin: 20px;
        padding: 20px !important;
    }

    .dash-card>.value {
        font-weight: 700;
        opacity: 0.5;
        font-size: 80px;
        display: block;
        line-height: 80px;
    }

    .dash-card>.label {
        font-weight: 300;
    }
</style>
@endsection
@extends('layouts.app')

@section('content')
<h4 class="blue-grey-text text-darken">
    {{ $vaga->titulo }}
    @if(auth()->user()->is_admin)
        <a href="/vagas/{{$vaga->id}}/edit" class="btn green right">EDITAR</a>
    @else
        @if($vaga->hasCandidato(auth()->user()))
            <button onclick="cancelarCandidatura()" class="btn grey right">CANCELAR CANDIDATURA</button>
        @else
            @if($vaga->ativa)
                <button onclick="candidatar()" class="btn green right">CANDIDATAR</button>
            @else
            <div class="right">
                <button class="btn green right" disabled>VAGA PAUSADA</button>
            </div>
            @endif
        @endif
        
    @endif
</h4>
<p>{{ $vaga->descricao }}</p>

@if(auth()->user()->is_admin)
    <h5>Candidatos</h5>
    @if($vaga->candidatos->count() == 0)
    Nenhum candidato.
    @else
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
                @foreach($vaga->candidatos as $candidato)
                    <tr>
                        <td>{{$candidato->name}}</td>
                        <td>{{$candidato->email}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endif



@endsection

@section('scripts')
<script>
    function candidatar() {
        fetch('/vagas/{{$vaga->id}}/candidatos', {
            method: "POST",
        }).then(() => {
            location.reload();
        });
    }

    function cancelarCandidatura() {
        fetch('/vagas/{{$vaga->id}}/candidatos/{{auth()->user()->id}}', {
            method: "DELETE",
        }).then((data) => {
            location.reload();
        });
    }
</script>
@endsection

@section('styles')
@endsection
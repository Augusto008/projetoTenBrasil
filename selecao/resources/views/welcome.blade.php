@extends('layouts.main')

@section('title', 'CRUD It On')

@section('content')

<div id="cabecalho">
    <h1 id="titulo" class="titulo">CRUD it on</h1>
</div>
<nav id="crud">
    <div id="btnsCabecalho">
        <a class="linkBtn" href="/formulario"><button id="btnCreate" class="btn" type="button"><strong>CREATE</strong></button></a>
        <a class="linkBtn" href=""><button id="btnRead" class="btn" type="button"><strong>READ</strong></button></a>
        <a class="linkBtn" href=""><button id="btnUpDate" class="btn" type="button"><strong>UPDATE</strong></button></a>
        <a class="linkBtn" href=""><button id="btnDelete" class="btn" type="button"><strong>DELETE</strong></button></a>
    </div>
</nav>
<div id="corpo">
    <div id="s_titulo">
        <h2 id="subtitulo" class="titulo">Cadastros Ativos</h2>
    </div>
    <div id="conteudo">
        
    @foreach($animals as $ani)
    @if($ani->status == true)
        <button class="cardAnimal">
            <h3 class="nomeAnimal">{{ $ani->id }} - {{$ani->nome}}</h3>
            <img class="fotoPerfil" src="img/{{$ani->image}}">
            <div class="infoAnimal">
                <p class="info">{{ $ani->resumo }}</p>
                <table class="cardControl">
                    <tr>
                        <td size="50%">
                            <a href="/formulario/{{$ani->id}}">
                                <button id="cardUpDate" class="cardBtn" type="SUBMIT">
                                    <strong>
                                        UPDATE
                                    </strong>
                                </button>
                            </a>
                        </td>
                        <td size="50%">
                            <form action="/animals/{{$ani->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="cardDelete" class="cardBtn" type="SUBMIT"><strong>DELETE</strong></button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </button>
    @endif
    @endforeach
    
    </div>
</div>

@endsection
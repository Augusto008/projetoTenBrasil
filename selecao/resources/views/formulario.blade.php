@extends('layouts.main')

@section('title', 'formulário')

@section('content')

<div id="cabecalho">
    <h1 id="titulo" class="titulo">CRUD it on</h1>
</div>
<div id="crud">
    <h2 id="subtitulo" class="titulo">
        @if($edt == 1)
            Editar
        @else
            Cadastro
        @endif 
        Animal
    </h2>
</div>
<div id="corpo">
    <p id="intro" class="intro">
        Preencha as informações abaixo e clique em enviar para concluir o cadastro.
    </p>
    <br/>
    @if($edt == 1)
        <form action="/formulario/update/{id}" method="POST" ectype="multipart/form-data">
        @csrf
        @method('PUT')
        <input class="campoLinha" name="id" type="hidden" value="{{ $animals->id }}" display="none">
    @else
        <form action="/animals" method="POST" enctype="multipart/form-data">
        @csrf
    @endif
        <table class="formulario" width="100%">
            <tr>
                <td width="100%" colspan="2">
                    <label class="tituloAtributo" for="nome">Nome: </label><br/>
                    @if($edt == 1)
                        <input class="campoLinha" id="nome" name="nome" type="text" size="53" maxlength="200" placeholder="Mico-leão-dourado" value="{{ $animals->nome }}" autocomplete="off"/>
                    @else
                        <input class="campoLinha" id="nome" name="nome" type="text" size="53" maxlength="200" placeholder="Mico-leão-dourado" value="" autocomplete="off"/>
                    @endif
                </td>
            </tr>
            <tr>
                <td width="100%" colspan="2">
                    <label class="tituloAtributo" for="resumo">Resumo: </label><br/>
                    @if($edt == 1)
                        <textarea class="campoMultiLinha" id="resumo" name="resumo" type="text" cols="50" rows="10" placeholder="Pequeno primata brasileiro cuja pelagem lembra ouro." autocomplete="off">{{ $animals->resumo }}</textarea>
                    @else
                        <textarea class="campoMultiLinha" id="resumo" name="resumo" type="text" cols="50" rows="10" placeholder="Pequeno primata brasileiro cuja pelagem lembra ouro." autocomplete="off"></textarea>
                    @endif
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <label for="image">Imagem: </label><br/>
                    <input class="imageUpLoad" id="image" type="file" name="image">
                </td>
                <td width="50%">
                    @if($edt == 1)
                        <label class="tituloAtributo" for="status">Ativar status do Cadastro? </label><br/>
                        <select class="campoSelect" id="status" name="status">
                    @else
                        <label class="tituloAtributo" for="status">Ativar status do Cadastro? </label><br/>
                        <select class="campoSelect" id="status" name="status">
                    @endif
                        <option value="true">Sim</option>
                        <option value="false">Não</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <button id="limpar" class="btn" type="reset">Limpar Formulário</button>
                </td>
                <td width="50%">
                    <button id="enviar" class="btn" type="submit">Enviar Formulário</button>
                </td>
            </tr>
        </table>
    </form>
</div>

@endsection
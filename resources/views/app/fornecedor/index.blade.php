@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')
    
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>

        
        <div class="informacao-pagina">
            <div class="" style="width: 30%; margin-left: auto; margin-right: auto">
                <form action="{{ route('app.fornecedor.listar') }}" method="GET">
                    @csrf
                    <input type="text" class="borda-preta" name="nome" placeholder="Nome">
                    <input type="text" class="borda-preta" name="site" placeholder="Site">
                    <input type="text" class="borda-preta" name="uf" placeholder="UF">
                    <input type="text" class="borda-preta" name="email" placeholder="E-mail">
                    <button type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
@if(isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="POST">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="POST">
        @csrf
@endif 

        <select name="fornecedor_id" class="borda-preta">
            <option>-- Selecione um Fornecedor --</option>

            @foreach($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}" {{ ( $produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
            @endforeach
        </select>
        {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

        <input type="text" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}" name="nome" placeholder="Nome">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <input type="text" class="borda-preta" value="{{ $produto->descricao ?? old('descricao') }}" name="descricao" placeholder="Descrição">
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

        <input type="text" class="borda-preta" value="{{ $produto->peso ?? old('peso') }}" name="peso" placeholder="Peso">
        {{ $errors->has('peso') ? $errors->first('peso') : '' }}

        <select name="unidade_id" class="borda-preta">
            <option>-- Selecione a Unidade de medida --</option>

            @foreach($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ ( $produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
        <button type="submit">Cadastrar</button>
    </form>
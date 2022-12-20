@if(isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="POST">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto-detalhe.store') }}" method="POST">
        @csrf
@endif 
        <input type="text" class="borda-preta" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" name="produto_id" placeholder="ID Produto">
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

        <input type="text" class="borda-preta" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" name="comprimento" placeholder="Comprimento">
        {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

        <input type="text" class="borda-preta" value="{{ $produto_detalhe->largura ?? old('largura') }}" name="largura" placeholder="Largura">
        {{ $errors->has('largura') ? $errors->first('largura') : '' }}

        <input type="text" class="borda-preta" value="{{ $produto_detalhe->altura ?? old('altura') }}" name="altura" placeholder="Altura">
        {{ $errors->has('altura') ? $errors->first('altura') : '' }}

        <select name="unidade_id" class="borda-preta">
            <option>-- Selecione a Unidade de medida --</option>

            @foreach($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ ( $produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
        <button type="submit">Cadastrar</button>
    </form>
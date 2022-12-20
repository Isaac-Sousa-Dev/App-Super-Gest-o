@if(isset($pedido->id)) <!-- SE HOUVER $pedido_id PARTIREMOS PARA O FLUXO DE ATUALIZAÇÃO -->
    <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="POST">
        @csrf
        @method('PUT')
@else <!-- SENÃO PARTIREMOS PARA O CADASTRO -->
    <form action="{{ route('pedido.store') }}" method="POST">
        @csrf
@endif 

        <select name="cliente_id" class="borda-preta">
            <option>-- Selecione um Cliente --</option>

            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ ( $pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
            @endforeach
        </select>
        {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

        <button type="submit">Cadastrar</button>
    </form>
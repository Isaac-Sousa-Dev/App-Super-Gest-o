@if(isset($cliente->id))
    <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="POST">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
@endif 

        <input type="text" class="borda-preta" value="{{ $cliente->nome ?? old('nome') }}" name="nome" placeholder="Nome">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <button type="submit">Cadastrar</button>
    </form>
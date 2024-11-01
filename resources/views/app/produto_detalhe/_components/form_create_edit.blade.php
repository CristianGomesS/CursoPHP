@if ($produto_detalhe)
    @if (isset($produto_detalhe->id))
        <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="POST">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('produto-detalhe.store') }}" method="POST">
                @csrf
    @endif

    <input type="text" name="produto_id" class="borda-preta" placeholder="ID Produto" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
    <input type="text" name="comprimento" class="borda-preta" placeholder="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
    <input type="text" name="largura" class="borda-preta" placeholder="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}
    <input type="text" name="altura" class="borda-preta" placeholder="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}">
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}

    <select name="unidade_id" id="">

        <option>Selecione a unidade de medida</option>
        @foreach ($unidade as $un)
            <option
                value="{{ $un->id }}"{{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $un->id ? 'selected' : '' }}>
                {{ $un->unidade }}</option>
        @endforeach

    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit" class="borda-preta">Atualizar</button>
    </form>
@else
    <p>Fornecedor não encontrado.</p>
@endif

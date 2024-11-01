@if ($produto)
    @if (isset($produto->id))
        <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="POST">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('produto.store') }}" method="POST">
                @csrf
    @endif

    <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <input type="text" name="descricao" class="borda-preta" placeholder="descrição"
        value="{{ $produto->descricao ?? old('descricao') }}">
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
    <input type="text" name="peso" class="borda-preta" placeholder="peso"
        value="{{ $produto->peso ?? old('peso') }}">
    {{ $errors->has('peso') ? $errors->first('peso') : '' }}

    <select name="unidade_id" id="">

        <option>Selecione a unidade de medida</option>
        @foreach ($unidade as $un)
            <option
                value="{{ $un->id }}"{{ ($produto->unidade_id ?? old('unidade_id')) == $un->id ? 'selected' : '' }}>
                {{ $un->unidade }}</option>
        @endforeach

    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit" class="borda-preta">Atualizar</button>
    </form>
@else
    <p>Fornecedor não encontrado.</p>
@endif

<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">home</a></li>
            <li><a href="{{ route('app.cliente') }}">Cliente</a></li>
            <li><a href="{{ route('produto.index') }}">Produto</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
            <li><a href="{{ route('app.sair') }}">Sair</a></li>
        </ul>
        
{{--   @if ($errors->any())
      <div style="width: 100%; background: red">
            @foreach ($errors->all() as $erro )
                    
            <br>{{$erro}}
            @endforeach
            </div>
            @endif --}}
    </div>

</div>




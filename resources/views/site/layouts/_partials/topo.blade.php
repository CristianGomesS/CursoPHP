<div class="topo">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('site.index') }}">Principal</a></li>
            <li><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
            <li><a href="{{ route('site.contato') }}">Contato</a></li>
            <li><a href="{{ route('site.login') }}">Login</a></li>
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




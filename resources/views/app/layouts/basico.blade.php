<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>

<body>
    <div>
        @include('app.layouts._partials.topo')
    </div>
    <div>
        @yield('conteudo')
    </div>
    <div>
        @include('app.layouts._partials.bottom')
    </div>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    @yield('styles')
</head>

<body>
    <nav class="deep-orange lighten-1">
        <div class="nav-wrapper">
            <a href="#" data-target="slide-out" style="margin: 0px 20px; width: 32px; display: inline;" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
            <a href="#" class="brand-logo">Vagas Curso Beta</a>
        </div>
    </nav>
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="/img/work.jpg" style="width: 360px;">
                </div>
                <a href="#user"><img class="circle" src="/img/profile.jpg"></a>
                <a href="#name"><span class="white-text name">{{ auth()->user()->name }}</span></a>
                <a href="#email"><span class="white-text email">{{ auth()->user()->email }}</span></a>
            </div>
        </li>
        <li><a href="/"><i class="material-icons">dashboard</i>Dashboard</a></li>
        <li><a href="/vagas"><i class="material-icons">build</i>Vagas</a></li>
        @if(auth()->user()->is_admin)
        <li><a href="/candidatos"><i class="material-icons">person</i>Candidatos</a></li>
        @endif
        <li>
            <div class="divider"></div>
        </li>
        <li><a class="waves-effect" href="/logout"><i class="material-icons">logout</i>Sair</a></li>
    </ul>
    <div class="container" style="margin-top: 16px;">
        @yield('content')
    </div>
</body>

@yield('scripts')

<script>
    $(document).ready(function() {
        $('.sidenav').sidenav();
    });

    @if(session('message'))
    M.toast({
        html: '{{ session('message') }}'
    })
    @endif
</script>

</html>
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
    <div style="width: 100%; height: 100vh; display: flex; flex-direction: row;">
        <div style="width: 33%; display: flex; align-items: center; justify-content: center; background: url('img/work.jpg'); background-position-x: center; background-size: cover;" class="orange">
        </div>
        <div style="width: 67%; display: flex; align-items: center; justify-content: center;" class="grey lighten-4">
            <div class="card z-depth-0" style="padding: 20px; width: 400px; text-align: center;">
                <img src="/img/logo.png" style="width: 200px;" />
                <form action="/login" method="POST">
                    <div class="input-field">
                        <input id="email" name="email" type="text" class="validate">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field">
                        <input id="password" name="password" type="password" class="validate">
                        <label for="password">Senha</label>
                    </div>
                    <button type="submit" class="btn orange z-depth-0">Login</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>

@if(session('message') || $errors->any())
<script>
    M.toast({
        html: 'Usuário ou senha inválidos!'
    })
</script>
@endif

</html>
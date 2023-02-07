<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
         <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
         <!-- CSS bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
         <!-- CSS da Aplicação -->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="shortcut icon" href="/img/hdcevents_logo.svg" type="image/svg">
    </head>
    <body>
        <section class="header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header>
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <div class="collapse navbar-collapse justify-content-md-center" id="navbar">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a href="/" class="nav-link">Eventos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="/events/create" class="nav-link">Criar Eventos</a>
                                        </li>
                                        <a href="/" class="navbar-brand">
                                            <img src="/img/hdcevents_logo.svg" alt="Logo">
                                        </a>
                                        @auth
                                            <li class="nav-item">
                                                <a href="/dashboard" class="nav-link">Meus eventos</a>
                                            </li>
                                            <li class="nav-item">
                                                <form action="/logout" method="POST">
                                                    @csrf
                                                    <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                                                </form>
                                            </li>
                                        @endauth
                                        @guest
                                            <li class="nav-item">
                                                <a href="/login" class="nav-link">Entrar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="/register" class="nav-link">Cadastrar</a>
                                            </li>
                                        @endguest    
                                    </ul>
                                </div>
                            </nav>
                        </header>
                    </div>
                </div>
            </div>
        </section>
        <main>
            @if(session('msg'))
            <div class="container">
                <div class="row">
                    <div class='f'>
                        <div class='w'>
                            <p class="msg">
                                {{ session('msg') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            @yield('content')
        </main>
        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <footer>
                            <p>HDC EVENTS &copy; @php echo date('Y') @endphp</p>
                            <!-- Scripts JS -->
                            <script src="/js/script.js"></script>
                            <!-- Scripts JS Icons -->
                            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                        </footer>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
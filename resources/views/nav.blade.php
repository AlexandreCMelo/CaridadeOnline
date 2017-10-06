<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="#"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Map</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>


            <li class="nav-item">
                <a class="nav-link" href="/register">Cadastro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
            </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                    </li>
            @endguest
        </ul>

    </div>
</nav>
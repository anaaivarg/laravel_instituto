<header class="bg-header h-header flex flex-row justify-between items-center px-4 space-x-2">

    <img src="{{ asset('./images/monitor.svg') }}" alt="Logo" class="h-30 w-30 max-h-full">


    <h1 class="flex-1 text-center text-amber-50 text-6xl">Sistema de gestión escolar</h1>
    <div class="flex flex-row items-center space-x-2">
    @guest
            <a href="login"><button class="btn btn-soft btn-warning">
        Entrar
    </button></a>
            <a href="register"><button class="btn btn-soft btn-warning">
        Registrar
    </button>
            </a>
    @endguest
    @auth

        <span>{{auth()->user()->name}}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input class="btn btn-soft btn-warning" type="submit" value="Salir">
            </form>
        @role("admin")
            <a href="register"><button class="btn btn-soft btn-warning">
                    Administrar
                </button>
            </a>
        @endrole



        @endauth
    <button class="btn btn-soft btn-info">
        Idioma
    </button>
    </div>
</header>

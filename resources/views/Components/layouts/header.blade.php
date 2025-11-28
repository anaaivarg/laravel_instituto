<header class="bg-header h-header flex items-center px-4 space-x-2">

    <img src="{{ asset('images/monitor.svg') }}" alt="Mi imagen" class="h-[120px]">


    <h1 class="flex-1 text-center text-amber-50 text-[40px]">Sistema de gestión escolar</h1>
    @guest
    <button class="btn btn-soft btn-warning"><a href="login"></a>
        Entrar
    </button>
    <button class="btn btn-soft btn-warning">
        Registrar
    </button>
    @endguest
    @auth
        {{auth()->user()->name}}
        <button class="btn btn-soft btn-warning" Salir>

    @endauth
    <button class="btn btn-soft btn-info">
        Idioma
    </button>
</header>

<nav class="bg-nav h-nav flex flex-row justify-center items-center space-x-2">
    <button class="btn btn-active btn-info">
        <a href="{{route("about")}}">About</a>

    </button>
    <button class="btn btn-active btn-primary">
        Noticias
    </button>
    <button class="btn btn-active btn-warning">
        Contactar
    </button>
    <button class="btn btn-active btn-accent">
        Referencias
    </button>
    @role("admin")
    <a href="{{ route('profesor_listado') }}">
        <button class="btn btn-active btn-accent">
            Profesores
        </button>
    </a>

    <a href="{{ route('alumnos.listado') }}">
        <button class="btn btn-active btn-accent">
            Alumnos
        </button>
    </a>
    @endrole



</nav>

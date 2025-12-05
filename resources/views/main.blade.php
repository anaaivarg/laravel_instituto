<x-layouts.layout>
    @auth
        <div class="card relative top-5 left-5 bg-white image-full w-96 shadow-sm ">
            <figure>
                <img
                    src="{{asset("images/studens.jpg")}}"
                    alt="Shoes" class="w-full " />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Gestion alumnos</h2>
                <p>A card component has a figure, a body part, and inside body there are title and actions parts</p>
                <div class="card-actions justify-end">
                    <a href="alumnos"><button class="btn btn-primary">Gestionar Alumnos</button></a>
                </div>
            </div>
        </div>
    @endauth
    @guest
    <div
        class="hero h-full "
        style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);"
    >
        <div class="hero-overlay"></div>
        <div class="hero-content text-neutral-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold ">Bienvenido</h1>
                <p class="mb-5">
                    Lleva el control escolar
                </p>
                <button class="btn btn-primary">Entrar</button>
            </div>
        </div>
    </div>
        @endguest

</x-layouts.layout>

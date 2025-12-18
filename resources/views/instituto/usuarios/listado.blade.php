<x-layouts.layout>
    <div class="overflow-x-auto h-full w-full">
        <a href="{{ route('alumnos.create') }}">
            <button
                class="bg-green-600 cursor-pointer hover:bg-green-400 py-3 px-4 m-3 text-white font-bold rounded-lg">
                Añadir alumno
            </button>
        </a>
        <table class="table table-xs table-pin-rows table-pin-cols text-center">
            <tr>
                @foreach($campos as $campo)
                    <th class="p-3 text-white">{{$campo}}</th>
                @endforeach
                <th class="p-3 text-white">Editar</th>
                <th class="p-3 text-white">Eliminar</th>
            </tr>
            @foreach($usuarios as $usuario)
                <tr class="text-black">
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellido}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->fecha_nacimiento}}</td>
                    <td>{{$usuario->created_at}}</td>
                    <td>{{$usuario->updated_at}}</td>
                    <td class="text-center">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}">
                            <i class="fa-solid fa-pen-to-square  text-xl cursor-pointer hover:text-blue-400"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="/usuarios/{{$usuario->id}}" method="POST" class="formEliminar">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="bg-red-600 p-2 rounded-lg hover:bg-red-400">
                                <i class="fa-solid fa-trash text-white"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>

    </div>

</x-layouts.layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const forms = document.querySelectorAll('.formEliminar');

        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción eliminará el alumno.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then(result => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

    });
</script>


<x-layouts.layout>
    <div class="overflow-x-auto h-full w-full">

        <a href="{{ route('alumnos.create') }}">
            <button class="bg-green-600 hover:bg-green-400 py-3 px-4 m-3 text-white font-bold rounded-lg">
                Añadir alumnooooo
            </button>
        </a>

        <table class="table table-xs table-pin-rows table-pin-cols text-center">
            <thead>
            <tr>
                @foreach($campos as $campo)
                    <th class="p-3 text-white">
                        {{ ucfirst(str_replace('_', ' ', $campo)) }}
                    </th>
                @endforeach
                <th class="p-3 text-white">Editar</th>
                <th class="p-3 text-white">Eliminar</th>
            </tr>
            </thead>

            <tbody>
            @foreach($alumnos as $alumno)
                <tr class="text-black">
                    @foreach($campos as $campo)
                        @dd($campos)
                        <td>
                            {{ $alumno->$campo }}
                        </td>
                    @endforeach

                    <td>
                        <a href="{{ route('alumnos.edit', $alumno->id) }}">
                            <i class="fa-solid fa-pen-to-square text-xl hover:text-blue-400"></i>
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="formEliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 p-2 rounded-lg hover:bg-red-400">
                                <i class="fa-solid fa-trash text-white"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="flex justify-center mt-4 mb-4">
            {{ $alumnos->links() }}
        </div>
    </div>

</x-layouts.layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const forms = document.querySelectorAll('.formEliminar');

        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
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


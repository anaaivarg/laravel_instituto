<x-layouts.layout>
    <div class="flex flex-col justify-center items-center h-full bg-gray-400 text-black">

        <form id="editarAlumno" action="{{ route('usuarios.update',$user->id) }}" method="POST" class="bg-white p-3 rounded-xl m-3 flex flex-col gap-2">
            @csrf
            @method('PATCH')

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{$user->nombre }}">
            <div class="text-red-500 text-sm">
                {{$errors->first("nombre")}}
            </div>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" value="{{$user->apellido }}">
            <div class="text-red-500 text-sm">
                {{$errors->first("apellido")}}
            </div>

            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$user->fecha_nacimiento }}">
            <div class="text-red-500 text-sm">
                {{$errors->first("fecha_nacimiento")}}
            </div>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{$user->email }}">
            <div class="text-red-500 text-sm">
                {{$errors->first("email")}}
            </div>

            <input type="submit" class="btn btn-primary mt-2" value="Guardar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editarAlumno');

            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Evita el envío inmediato

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¿Quieres crear este alumno?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, guardar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Enviar el formulario
                    }
                });
            });
        });
    </script>
</x-layouts.layout>

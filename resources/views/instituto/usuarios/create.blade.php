<x-layouts.layout>
    <div class="flex flex-col justify-center items-center h-full bg-gray-400 text-black">
        <form id="crearAlumno" action="{{ route('usuarios.store') }}" method="POST" class="bg-white p-3 rounded-xl m-3 flex flex-col gap-2">
            @csrf

            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
            <div class="text-red-500 text-sm">
                {{$errors->first("nombre")}}
            </div>

            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}">
            <div class="text-red-500 text-sm">
                {{$errors->first("apellido")}}
            </div>

            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
            <div class="text-red-500 text-sm">
                {{$errors->first("fecha_nacimiento")}}
            </div>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            <div class="text-red-500 text-sm">
                {{$errors->first("email")}}
            </div>

            <input type="submit" class="btn btn-primary mt-2" value="Guardar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('crearAlumno');

            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Evita el envío inmediato

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¿Quieres crear este alumno?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, crear',
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

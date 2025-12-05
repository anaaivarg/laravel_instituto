<x-layouts.layout>
    <div class="overflow-x-auto h-full w-full">
        <a href="{{ route('alumnos.create') }}">
            <button class="bg-green-600 cursor-pointer hover:bg-green-400 py-3 px-4 m-3 text-white font-bold rounded-lg">Añadir alumno</button>
        </a>
        <table class="table table-xs table-pin-rows table-pin-cols">
            <tr>
                @foreach($campos as $campo)
                    <th class="p-3 text-white">{{$campo}}</th>
                @endforeach
                <th class="p-3 text-white">Editar</th>
                <th class="p-3 text-white">Eliminar</th>
            </tr>
            @foreach($alumnos as $alumno)
                <tr class="text-black">
                    <td>{{$alumno->id}}</td>
                    <td>{{$alumno->nombre}}</td>
                    <td>{{$alumno->apellido}}</td>
                    <td>{{$alumno->email}}</td>
                    <td>{{$alumno->fecha_nacimiento}}</td>
                    <td>{{$alumno->created_at}}</td>
                    <td>{{$alumno->updated_at}}</td>
                    <td>
                        <button class="bg-blue-600 cursor-pointer hover:bg-blue-400 py-3 px-4 text-white font-bold rounded-lg">Editar</button>
                    </td>
                    <td>
                        <form action="/alumnos/{{$alumno->id}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" onclick="confirmarDelete(event)" class="bg-red-600 cursor-pointer hover:bg-red-400 py-3 px-4 text-white font-bold rounded-lg">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</x-layouts.layout>

<script>
    function confirmarDelete(event) {
        event.preventDefault();

        if (confirm("Seguro que quieres eliminar el registro")) {
            event.target.closest("form").submit();
        }
    }
</script>

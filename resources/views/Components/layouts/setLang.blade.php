<select name="lang" onchange="window.location.href=this.value" id="" class="text-black" >
    <option value = ""  disabled selected class="text-black">Selecciona un opcion</option>
    @foreach(config("language") as $code =>$content)
        <option value="/lang/{{$code}}">{{$content['name']}} {{$content['flag']}}</option>

 @endforeach
</select>

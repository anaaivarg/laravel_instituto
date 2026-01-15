# Proyecto de instituto
Esta es una practica sobre Laravel en el modulo de servidor

## Creamos el proyecto de Laravel
Para instalar ejecuto lo siguiente
````bash
composer global require laravel/installer

# Limpiamos la cache
composer clear-cache

# Crear el proyecto
laravel new instituto
cd instituto
```` 

## Instalo breeze
Para instalar ejecuto lo siguiente
````bash
composer require laravel/breeze
```` 
Lo ejecutamos
````bash
php artisan breeze:install    
```` 

## Actualizamos Tailwind 

````bash
npx @tailwindcss/upgrade
```` 


## Creamos un script
Para ejecutar automaticamente el contenedor y Vite en package.json en el apartado de script.
Redireccionamos al puerto 8005 porque el 8000 no funciona
````bash
"local": "docker compose up -d && concurrently \"npm run dev\"  \"php artisan serve --port=8005\" "

```` 

## Creamos modelos
Creamos los modelos que necesitamos
````bash
 php artisan make:model User --all 
 php artisan migrate --seed
 
 > --all genera el modelo,la migracion,el controlador y el factory
 

```` 
## Comprobar las rutas
Para comprobar las rutas usamos
````bash
 php artisan route:list

```` 

## 5. Gestión de roles con Spatie Permission

Instalamos y configuramos Spatie para permisos y roles:

````bash
composer require spatie/laravel-permission

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
````


## Creamos seeders para los roles y usuarios:

````bash
php artisan make:seeder RolesSeeder
php artisan make:seeder UserSeeder
````


> Esto permite poblar la base de datos con roles y usuarios iniciales.

---

## 6. Crear controladores

Controladores creados:

````bash
# Controlador para usuarios
php artisan make:controller UserController --resource
````
# Controlador invocable para el idioma
````bash
php artisan make:controller LanguageController --invokable
````



## Insertado utilidad de traduccion
Instalo el paquete de gestion de idiomas
````bash
composer require laravel-lang/common
````
**Añado idioma**
````bash
 php artisan lang:add es
php artisan lang:add en
php artisan lang:add fr
````
## Acciones en el back
**Creo un controlador**
````bash
 php artisan make:Controller LanguageController -i
````
**Contenido del método del controlador**
````php
session()->put('locale', $locale);
app()->setLocale($locale);
return redirect()->back();
````
**Creamos un middleware**
````bash
php artisan make:Middleware SetLanguageMiddleware
````
**Escribimos el contenido**
````
En web.php añadimos
Route::get("lang/{lang}",[LanguageController::class])->name('change_lang');
````

````php
En el middleware escribimos:

public function handle(Request $request, Closure $next): Response
{
$locale= session()->get('locale') ?? config('app.locale');
app()->setLocale($locale);
return $next($request);
}
````

## Ahora el front
**Creamos un fichero de configuracion**
Para establecer idiomas disponibles
````php
<?php
return[
    "es"=>[
        "name"=>"Español",
        "flag"=>"🇪🇸",
    ],
    "fr"=>[
        "name"=>"France",
        "flag"=>"🇫🇷",
    ],
    "en"=>[
        "name"=>"English",
        "flag"=>"🇬🇧",
    ]
]
    ?>


````
**Creamos el componente html**

```html
<select name="lang" onchange="window.location.href=this.value" id="">
    <option value="" disabled checked>Selecciona un idioma</option>
    @foreach(config("languages") as $code =>$content)
    <option value="{{route(" set_lang
    ", $code)}}">{{$content['name']}} {{$content['flag']}}</option>
    @endforeach
</select>
```



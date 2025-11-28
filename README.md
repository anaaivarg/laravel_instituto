# Proyecto de instituto
Esta es una practica sobre Laravel en el modulo de servidor

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

##


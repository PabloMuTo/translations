# Translations

## Stack tecnológico

- PHP
- Framework Laravel 8
- PHPUnit

## About

He utilizado una programación orientada a dominio, estructurando el código en Application, Domain e Intrastructure.
De esta forma dependo menos del framework Laravel aunque aprovecho algunas de sus ventajas.
Cada capa se encarga de gestionar:

**Application:**
Contiene los diferentes casos de uso, como listar traducciones, filtrar, listar grupos, etc

**Domain:**
Contiene las entidades principales y la lógica de negocio que controlan dichas entidades.
He creado tres entidades principales: Locale, LocaleLang y Group
Defino igualmente las interficies que servirán de contrato que se tendrá que cumplir en infrastrucutra

**Infrastructure:**
Contiene toda la lógica con los elementos third-party (que podrían ser Base de datos, servicios externos, peticiones HTTP).
Aquí he incluido el archivo web.php con las rutas, y los repositorios con las peticiones api


## Notas

Me gustaría hacer una segunda entrega con algunos aspecto que me faltan, como el modal de detalles y el exportar a excel de los resultados.
He trabajado poco con tailwind css y me ha costado ajustarme perfectamente al diseño de figma.
Estoy abierto a poder explicaros las decisiones técnicas que he tomado y explicaros el código con mayor profundidad.



## Docker

No he incluido el docker con el que he montado el proyecto.
Si es necesario, avisame y lo incluyo en el repositorio.

## Ejecutar aplicación

```
composer install
npm install
npm run dev
php artisan serve
```

Antes de ejecutar la instalación es necesario copiar el .env.example a un archivo .env

```
copy .env.example .env
```

Y rellenar los datos para la autenticación de la api 

```
AUTH_API_TOKEN
AUTH_API_BASIC_USERNAME
AUTH_API_BASIC_PASSWORD
```

## Ruta

```
localhost:8000/list
```

## Ejecutar tests

```
./bin/phpunit test --color
```

## Otros

- Author: Pablo Muñoz (pablo.mu.to@gmail.com)
- Dedicación: 3horas 30 minutos

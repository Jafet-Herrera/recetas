<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[CMS Max](https://www.cmsmax.com/)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**
- **[Romega Software](https://romegasoftware.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

# recetas
Este es el primer proyecto del curso *Laravel 7 - Crea Aplicaciones y Sitios Web con PHP y MVC* https://www.udemy.com/course/curso-laravel-crea-aplicaciones-y-sitios-web-con-php-y-mvc. Dicho proyecto es realizado por Yael Herrera por medio del curso ya mencionado.

----Pasos a hacer al crear un proyectos---
  1 INSTALANDO npm AL PROYECTO
    npm install
    npm run dev
---Librerias externas del proyecto----
A continuación se describe la serie de pasos a realizar para sobre las librerias que se emplearon en el transcurso del proyecto:

1 AUNTETIFICACI{ON CON UI
  $ composer require laravel/ui
 
 1.1 CREANDO IMPLANTANDO EL PAQUETE DE AUTENTIFICACIÓN
    $ php artisan  ui auth
 
 1.2 Anexando bootstrap
  $ php artisan  ui bootstrap
  
  1.3 Anexando Vue.Js
    $php artisan  ui vue

2.SWEET ALERT2 https://www.npmjs.com/package/sweetalert2
   npm i sweetalert2
   
 3.INTERVATION IMAGE  
   $ composer require intervention/image
   
 4.Paquete para traducir a español
  $ composer require laraveles/spanish
  4.1 instalar en el proyecto la extensión de idioma en español
    $ php artisan laraveles:install-lang
  4.2 ingresa a config/app.php y en la linea 83 aproximadamente, en la sección "Application Locale Configuration" cambia el locale de 'en' a 'es'
                                    /*
                                    |--------------------------------------------------------------------------
                                    | Application Locale Configuration
                                    |--------------------------------------------------------------------------
                                    |
                                    | The application locale determines the default locale that will be used
                                    | by the translation service provider. You are free to set this value
                                    | to any of the locales which will be supported by the application.
                                    |
                                    */

                                    'locale' => 'es',
                                    
5. INSTALANDO MOMENT MOMENT JS https://momentjs.com/
  5.1 $ npm i --save moment
    5.1.1 ejecuta npm run dev o npm run watch
  5.2 Añade la libreria al proyecto en resources/js/bootstrap y pega el siguiente código:
        window.Comment = require('moment');
     DE nueva cuenta corre npm run dev o npm run watch

--Soluc{on de errores----
A continuación se describe la serie errores y la soluciones realiza para dicho momento.

  1 ERROR DE LOS CONTROLADORES
    1.1 Primero ve al archivo: app > Providers > RouteServiceProvider.php
    1.2 En ese archivo reemplace la línea protected $namespace = null;conprotected $namespace = 'App\Http\Controllers'; 


---Pasos a relizar pos Clonación del proyecto.-----

INSTALAR COMPOSER
  $ composer install

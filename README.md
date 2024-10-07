ACTIVIDAD 2: GUIA CONSULTAS SQL EN LARAVEL (QUERY BUILDER & ORM)
Mentora: Kenia Yaneth Paiz Chacón 
Tipo proyecto Individual FSJ22 Modalidad Virtual
Objetivo:
El objetivo de esta actividad es adquirir un dominio completo en el uso de Query Builder y ORM en
Laravel para realizar consultas SQL a una base de datos.
Indicaciones:
1. Crea un nuevo proyecto de Laravel y configura la conexión a una base de datos.
2. Basándote en el mini diagrama de la base de datos proporcionado, crea migraciones para
las dos tablas correspondientes y ejecútalas.
3. En un controlador, desarrolla métodos para cada uno de los ejercicios propuestos.
4. Asegúrate de que cada consulta esté correctamente escrita y probada antes de continuar.
5. No es necesario implementar vistas para esta actividad; solo se requiere la lógica de las
consultas SQL.
6. Añade comentarios explicativos en el código para una mejor comprensión.
7. Deberás entregar el repositorio del proyecto en GitHub para su evaluación.
En base a este diagrama deberás crear la base de datos y las migraciones
tomando en cuenta el nombre y los campos de cada tabla.
Realiza las siguientes consultas SQL en laravel:
El objetivo de esta tarea es ejecutar una serie de consultas SQL en Laravel para
gestionar datos relacionados con usuarios y pedidos.
Indicaciones:
1. Inserta al menos 5 registros en las tablas de usuarios y pedidos.
2. Recupera todos los pedidos asociados al usuario con ID 2.
3. Obtén la información detallada de los pedidos, incluyendo el nombre y correo
electrónico de los usuarios.
4. Recupera todos los pedidos cuyo total esté en el rango de $100 a $250.
5. Encuentra todos los usuarios cuyos nombres comiencen con la letra "R".
6. Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
7. Recupera todos los pedidos junto con la información de los usuarios, ordenándolos
de forma descendente según el total del pedido.
8. Obtén la suma total del campo "total" en la tabla de pedidos.
9. Encuentra el pedido más económico, junto con el nombre del usuario asociado.
10. Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

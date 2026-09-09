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

## Render deployment

This repository's production Docker image runs Nginx and PHP-FPM in one container.
Nginx listens on the `PORT` environment variable supplied by Render (or port `8080`
when it is run locally), so Render can detect and route HTTP traffic to the app.

1. In Render, create a **Web Service** from this repository and select the Docker
   runtime (or create it from [`render.yaml`](render.yaml)). Do not override the
   Docker build or start command: the Dockerfile runs `npm ci` and `npm run build`,
   then copies the generated `public/build` Vite manifest and assets into the
   production image. The image start command configures the HTTP server.
2. Set `APP_URL` to the exact public HTTPS URL for the service, for example
   `https://theatre-app.onrender.com`. Do not set `ASSET_URL` unless assets are
   deliberately hosted on a separate HTTPS domain. An empty or HTTP `APP_URL` /
   `ASSET_URL` makes browser requests for Vite assets mixed content and they will
   be blocked on the HTTPS site. For a persistent production database, also set `APP_KEY`,
   `DB_CONNECTION=mysql`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`,
   and `DB_PASSWORD`. Keep secrets out of Git. The container generates a
   temporary key and uses its bundled SQLite database when these are absent so
   a new web service can start successfully, but that fallback is ephemeral and
   must not be used for production data.
3. Deploy. The container applies outstanding migrations during startup, and
   Render should detect an HTTP listener on its assigned `PORT` rather
   than the PHP-FPM port (`9000`), which is only used internally by Nginx.
   Nginx's document root is `/var/www/public`, so `/build/assets/...` requests
   resolve to the compiled Vite files rather than being routed through Laravel.

After deployment, open the browser's Network tab and verify that the stylesheet
requested from `/build/assets/*.css` returns `200` over HTTPS. If it does not,
confirm the service is using the Docker runtime and has no dashboard build/start
command overriding this repository configuration.

### TiDB Cloud

TiDB Cloud Serverless requires encrypted MySQL connections. For a TiDB host
ending in `.tidbcloud.com`, the container automatically uses its system CA
bundle through Laravel's `MYSQL_ATTR_SSL_CA` setting. If your provider gives
you a custom CA certificate, mount it into the container and set
`MYSQL_ATTR_SSL_CA` to that file instead.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

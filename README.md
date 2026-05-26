
## Descrição do projeto
<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="Laravel" width="260">
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.1%2B-777BB4?style=flat-square&logo=php" alt="PHP"></a>
  <a href="#"><img src="https://img.shields.io/badge/Laravel-10.x-E94E3E?style=flat-square&logo=laravel" alt="Laravel"></a>
  <a href="#"><img src="https://img.shields.io/badge/Database-MySQL%2FMariaDB-4479A1?style=flat-square&logo=mysql" alt="Database"></a>
  <a href="#"><img src="https://img.shields.io/badge/TailwindCSS-3.0-38B2AC?style=flat-square&logo=tailwindcss" alt="Tailwind CSS"></a>
</p>

# Auth App

Uma aplicação Laravel para gestão de posts, categorias e usuários com autenticação segura.

---

## ✨ Visão geral

Auth App é um painel de publicação focado em conteúdo, pensado para ensinar e entregar um fluxo completo de CRUD:

- autenticação de usuário (login, cadastro e logout)
- criação, edição e exclusão de posts
- upload e exibição de imagens
- organização de posts por categoria
- interface moderna com Blade + Tailwind CSS
- rotas RESTful com controllers Laravel

---

## 🧩 O que tem no projeto

- Painel de posts com lista e cards responsivos
- Formulário de criação/edição de post com upload de imagem
- Cadastro e listagem de categorias
- Relacionamento `Post belongsTo Categoria`
- Validação de dados no backend
- Uso de `storage:link` para servir imagens
- Áreas protegidas por autenticação

---

## 🚀 Requisitos

- PHP 8.1 ou superior
- Composer
- MySQL ou MariaDB
- XAMPP no Windows (opcional)
- Node.js e npm (para compilar assets)
- Extensões PHP:
  - `pdo`
  - `mbstring`
  - `openssl`
  - `tokenizer`
  - `xml`
  - `ctype`
  - `json`
  - `fileinfo`

---

## ⚙️ Instalação

```bash
git clone <url-do-repositorio> auth-app
cd auth-app
composer install
copy  .env
php artisan key:generate
Auth App é uma aplicação web construída com Laravel para gerenciar posts e categorias com autenticação de usuário. O sistema permite:
- cadastro e login de usuários
- criação, edição e exclusão de posts
- upload de imagem para posts
- associação de posts com categorias
- interface simples e responsiva usando componentes Blade

## Requisitos para rodar o projeto

- PHP 8.1 ou superior
- Composer
- MySQL ou MariaDB
- XAMPP (opcional, mas recomendado no Windows)
- Node.js e npm (se for compilar assets frontend)
- Extensões PHP: `pdo`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `fileinfo`

## Instalação

1. Clone o repositório:
   ```bash
   git clone <url-do-repositorio> auth-app
   cd auth-app

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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

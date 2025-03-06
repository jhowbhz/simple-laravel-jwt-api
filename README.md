# Simple API with PHP with Laravel, JWT, and SQLite

<img src="https://github.com/user-attachments/assets/e892726f-5391-4986-b360-cfd7a4afe731" width="100%" alt="Go lang"/>

Este projeto é um estudo simples utilizando a linguagem PHP, com o poderoso framework Laravel, eu pessoalmente achei incrível o poder a facilidade de utilizar esse framework!

# Como baixar o projeto?
```bash
git clone https://github.com/jhowbhz/simple-laravel-jwt-api.git simple-laravel-jwt-api && cd simple-laravel-jwt-api
```

# Como instalar?
```bash
composer install
```

# Como rodar?
```bash
php artisan serve
```

# Tecnologias Utilizadas
PHP: Linguagem de programação para o desenvolvimento da API.

SQLite: Banco de dados leve para armazenar as informações.

JWT (JSON Web Tokens): Tecnologia de autenticação e autorização utilizando tokens.

Laravel: Framework utilizado nesse projeto.

# Endpoints usuários

POST /users: Cadastra um novo usuário

GET /users/1: Visualiza os dados de um usuário

PATH /users/1: Atualiza os dados de um usuário

DELETE /users/1: Deleta um usuário

# Endpoints autenticação

POST /auth/register: Registra um novo usuário.

POST /auth/login: Realiza o login do usuário e retorna um token JWT.

GET /auth/profile: Retorna as informações do perfil do usuário autenticado.

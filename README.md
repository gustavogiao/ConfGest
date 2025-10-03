# ConfGest
ConfGest é uma aplicação web desenvolvida em Laravel para gestão de conferências, muito simples, com o intuito de se perceber um pouco mais sobre laravel e a sua arquitetura MVC.
Para além da base da resolução das fichas iniciais da UC, introduzi a parte de testes com PEST com a garantia de 95% de coverage; garanti a utilização de form request's e actions nos controladores, para garantir o máximo de clean code, uso de tailwind.css para algo mais moderno e elegante. 

Basicamente trata-se de uma ficha de CRUD de conferências, com sponsors e speakers que o Admin pode gerir. O utilizador vê as conferências existentes e pode adicionar uma conferência à sua lista de idas. 

# Requisitos
PHP >= 8.1
Composer
Node.js & npm
SQLite/MySQL/PostgreSQL

# Instalação

1. Clone o repositório:
   git clone
2. Navegue até o diretório do projeto:
   cd confgest
3. Instale as dependências do Composer:
4. composer install
5. Copie o arquivo .env.example para .env:
6. cp .env.example .env
7. Gere a chave da aplicação:
8. php artisan key:generate
9. Configure o arquivo .env com as credenciais do banco de dados.
10. Execute as migrações e seeders:
11. php artisan migrate --seed

# Run

Se for Herd:
1. npm run dev

Se for Docker:
1. docker-compose up -d --build
2. docker-compose exec app php artisan migrate --seed
3. docker-compose exec app php artisan serve --host=
4. Acesse http://localhost:8000 no seu navegador.

# Instalar Pest (se necessário)
composer require pestphp/pest --dev
php artisan pest:install

## Criar testes
php artisan make:test NomeDoTeste --pest

## Rodar todos os testes
php artisan test

## Rodar testes com coverage
php artisan test --coverage

## Gerar relatório HTML de coverage
php artisan test --coverage --coverage-html=coverage

# Usar o Pink

## Instalar Pink
composer require pestphp/pink --dev

## Rodar Pink
php ./vendor/bin/pink

## Rodar testes com Pink
php artisan test --pink

# Outros comandos úteis
## Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

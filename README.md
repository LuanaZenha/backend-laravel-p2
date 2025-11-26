# Backend P2

Aplicação Laravel com Docker (PHP-FPM, Nginx, MySQL) já preparada com:
- CRUD de Categorias
- Subcategorias aninhadas (ex.: Tecnologia → Teclado/Mouse/Monitor/SSD/Memória) com campos opcionais de preço, marca e tipo
- Tema escuro com paleta azul petróleo e preto

## Stack e Serviços
- `php` (PHP 8.2 FPM) com extensões: `pdo_mysql`, `mbstring`, `gd`, `zip`, etc. e `composer`
- `nginx` servindo `src/public`
- `mysql` 8.0 com volume persistente interno, exposto em `localhost:3307` (mapeado para `3306` do container)

Observação: a porta pública do MySQL é configurável via `DB_PUBLIC_PORT` no `docker-compose.yml`; mantemos `3307` para evitar conflito com serviços locais.

## Pré-requisitos
- Docker e Docker Compose instalados

## Estrutura de Pastas
```
/
├─ docker-compose.yml
├─ .env.example              # variáveis do Compose (APP_PORT, etc.)
├─ /docker
│  ├─ php/Dockerfile
│  ├─ nginx/default.conf
│  └─ mysql/my.cnf
├─ /scripts
│  ├─ install.sh            # provisiona Laravel em src/ e aplica stubs
│  └─ start.sh              # inicia serviços e roda migrações/seed
├─ /src                     # projeto Laravel
│  ├─ app/
│  │  ├─ Models/Category.php
│  │  ├─ Models/Subcategory.php
│  │  └─ Http/Controllers/{CategoryController,SubcategoryController}.php
│  ├─ resources/views/
│  │  ├─ layouts/app.blade.php         
│  │  ├─ categorias/{index,create,edit}.blade.php
│  │  └─ subcategorias/{index,create,edit,_form}.blade.php
│  ├─ database/migrations/*             # categorias e subcategorias
│  ├─ database/seeders/CategorySeeder.php
│  └─ routes/web.php                    # rotas CRUD + sub-recursos
```

## Como executar (rápido)
1. Ajuste porta em `.env.example` se desejar (padrão `APP_PORT=8080`).
2. Suba os serviços e instale o projeto:
   - Linux/macOS/Git Bash/WSL: `scripts/install.sh`
   - Caso prefira manual:
     ```bash
     docker compose up -d
     docker compose exec php bash -lc "rm -rf /tmp/laravel && composer create-project laravel/laravel:^11.0 /tmp/laravel"
     docker compose exec php bash -lc "shopt -s dotglob && cp -r /tmp/laravel/* . && rm -rf /tmp/laravel"
     docker compose exec php bash -lc "cp .env.example .env || true"
     docker compose exec php bash -lc "php artisan key:generate"
     docker compose exec php bash -lc "shopt -s dotglob && cp -r /var/www/html-stubs/* /var/www/html/"
     docker compose exec php bash -lc "php artisan migrate"
     docker compose exec php bash -lc "php artisan db:seed --class=CategorySeeder"
     ```
3. Abra `http://localhost:8080`.

## Banco de Dados
- Padrão atual: MySQL (container), já configurado e com migrações/seed aplicados.
- Credenciais padrão:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=mysql
  DB_PORT=3306
  DB_DATABASE=backend_p2
  DB_USERNAME=backend
  DB_PASSWORD=backend
  ```

### Conectar pelo MySQL Workbench
- Host: `127.0.0.1`
- Port: `3307`
- User: `backend` (ou `root`)
- Password: `backend` (ou `root`)
- Database: `backend_p2`

### Alternativa: SQLite
Se preferir SQLite em desenvolvimento, ajuste `src/.env` para:
```env
DB_CONNECTION=sqlite
```
e garanta permissões de escrita em `src/database/database.sqlite`.

## Funcionalidades
- Categorias: `nome`, `descricao`
- Subcategorias: `nome`, `descricao`, `preco`, `marca`, `tipo`

## Rotas Principais
- Categorias: `Route::resource('categorias', CategoryController::class)`
- Subcategorias (aninhadas): `Route::resource('categorias.subcategorias', SubcategoryController::class)`
- Exemplos:
  - Listar categorias: `GET /categorias`
  - Subcategorias da categoria 1: `GET /categorias/1/subcategorias`
  - Criar subcategoria: `GET /categorias/{categoria}/subcategorias/create`

## Comandos úteis
- Subir serviços: `docker compose up -d`
- Ver status: `docker compose ps`
- Logs: `docker compose logs nginx`, `docker compose logs php`
- Migrações: `docker compose exec php bash -lc "php artisan migrate"`
- Seed: `docker compose exec php bash -lc "php artisan db:seed --class=CategorySeeder"`

## Dicas
- Alterar porta pública do MySQL: edite `DB_PUBLIC_PORT` em `docker-compose.yml` (ex.: `3308:3306`).
- Conflito com MySQL local: mantenha o mapeamento para `3307` ou pare o serviço local.
- Erro 500 com SQLite “attempt to write a readonly database”: ajuste permissões dentro do container PHP:
  ```bash
  docker compose exec php bash -lc "chown -R www-data:www-data storage bootstrap/cache database; chmod -R ug+rw storage bootstrap/cache database"
  ```
- Se quiser expor MySQL externamente, adicione o bloco `ports` ao serviço `mysql` no `docker-compose.yml` (p. ex. `"3306:3306"`) — lembre-se de parar qualquer MySQL local para evitar conflito.

Autora: Luana de Pinho Zenha 
Matricula: 202322133
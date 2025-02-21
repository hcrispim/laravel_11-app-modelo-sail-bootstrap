COMO CRIAR O LARAVEL 11 COM SAIL E BOOTSTRAP

1. **Criar um novo projeto Laravel com Sail**:
   ```bash
   curl -s "https://laravel.build/blog" | bash
   cd blog
   ./vendor/bin/sail up -d
   ```

2. **Instalar o Laravel Breeze**:
   ```bash
   ./vendor/bin/sail composer require laravel/breeze --dev
   ./vendor/bin/sail artisan breeze:install
   ```

3. **Instalar o Bootstrap**:
   ```bash
   ./vendor/bin/sail npm install bootstrap @popperjs/core
   ```

4. **Atualizar os arquivos CSS e JS**:
    - Abra `resources/css/app.css` e substitua seu conteúdo por:
      ```css
      @import "bootstrap/dist/css/bootstrap.min.css";
      ```
    - Edite `resources/js/app.js` para incluir o Bootstrap:
      ```javascript
      import 'bootstrap';
      ```

5. **Compilar os ativos**:
   ```bash
   ./vendor/bin/sail npm run dev
   ```

6. **Remover o Tailwind CSS (opcional)**:
    - Se você não quiser usar o Tailwind CSS, remova os diretivas `@tailwind` de `resources/css/app.css`.
    - Desinstale o Tailwind CSS e suas dependências:
      ```bash
      ./vendor/bin/sail npm uninstall tailwindcss postcss autoprefixer
      ```
    - Reinstale e recompile os ativos:
      ```bash
      ./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
      ```
7. ./vendor/bin/sail up -d

8. ./vendor/bin/sail php artisan migrate

9. usar localhost no browser

   Agora, seguindo estes passos, você deverá ter o Laravel 11 configurado com Sail e Breeze
   usando Bootstrap.

GIT
Quick setup — if you’ve done this kind of thing before or

https://github.com/hcrispim/laravel_11-app-modelo-sail-bootstrap.git

Get started by creating a new file or uploading an existing file. 

We recommend every repository include a README, LICENSE, and .gitignore.

…or create a new repository on the command line

echo "# laravel_11-app-modelo-sail-bootstrap" >> README.md

sudo git init

sudo git add README.md

sudo git add .

sudo git commit -m "primeiro commit"

sudo git branch -M main

sudo git remote add origin https://github.com/hcrispim/laravel_11-app-modelo-sail-bootstrap.git

sudo git push -u origin main

…or push an existing repository from the command line

git remote add origin https://github.com/hcrispim/laravel_11-app-modelo-sail-bootstrap.git

git branch -M main

git push -u origin main

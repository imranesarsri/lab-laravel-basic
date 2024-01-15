# lab laravel basic

## Travail à faire
- install `adminLTE` by npm
- Add the database including the projects table in the `seeders`
- Create the `CRUD` of the tasks
- Add `pagination`
- Include `search` and `filter` using `AJAX`

## Présentation :
[Présentation Live coding Lab Laravel Basic](https://docs.google.com/presentation/d/176TlPBFBSugG85ieaXXGPzOTf3MoXjWpkF5mYHJykJQ/edit?usp=sharing)

## 1. Installation Laravel 
```bash
composer create-project laravel/laravel .
```

## 2. Installing AdminLTE
1. Installing prerequisites
- Node.js
- NPM
- PHP 7.2.5 ou supérieur
- Un serveur web (Apache, Nginx, etc.)
2. Installing AdminLTE
```bash
npm install admin-lte@3.1.0 @fortawesome/fontawesome-free
```
3. Publishing AdminLTE assets
```bash
php artisan vendor:publish --provider="AdminLTE\AdminLTEServiceProvider"
```
4. Importing AdminLTE CSS and JavaScript
- In `resources/css/app.css`, import the CSS from AdminLTE and Font Awesome:\
```bash
@import 'admin-lte/plugins/fontawesome-free/css/all.min.css';
@import 'admin-lte/dist/css/adminlte.min.css';
```
- In `resources/js/app.js`, import the AdminLTE JavaScript:
```bash
import 'admin-lte/dist/js/adminlte';
```
5. Install dependencies and build assets
```bash
npm install
npm run dev
```
6. Configuring Laravel to use Vite
Open your Laravel layout file (for example, resources/views/layouts/app.blade.php) and include the Vite assets:

```bash
@vite(['my-vite-project/src/main.js'])
```
## 3. Installing FontAwesome Icons 
```bash
npm install @fortawesome/fontawesome-free
```
```bash
@import "@fortawesome/fontawesome-free/css/all.css";
```
[karans.com](https://www.karans.com.np/laravel-10/how-to-install-fontawesome-icons-in-laravel-10/)
___
## 4 Add the database including the projects table in the seeders

### Databases
#### 1. Env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lab_crud_laravel_basic
DB_USERNAME=root
DB_PASSWORD=solicoders
```

#### 2. Migrations
```bash
php artisan make:migration create_projects_table
php artisan make:migration create_tasks_table
```
```php
Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->string('name', 50)->unique();
    $table->text('description')->nullable();
    $table->timestamps();
});
```
```php
Schema::create('tasks', function (Blueprint $table) {
    $table->id();
    $table->string('name', 50)->unique();
    $table->text('description')->nullable();
    $table->unsignedBigInteger('project_id');
    $table->foreign('project_id')->references('id')->on('projects');
    $table->timestamps();
});
```

##### Running Migrations:
```bash
php artisan migrate
```
[Reference Laravel Migrations](https://laravel.com/docs/10.x/migrations#main-content)

#### 3. Models

```bash
php artisan make:model Project -m
php artisan make:model Task -m
```

##### Project file
```php
    protected $fillable = [
        'name',
        'description',
    ];
```

##### Task file
```php
    protected $fillable = [
        'name',
        'description',
        'project_id',
    ];
```

#### 4. Seeders
```bash
php artisan make:seeder ProjectSeeder
php artisan make:seeder TaskSeeder
```

##### ProjectSeeder file
```php
public function run(): void
{
    Project::create([
        'name' => 'Portfolio',
        'description' => 'Développement d\'un site web mettant en valeur nos compétences.',
    ]);

    Project::create([
        'name' => 'Arbre des compétences',
        'description' => 'Création d\'une application web pour l\'évaluation des compétences.',
    ]);

    Project::create([
        'name' => 'CNMH',
        'description' => 'Création d\'une application web pour la gestion des patients de centre CNMH.',
    ]);
}
```
##### TaskSeeder file
```php
public function run(): void
    {
        Task::create([
            'name' => 'Design Product Pages',
            'description' => 'Create user-friendly product pages with images and descriptions',
            'project_id' => '1',
        ]);

        Task::create([
            'name' => 'Implement Shopping Cart',
            'description' => 'Develop a functional shopping cart for users to add and manage items',
            'project_id' => '1',
        ]);
    }
```

##### DatabaseSeeder file
```php
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProjectSeeder::class,
        ]);
    }
}
```

##### Running Seeders
```bash
php artisan db:seed
```
[Reference Laravel seeders](https://laravel.com/docs/10.x/seeding#writing-seeders)
___
## 5. Create the CRUD of the tasks 
### Controllers
```bash
php artisan make:controller TaskController -r
```

## Request
```bash
php artisan make:request FormTaskRequest
```

## Views
```bash
php artisan make:view Tasks.index
php artisan make:view Tasks.create
php artisan make:view Tasks.edit
php artisan make:view Tasks.show
php artisan make:view Tasks.search
php artisan make:view Tasks.table

php artisan make:view Layouts.Layout
php artisan make:view Layouts.Footer
php artisan make:view Layouts.Navbar
php artisan make:view Layouts.Sidebar

```

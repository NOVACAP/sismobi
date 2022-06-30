# sistema laravel 9.17.0 php9.1.7

# procedimentois de instalação
- laravel new sismobi
- moficar o .env na raiz do sismobi
DB_CONNECTION=sqlsrv
DB_HOST=10.233.208.200
DB_PORT=1433
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

- Instale o pacote
- composer require lucascudo/laravel-pt-br-localization --dev
//Publique as traduções
- php artisan vendor:publish --tag=laravel-pt-br-localization

//Configure o Framework para utilizar 'pt-BR' como linguagem padrão
// Altere Linha 83 do arquivo config/app.php para:
- 'locale' => 'pt-BR',

//Caso deseje, configure o Framework para utilizar 
//'America/Sao_Paulo' como data hora padrão
// Altere Linha 70 do arquivo config/app.php para:
- 'timezone' => 'America/Sao_Paulo',

# install lib excel for export import 
- composer require phpoffice/phpspreadsheet --prefer-source --with-all-dependencies
- composer require maatwebsite/excel
- php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config

# install livewire
- composer require livewire/livewire

# add admin LTE 3 
- clone e rename dentro da pasta sismobi/public
- git clone https://github.com/ColorlibHQ/AdminLTE.git backend

# @extends directive component
- php artisan make:provider BladeComponentServiceProvider
# incluir no config/app
- App\Providers\BladeComponentServiceProvider::class,

# criando layout template pastas 
- app.blade.php , aside.blade.php, footer.blade.php, nav.blade.php

# criando controller DashboardController
- php artisan make:controller Admin/DasboardController --invokable

# criando list-users usando livewire
- php artisan make:livewire admin/users/list-users
- add  @livewireStyles ou <livewire:styles />,  @livewireScripts <livewire:scripts />

# criando livewire para o transporte
- php artisan make:livewire admin/transports/list-transports 

# criando a model transport
php artisan make:model Transport

# kit for export to excel laravel-excel
- https://laravel-excel.com/
- https://phpspreadsheet.readthedocs.io/en/latest/
- https://docs.laravel-excel.com/3.1/getting-started/installation.html

# uso do jquery datatables
# alteração das cores layout adminlte3

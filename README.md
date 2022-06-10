[![Latest Version](https://img.shields.io/packagist/v/laraflux/lens?label=version)](https://packagist.org/packages/laraflux/lens/) [![ Downloads](https://img.shields.io/packagist/dm/laraflux/lens.svg?label=downloads)](https://packagist.org/packages/laraflux/lens) ![GitHub Workflow Status](https://img.shields.io/github/workflow/status/laraflux/lens/PHP%20Composer)


# Laravel Lens
Automatically log all model events and changes within your Laravel app.

## Installation
```
composer require laraflux/lens
```
```
php artisan vendor-publish --tag=lens
php artisan migrate
```

### Attaching to a model
```
use Laraflux\Lens\Traits\LogsActivity;

class User extends  Model
{
    use LogsActivity;
```

## Config
In the lens config set which model events you would like to observe.
By default Created, Updated and Deleted are observed.
```
    'observe' => [
        'retrieved' => false,
        'creating' => false,
        'created' => true,
        'updating' => false,
        'updated' => true,
        'saving' => false,
        'saved' => false,
        'deleting' => false,
        'deleted' => true,
        'trashed' => false,
        'forceDeleted' => false,
        'restoring' => false,
        'restored' => false,
        'replicating' => false,
    ],
```

### Retrieve log data
Use the Log model to query data as you would any other eloquent model.
or query logs directly related to a model.
```
use Laraflux\Lens\Models\Log;

Log::paginate();
$model->logs;
```
To get logs for a user you can use the creator() scope
```
Log::creator($user)->get()
```

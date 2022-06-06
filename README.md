# Laravel Lens
Automatically log all changes within your Laravel app.

## Installation
```
composer require laraflux/lens
```
```
php artisan vendor-publish --tag=lens
php artisan migrate
```

## Config
```

```

### attaching to a model
```
use Laraflux\Lens\Traits\LogsActivity;

class User extends  Model
{
    use LogsActivity;
```

### Retrieve log data
```
use Laraflux\Lens\Models\Log;

Log::find(1);
Log::all();
Log::paginate();
Log::whereUser(1)->get();
Log::whereLoggableType(User::class);
$model->logs;
```

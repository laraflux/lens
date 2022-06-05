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
### attaching to a model
```
use Laraflux\Lens\Traits\LogsActivity;

class User extends  Model
{
    use LogsActivity;
```

### manually log
```
$model->logs()->create('John sent an invoice to Jim');

// no model?
use Laraflux\Lens\Facades\Lens;
Lens::log('some text');
```

### Example usage
```
use Laraflux\Lens\Models\Log;

Log::all();
Log::paginate();
Log::whereUser(1)->get();
Log::whereLoggableType(User::class);
$user->logs;
```

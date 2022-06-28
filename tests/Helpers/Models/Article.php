<?php

namespace Laraflux\Lens\Tests\Helpers\Models;

use Illuminate\Database\Eloquent\Model;
use Laraflux\Lens\Traits\LogsActivity;

class Article extends Model
{
    use LogsActivity;

    protected $guarded = [];
}

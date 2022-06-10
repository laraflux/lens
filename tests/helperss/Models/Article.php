<?php

namespace Laraflux\Lens\Tests\Helpers\Models;

use Laraflux\Lens\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use LogsActivity;

    protected $guarded = [];
}

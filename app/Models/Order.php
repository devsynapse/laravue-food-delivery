<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['first_name', 'last_name', 'address', 'unit'];
}

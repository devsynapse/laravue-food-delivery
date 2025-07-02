<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Product;
class Order extends Model
{
    protected $fillable = ['first_name', 'last_name', 'address', 'unit', 'comment', 'status'];

    /**
     * Get all of the products for the Order.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'price', 'total');
    }
}

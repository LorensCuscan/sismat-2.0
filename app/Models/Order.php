<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orders_id',
        'desc_buy', 
        'items_quantity'
    ];

    public function service_orders()
    {
        return $this->hasMany(ServiceOrder::class); 
    }
}

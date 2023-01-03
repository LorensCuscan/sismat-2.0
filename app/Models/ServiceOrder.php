<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_order_id',
        'order_date',
        'service_id',
        'delivery_date',
        'order_id',
        'fleet_id',
        'maintenance_type_id',
    ];
   
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
        
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function fleet()
    {
        return $this->belongsTo(Fleet::class);
    }

    public function maintenance_type()
    {
        return $this->belongsTo(MaintenanceType::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MaintenanceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'maintenance_types_id', 
        'desc_manut'
    ];


    public function service_orders()
    {
        return $this -> hasMany(ServiceOrder::class);  
    }

    public function services()
    {
        return $this -> hasMany(Service::class);  
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'fleet_id',
        'service_desc',
        'service_type_id',
        'maintenance_type_id'
    ];


    public function service_order(){
        return $this->hasMany(ServiceOrder::class);
    }

    public function fleet()
    {
        return $this->belongsTo(Fleet::class);
    }

    public function service_type()
    {
        return $this->belongsTo(ServiceType::class);
    }
    public function  maintenance_type()
    {
        return $this->belongsTo(MaintenanceType::class);
    }
}

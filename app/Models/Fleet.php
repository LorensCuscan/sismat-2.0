<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    use HasFactory;


    protected $fillable = [
        'fleets_id', 
        'company_id',
        'desc_frota', 
        'active',
        'hystory',
        'dt_manut'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function service_orders()
    {
        return $this->hasMany(ServiceOrder::class);
    }

    public function maintenance_type()
    {
        return $this->hasMany(MaintenanceType::class);
    }
}

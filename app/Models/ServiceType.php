<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type_id',
        'service_type_desc'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}

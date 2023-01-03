<?php

namespace App\Models;

use App\Filament\Resources\CompanyResource\Pages\CreateCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable =  [
        'company_id', 
        'company_name', 
        'segment', 
        'address', 
        'city', 
        'state', 
        'postal_code'
    ];

    public function company_id(){
        return $this->hasMany(Fleet::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'tenant_id',
        'name',
        'email',
        'phone',
        'address',
    ];
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }
        
}

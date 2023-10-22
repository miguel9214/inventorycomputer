<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'so', 
        'ofimatica', 
        'cpu', 
        'storage', 
        'ram', 
        'ip', 
        'mac', 
        'serial', 
        'fixed_asset', 
        'anydesk', 
        'printer', 
        'scanner',
        'dependencies_id' 
    ];
}

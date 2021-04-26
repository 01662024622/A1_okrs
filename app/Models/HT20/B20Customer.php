<?php

namespace App\Models\HT20;

use Illuminate\Database\Eloquent\Model;

class B20Customer extends Model
{
    protected $fillable = [
        'Code','Name','Role_PT','Role_CS','PhoneVT','isActive','isCustomer','isGroup'
    ];
    protected $table = "B20Customer";
}

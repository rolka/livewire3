<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    protected $fillable = [ 'location_name', 'user_id', 'city_id', 'country_id'];

}

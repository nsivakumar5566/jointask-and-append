<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = ['country_id','state_id','city_name','city_code'];
 
    public function State()
    {
        return $this->belongsTo(State::class);
    }
    public function Country()
    {
        return $this->belongsTo(Country::class);
    }
}

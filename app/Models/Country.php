<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';

    protected $fillable = ['country_name','country_code'];

    public function State()
    {
        return $this->hasMany(State::class);
    }
    public function City()
    {
        return $this->hasMany(City::class);
    }
}

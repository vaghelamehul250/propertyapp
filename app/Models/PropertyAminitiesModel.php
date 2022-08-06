<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAminitiesModel extends Model
{
    use HasFactory;
    protected $table = 'property_aminities';
    protected $fillable = ["property_id", "aminities_id"];

    public function aminity() {
        return $this->hasOne('App\Models\AminityModel');
    }
    public function property() {
        return $this->hasOne('App\Models\PropertyModel');
    }
}

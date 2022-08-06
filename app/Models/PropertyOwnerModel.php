<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyOwnerModel extends Model {
    use HasFactory;

    protected $table = 'property_owner';
    protected $fillable = ["name", "email"];

    public function property() {
        return $this->belongsTo('App\Models\PropertyModel');
    }
}

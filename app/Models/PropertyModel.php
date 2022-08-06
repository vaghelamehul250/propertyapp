<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyModel extends Model
{
    use HasFactory;
    protected $table = 'property';
    protected $fillable = ["name", "description", "type", "size", "property_owner_id", "address", "brochure", "photos"];

    public function owner() {
        return $this->hasOne('App\Models\PropertyOwnerModel');
    }
}

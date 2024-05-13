<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'user_id', 'listing_id', 'cv', 'certificate'];

    //Relationship to Listings
    public function listings()
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}

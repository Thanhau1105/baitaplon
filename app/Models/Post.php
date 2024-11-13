<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';

    protected $fillable = [
        'approved', 'created_at', 'description', 'price', 'title', 'updated_at', 'location_id', 'user_id',
    ];

    protected  $casts =[
        'approved' => 'boolean',
        'created' => 'datetime',
        'updated' => 'datetime',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function locations()
    {
        return $this->belongsTo(Location::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function amenities(){
        return $this->belongsToMany(Amenity::class,'post_amenities');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profileImage()
    {
        $imagePath = "/storage/" . $this->image;
        $defautImage = "/storage/profiles/cWWRaKhyPH6WDqqKI78LzHFKt8JOQm5T8l4fwgcn.png";

        return $this->image ? $imagePath : $defautImage;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}

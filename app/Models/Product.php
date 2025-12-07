<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'title',
        'year',
        'description',
        'picture',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}

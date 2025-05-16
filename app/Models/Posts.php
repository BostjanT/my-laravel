<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['title', 'content','category_id', 'fotografija' ];
        public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}

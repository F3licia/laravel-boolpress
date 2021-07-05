<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        "slug", "title", "content", "user_id", "category_id"
    ];

     function user() {
        return $this->belongsTo("App\User");
      }

      public function category() {
        return $this->belongsTo("App\Category");
      }

      function tags() {
        return $this->belongsToMany("App\Tag");
    }
}

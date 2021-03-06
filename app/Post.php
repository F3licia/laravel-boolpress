<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model {
 
  protected $fillable = [
    "slug", "title", "content", "user_id", "category_id", "cover_url", 
];

protected $hidden = [
  'user_id'
];

  public function user() {
    return $this->belongsTo("App\User");
  }

  public function category(){
    return $this->belongsTo("App\Category");
  }

  public function tags() {
    return $this->belongsToMany("App\Tag");
  }

}
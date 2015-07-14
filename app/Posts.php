<?php 

namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
//Instance of Posts class will refer to posts table in database
class Posts extends Model {
 
  //Restricts columns from modifying
  protected $guarded = [];
 
  //Posts has many comments
  //Returns all comments on that post
  public function comments()
  {
    return $this->hasMany('App\Comments','on_post');
  }
  
  //Returns the instance of the user who is author of that post
  public function author()
  {
    return $this->belongsTo('App\User','author_id');
  } 
}
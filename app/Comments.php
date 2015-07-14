<?php 

namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Comments extends Model {
 
  //Comments table in database
  protected $guarded = [];
  
  //User who has commented
  public function author()
  {
    return $this->belongsTo('App\User','from_user');
  }
  
  //Returns post of any comment
  public function post()
  {
    return $this->belongsTo('App\Posts','on_post');
  } 
}
<?php
namespace App\Models;

use CodeIgniter\Model; 

class ComicsModel extends Model { 
  
  protected $table = 'comics';
  protected $useTimestamps = true;
  protected $allowedFields = ['title', 'slug', 'author', 'publisher', 'cover'];
  
  
  public function getComics($slug = false){
    
    if(!$slug){
      return $this ->findAll();
    }
    
    return $this ->where(['slug'=> $slug]) ->first();
  }
}

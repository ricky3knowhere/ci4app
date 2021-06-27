<?php
namespace App\Models;

use CodeIgniter\Model; 

class PeopleModel extends Model { 
  
  protected $table = 'people';
  protected $useTimestamps = true;
  protected $allowedFields = ['name', 'addeess'];

 public function search($keyword){
  
  return $this ->table('people') ->like('name', $keyword) ->orLike('address', $keyword);

 }
  
}
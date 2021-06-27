<?php
namespace App\Controllers;
use App\Models\PeopleModel;

class People extends BaseController
{
  protected $peopleModel;

  public function __construct() {
    $this ->peopleModel = new PeopleModel();
  }

  public function index() {
  
  $keyword = $this ->request ->getVar('keyword');
  if ($keyword) {
    $people = $this ->peopleModel ->search($keyword); 
  } else {
    $people = $this ->peopleModel;
  }
  
  $currentPage = $this ->request ->getVar('page_people');

  $page = (($currentPage == 1) || (!$currentPage))? 1 : (7 * ($currentPage - 1) +1);

    $data = [
      'title' => 'People List',
      'people' => $people ->paginate(7, 'people'),
      'pager' => $people ->pager,
      'currentPage' => $page
    ];

    return view('people/index', $data);
  }
  
}
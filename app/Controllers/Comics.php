<?php
namespace App\Controllers;
use App\Models\ComicsModel;

class Comics extends BaseController
{
  protected $comicsModel;

  public function __construct() {
    $this ->comicsModel = new ComicsModel();
  }

  public function index() {

    $data = [
      'title' => 'Comics List',
      'comics' => $this -> comicsModel ->getComics()

    ];

    return view('comics/index', $data);
  }


  public function details($slug) {
    $data = [
      'title' => 'Comics Details',
      'comic' => $this -> comicsModel ->getComics($slug)
    ];

    if (empty($data['comic'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Title Comic of\"$slug\" is not found");
    }
    return view('comics/details', $data);
  }


  public function create() {
    $data = [
      'title' => 'Insert Comic',
      'validation' => \Config\Services::validation()
    ];

    return view('comics/create', $data);
  }

  public function save() {

    //Input Validation

    if (!$this ->validate([
      'title' => [
        'rules' => 'required|is_unique[comics.title]',
        'errors' => [
          'required' => '{field} should be filled.',
          'is_unique' => '{field} has registered.'
        ]
      ],
      'cover' => [
        'rules' => 'max_size[cover,1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => 'picture is too large',
          'mime_in' => 'file format is not a picture',
          'is_image' => 'file format is not a picture'
        ]
      ]
    ])) {

      // $validation = \Config\Services::validation();

      // return redirect() ->to('/comics/create') ->withInput() ->with('validation', $validation);
      return redirect() ->to('/comics/create') ->withInput();
    }

    //get picture file
    $picture = $this ->request ->getFile('cover');

    if ($picture ->getError() == 4) {

      $pictureName = 'default.jpg';
    } else {
      //get random picture name
      $pictureName = $picture ->getRandomName();

      //move picture to public/img
      $picture ->move('img', $pictureName);

    }


    $slug = url_title($this ->request ->getVar('title'), '-', true);


    $this ->comicsModel ->save([
      'title' => $this ->request ->getVar('title'),
      'slug' => $slug,
      'author' => $this ->request ->getVar('author'),
      'publisher' => $this ->request ->getVar('publisher'),
      'cover' => $pictureName
    ]);

    session() ->setFlashData('notif', 'Data success added.');

    return redirect() ->to('/comics');
  }


  public function delete($id) {

    //get comic cover name
    $comic = $this ->comicsModel ->find($id);

    //delete picture file
    if ($comic['cover'] != 'default.jpg') {

      unlink('img/'.$comic['cover']);
    }


    $this ->comicsModel ->delete($id);

    session() ->setFlashData('notif', 'Data success deleted.');

    return redirect() ->to('/comics');
  }


  public function edit($slug) {
    $data = [
      'title' => 'Edit Comic',
      'validation' => \Config\Services::validation(),
      'comic' => $this -> comicsModel ->getComics($slug)
    ];


    return view('comics/edit', $data);
  }

  public function update($id) {

    $slug = $this  ->request ->getVar('slug');
    // $comic = $this ->comicsModel ->getComics($slug);

    // if ($comic['title'] == $this ->request ->getVar('title')) {
    //   $title_rules = 'required';
    // } else {
    //   $title_rules = 'required|is_unique[comics.title]';
    // }

    if (!$this ->validate([
      'title' => [
        //       'rules' => $title_rules,
        'rules' => 'required|is_unique[comics.title,id,'.$id.']',
        'errors' => [
          'required' => '{field} should be filled.',
          'is_unique' => '{field} has registered.'
        ]
      ],
      'cover' => [
        'rules' => 'max_size[cover,1024]|mime_in[cover,image/png,image/jpg,image/jpeg]|is_image[cover]',
        'errors' => [
          'max_size' => 'picture is too large',
          'mime_in' => 'file format is not an picture',
          'is_image' => 'file format is not an picture'
        ]
      ]
    ])) {

      // $validation = \Config\Services::validation();

      // return redirect() ->to('/comics/edit/'.$slug) ->withInput() ->with('validation', $validation);

      return redirect() ->to('/comics/edit/'.$slug) ->withInput();

    }
      
    $picture = $this ->request ->getFile('cover');
    
    $old_picture = $this ->request ->getVar('old_cover');

    if ($picture ->getError() == 4){
      $picture_name = $old_picture;
    }
    else {
      $picture_name = $picture ->getRandomName();
      
      $picture ->move('img',$picture_name);
      
      unlink('img/'.$old_picture);
    }

      $slug = url_title($this ->request ->getVar('title'), '-', true);


    $this ->comicsModel ->update($id, [
      //      'id' => $id,
      'title' => $this ->request ->getVar('title'),
      'slug' => $slug,
      'author' => $this ->request ->getVar('author'),
      'publisher' => $this ->request ->getVar('publisher'),
      'cover' => $picture_name
    ]);

    session() ->setFlashData('notif', 'Data success edited.');

    return redirect() ->to('/comics');



  }


  //--------------------------------------------------------------------

}
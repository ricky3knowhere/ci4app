<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
	//	return view('welcome_message');
	  $data = [
	     'title' => 'Home | Shounen Comics',
	     'id' => ['one','two','three']
	   ];
	  
		return view('pages/home', $data);
	}

	//--------------------------------------------------------------------

public function about(){
    $data = [
      'title' => 'About me'
    ];
    
		return view('pages/about',$data);
  }
  
public function contact(){
    $data = [
      'title' => 'Contact us',
      'alamat' => [
        [
          'tipe' => 'campus',
          'alamat' => 'jl. K.H Nasution no 34',
          'kota' => 'Bandung'
        ],
        [
          'tipe' => 'home',
          'alamat' => 'jl. Brajasetra no 14',
          'kota' => 'Garut'
        ]
      ]
    ];
    
		return view('pages/contact',$data);
  }
}

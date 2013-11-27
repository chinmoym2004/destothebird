<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	protected $layout = "layout.main";
	public function getIndex()
	{
		$this->layout->content = View::make('home.index');
	}
	public function getAudiogallery()
	{
			$data=array('alluploadbyu' => DB::table('users_upload')
            ->join('users', 'users.id', '=', 'users_upload.uid')->where('users_upload.status','=','verified')
            ->select('users.firstname','users.lastname','users.email','users_upload.filpath','users_upload.specisname','users_upload.specificname','users_upload.area')->get());
		$this->layout->content = View::make('home.audiogallery',$data);
	}

}
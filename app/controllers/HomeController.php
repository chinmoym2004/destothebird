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
			/*$data=array('alluploadbyu' => DB::table('users_upload')
            ->join('users', 'users.id', '=', 'users_upload.uid')->where('users_upload.status','=','verified')
            ->select('users.firstname','users.lastname','users.email','users_upload.filpath','users_upload.specisname','users_upload.specificname','users_upload.area')->paginate(2));
*/		
		$data=array('alluploadbyu' => DB::table('users_upload')->join('users', 'users_upload.uid', '=', 'users.id')->where('users_upload.status','=','verified')
            ->select('users_upload.identified_img','users_upload.filpath','users_upload.specisname','users_upload.specificname','users_upload.area','users_upload.state','users_upload.city','users.firstname','users.lastname')->paginate(50));

		$this->layout->content = View::make('home.audiogallery',$data);
	}

}
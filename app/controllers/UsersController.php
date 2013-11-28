<?php

class UsersController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected $layout = "layout.main";
	 
	public function getRegister(){
		$this->layout->content = View::make('users.register');
	}
	public function postCreate() {
	
	$validator = Validator::make(Input::all(), User::$rules);
 
	   if ($validator->passes()) 
	   {
		   $user = new User;
		   $user->firstname = Input::get('firstname');
		   $user->lastname = Input::get('lastname');
		   $user->email = Input::get('email');
		   $user->password = Hash::make(Input::get('password'));//Input::get('password');
		   $user->useras = Input::get('useras');
		   $user->save();
		   return Redirect::to('users/login')->with('message', 'Thanks for registering!');
	   } 
	   else 
	   {
		  return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
	   }
       
	}
	public function getLogin() {
	   $this->layout->content = View::make('users.login');
	}
	public function postSignin() {
	    if(Input::get('remember'))
			$rememberme=true;
		else
			$rememberme=false;
	
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')),$rememberme)) {
		   return Redirect::to('/');//->with('message', 'You are now logged in!');
		} else {
		   return Redirect::to('users/login')
			  ->with('message', 'Your username/password combination was incorrect')
			  ->withInput();
		}	  
	}
	
	public function getLogout() {
	   Auth::logout();
	   return Redirect::to('/');//->with('message', 'Your are now logged out!');
	}
	public function getIdentify(){
		$data=array('title'=>'identify the bird');
		$id = Auth::user()->id;
		$data=array('all_un_identified' => DB::table('users_upload')->where('uid','=',$id)->get());		
		$this->layout->content = View::make('users.identify',$data);
	} 
	public function postUpload(){
		$data=array('title'=>'identify the bird');
		$this->layout->content = View::make('users.upload',$data);
	}
	public function getUpload(){
		//$data=array('title'=>'Upload audio to identify the bird');
		$id = Auth::user()->id;
		$data=array('alluploadbyu' => DB::table('users_upload')->where('uid','=',$id)->orderBy('created_at', 'desc')->get());		
		$this->layout->content = View::make('users.uploading',$data);
	}
	public function getIdentifyrequest(){
		$data=array('title'=>'Upload audio to identify the bird');
		$this->layout->content = View::make('users.identifyrequest',$data);
	}
	public function postIdentifyrequest(){
		$data=array('title'=>'Upload audio to identify the bird');
		$this->layout->content = View::make('users.identifyrequest',$data);
	}
	public function postUploadedinfoupdate($id){
		$specisname=Input::get('specisname')?Input::get('specisname'):'NA';
		$specificname=Input::get('specificname')?Input::get('specificname'):'NA';
		$area=Input::get('area')?Input::get('area'):'NA';
		$recorded_on=Input::get('recorded_on')?Input::get('recorded_on'):'NA';
		DB::table('users_upload')
            ->where('id', $id)
            ->update(array('specisname' => $specisname,'specificname' => $specificname,'area' => $area,'recorded_on' => $recorded_on));
       //$this->layout->content = View::make('users.uploading');
        $id = Auth::user()->id;
		$data=array('alluploadbyu' => DB::table('users_upload')->where('uid','=',$id)->orderBy('created_at', 'desc')->get());		
		$this->layout->content = View::make('users.uploading',$data);
	}
	public function postUploadedinfodelete($id){
	        DB::table('users_upload')->where('id', '=', $id)->delete();
	        $id = Auth::user()->id;
			$data=array('alluploadbyu' => DB::table('users_upload')->where('uid','=',$id)->orderBy('created_at', 'desc')->get());		
			$this->layout->content = View::make('users.uploading',$data);
		}
}
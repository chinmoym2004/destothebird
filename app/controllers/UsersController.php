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
		$data=array('title'=>'upload and grt identify the bird');
		$this->layout->content = View::make('users.upload',$data);
	}
	public function getUpload(){
		//$data=array('title'=>'Upload audio to identify the bird');
		if(Auth::check()){
			$id = Auth::user()->id;
			$data=array('alluploadbyu' => DB::table('users_upload')->where('uid','=',$id)->orderBy('created_at', 'desc')->paginate(2),'title'=>'upload and grt identify the bird');		
			$this->layout->content = View::make('users.uploading',$data);
		}
		else{
			$this->layout->content = View::make('users.login');
		}
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
		$file = Input::file('image'); // your file upload input field in the form should be named 'file'

/*		$destinationPath = 'uploads/images/';
		$extension=pathinfo($file["name"], PATHINFO_EXTENSION);
		$filename = uniqid("image_file_").'.'.$extension; 
		//Input::file('file')->move($destinationPath, $fileName);
		
		if (is_array($file) && isset($file['error']) && $file['error'] == 0) {
		 //Input::upload('file',path('upload').'/images/'$filename);
		 Input::upload('file','public/uploads/images/', $filename);
		}*/
		$destinationPath = '';
	    $filename        = '';

	    if (Input::hasFile('image')) {
	        $file            = Input::file('image');
	        $destinationPath = public_path().'/uploads/images/';
	        $filename        = str_random(6) . '_' . $file->getClientOriginalName();
	        $uploadSuccess   = $file->move($destinationPath, $filename);
	        if($uploadSuccess) 
			    {
			        error_log("Destination: $destinationPath");
			        error_log("Filename: $filename");
			        error_log("Extension: ".$file->getClientOriginalExtension());
			        error_log("Original name: ".$file->getClientOriginalName());
			        error_log("Real path: ".$file->getRealPath());
			    }
			    else
			    {
			        error_log("Error moving file: ".$file->getClientOriginalName());
			    }
	    }
	    else{
	    	echo $file;exit;
	    }
		DB::table('users_upload')->where('id', $id)->update(array('specisname' => $specisname,'specificname' => $specificname,'area' => $area,'recorded_on' => $recorded_on,'identified_img'=>$filename,'status'=>'verified'));
       //$this->layout->content = View::make('users.uploading');
        $id = Auth::user()->id;
		$data=array('alluploadbyu' => DB::table('users_upload')->where('uid','=',$id)->orderBy('created_at', 'desc')->paginate(2));		
		$this->layout->content = View::make('users.uploading',$data);
		//Redirect::to('users/uploading');
	}
	public function postUploadedinfodelete($id){
	        DB::table('users_upload')->where('id', '=', $id)->delete();
	        $id = Auth::user()->id;
			$data=array('alluploadbyu' => DB::table('users_upload')->where('uid','=',$id)->orderBy('created_at', 'desc')->paginate(2));		
			$this->layout->content = View::make('users.uploading',$data);
	}
	public function postUploadimageforaudio(){
		$data=array("Upload image for this audio");
		$this->layout->content = View::make('users.uploadimage',$data);
	}
}
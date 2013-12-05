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
		   //$user->useras = 1;
		   $user->save();
		   return Redirect::to('users/login')->with('message', 'Thanks for registering! Login to continue');
	   } 
	   else 
	   {
		  return Redirect::to('users/register')->with('message', '<strong>Oh no!</strong>Change a few things up and try submitting again')->withErrors($validator)->withInput();
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
		   return Redirect::to('users/upload');//->with('message', 'You are now logged in!');
		} else {
		   return Redirect::to('users/login')
			  ->with('message', '<strong>oops! </strong>Your username/password combination was incorrect')
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
		$state=Input::get('state')?Input::get('state'):'NA';
		$city=Input::get('city')?Input::get('city'):'NA';
		$area=Input::get('area')?Input::get('area'):'NA';
		$recorded_on=Input::get('recorded_on')?Input::get('recorded_on'):'NA';
		
		//$file = Input::file('image')?Input::file('image'):'NA'; // your file upload input field in the form should be named 'file'
		//$afile = Input::file('audio')?Input::file('audio'):'NA';
		
		$cnamebyexp=Input::get('cnamebyexp')?Input::get('cnamebyexp'):'NA';
		$snamebyexp=Input::get('snamebyexp')?Input::get('snamebyexp'):'NA';

		$cnamebyalgo=Input::get('cnamebyalgo')?Input::get('cnamebyalgo'):'NA';
		$snamebyalgo=Input::get('snamebyalgo')?Input::get('snamebyalgo'):'NA';

		$destinationPath = '';
	    $filename        = '';

	    if(Input::hasFile('image')) 
	    {
	        $ifile = Input::file('image');
	        $destinationPath = public_path().'/uploads/image/';
	        $ext = pathinfo($ifile->getClientOriginalName(), PATHINFO_EXTENSION);
			$ifilename = uniqid("image_file_").'.'.$ext;
	        $uploadSuccess   = $ifile->move($destinationPath, $ifilename);
	        if($uploadSuccess) 
			    {
			        error_log("Destination:" . $destinationPath);
			        error_log("Filename:" . $ifilename);
			        error_log("Extension: ".$ifile->getClientOriginalExtension());
			        error_log("Original name: ".$ifile->getClientOriginalName());
			        error_log("Real path: ".$ifile->getRealPath());
			    }
			    else
			    {
			        error_log("Error moving file: ".$file->getClientOriginalName());
			    }
	    }
	    else
	    {
	    	$ifilename="no_image_available";
	    }

	    $uid = Auth::user()->id;
	    if($id==0)
		{
			//insert
			/*if (Input::hasFile('audio')) 
			    {*/
			        
			        $file            = Input::file('audio');
			        $destinationPath = public_path().'/uploads/audio/';
			        $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
					$filename = uniqid("audio_file_").'.'.$ext;
			        $uploadSuccess   = $file->move($destinationPath, $filename);
			        if($uploadSuccess) 
					    {
					        error_log("Destination:" .$destinationPath);
					        error_log("Filename: ".$filename);
					        error_log("Extension: ".$file->getClientOriginalExtension());
					        error_log("Original name: ".$file->getClientOriginalName());
					        error_log("Real path: ".$file->getRealPath());
					    }
					    else
					    {
					        error_log("Error moving file: ".$file->getClientOriginalName());
					    }
			    /*}
			    else
			    {
			    	echo $file;exit;
			    }*/
			DB::table('users_upload')->insert(array('uid' => $uid, 'filpath' => $filename,'specisname' => $specisname,'specificname' => $specificname,'area' => $area,'state' => $state,'city' => $city,'recorded_on' => $recorded_on,'identified_img'=>$ifilename,'status'=>'verified','cnamebyexp'=>$cnamebyexp,'snamebyexp'=>$snamebyexp,'cnamebyalgo'=>$cnamebyalgo,'snamebyalgo'=>$snamebyalgo,'created_at'=>date("Y-m-d H:i:s")));
		}
		else
		{
			//updat
			if(Input::hasFile('image'))
				DB::table('users_upload')->where('id', $id)->update(array('specisname' => $specisname,'specificname' => $specificname,'area' => $area,'state' => $state,'city' => $city,'recorded_on' => $recorded_on,'identified_img'=>$ifilename,'status'=>'verified','cnamebyexp'=>$cnamebyexp,'snamebyexp'=>$snamebyexp,'cnamebyalgo'=>$cnamebyalgo,'snamebyalgo'=>$snamebyalgo));
			else
				DB::table('users_upload')->where('id', $id)->update(array('specisname' => $specisname,'specificname' => $specificname,'area' => $area,'state' => $state,'city' => $city,'recorded_on' => $recorded_on,'status'=>'verified','cnamebyexp'=>$cnamebyexp,'snamebyexp'=>$snamebyexp,'cnamebyalgo'=>$cnamebyalgo,'snamebyalgo'=>$snamebyalgo));

		}
       //$this->layout->content = View::make('users.uploading');
        
		//$data=array('alluploadbyu' => DB::table('users_upload')->where('uid','=',$uid)->orderBy('created_at', 'desc')->paginate(50));		
		//$this->layout->content = View::make('users.uploading',$data);
		return Redirect::action('UsersController@getUpload');
	}
	public function getUploadedinfoupdate($id){
		$data=array('alluploadbyu' => DB::table('users_upload')->where('uid','=',$id)->orderBy('created_at', 'desc')->paginate(50));		
		$this->layout->content = View::make('users.uploading',$data);
	}
	
	public function postUploadedinfodelete($id){
	        DB::table('users_upload')->where('id', '=', $id)->delete();
	        $id = Auth::user()->id;
			$data=array('alluploadbyu' => DB::table('users_upload')->where('uid','=',$id)->orderBy('created_at', 'desc')->paginate(50));		
			$this->layout->content = View::make('users.uploading',$data);
	}
	public function postUploadimageforaudio(){
		$data=array("Upload image for this audio");
		$this->layout->content = View::make('users.uploadimage',$data);
	}

	public function postSetting(){
		$utype=Input::get('usertype');
		$uid=Input::get('userid');
		DB::table('users')->where('id', $uid)->update(array('expart' => $utype));
		$data=array('alluser' => DB::table('users')->orderBy('created_at','desc')->paginate(50));		
		$this->layout->content = View::make('users.setting',$data);
	}

	public function getSetting(){
		$data=array('alluser' => DB::table('users')->orderBy('created_at', 'desc')->paginate(50));		
		$this->layout->content = View::make('users.setting',$data);
	}
}
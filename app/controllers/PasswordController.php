<?php
class PasswordController extends BaseController {
	
	protected $layout = "layout.main";


	public function remind()
	  {
	    $this->layout->content = View::make('password.remind');
	  }

	public function request()
		{
		  $credentials = array('email' => Input::get('email'));
		 
		  return Password::remind($credentials);
		}

	public function reset($token)
	{
	  $this->layout->content = View::make('password.reset')->with('token', $token);
	}

	public function update()
	{
	  $credentials = array('email' => Input::get('email'));
	 
	  return Password::reset($credentials, function($user, $password)
	  {
	    $user->password = Hash::make($password);
	 
	    $user->save();
	 
	    return Redirect::to('users/login')->with('flash', '<strong>Great !</strong>your password has been saved successfully. Login to continue');
	  });
	}
}
?>
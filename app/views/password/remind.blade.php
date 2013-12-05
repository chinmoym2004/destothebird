<div class="row">
	@if (Session::has('error'))
		<div class="alert alert-info alert-dismissable">
	  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  		<strong>Sorry!</strong>{{ trans(Session::get('reason')) }}
		</div>
	  
	@elseif (Session::has('success'))
	  	<div class="alert alert-info alert-dismissable">
	  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  		<strong>Great!</strong>an email with the password reset has been sent.
		</div>
	@endif
  <div class="col-md-6">
	
	 
	{{ Form::open(array('route' => 'password.request')) }}
	 <h2 class="form-signin-heading">Reset Password</h2>
	 
	  <p>{{ Form::label('email', 'Email') }}
		 {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Enter Email Address','required')) }}
	</p>
	 
	  <p>{{ Form::submit('Submit',array('class'=>'btn btn-primary')) }}</p>
	 
	{{ Form::close() }}
 </div>
</div>
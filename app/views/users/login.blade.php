<div class="row">
  <div class="col-md-6">
	{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
	   <h2 class="form-signin-heading">Please Login</h2>
	 
	   {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address','required','value'=>'')) }}<br/>
	   {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','required','value'=>'')) }}<br/>
	 
	    <div class="control-group">
			<div class="controls">
				<label class="checkbox">
					 {{Form::checkbox('remember', 'remember', true)}}<span class="metro-checkbox">Remember me</span>
				</label>
				<div>{{ Form::submit('Login', array('class'=>'btn btn-primary'))}}&nbsp;&nbsp;&nbsp;{{ HTML::link('password/reset', 'Forgot Password?') }}</div>
			</div>
		</div>
	{{ Form::close() }}
  </div>
</div>


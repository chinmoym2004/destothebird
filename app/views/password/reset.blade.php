<div class="row">
	@if (Session::has('error'))
	<div class="alert alert-info alert-dismissable">
	  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  		<strong>Sorry!</strong>{{ trans(Session::get('reason')) }}
		</div>
	@endif
  	<div class="col-md-6">
			{{ Form::open(array('route' => array('password.update', $token),'class'=>'form-signin')) }}
		 
			<p>
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address','required','value'=>'')) }}
			</p>
		 
			<p>
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password','required','value'=>'')) }}
			</p>
		 
			<p>
				{{ Form::label('password_confirmation', 'Password confirm') }}
				{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Re-Password','required','value'=>'')) }}

			</p>
		 
		  {{ Form::hidden('token', $token) }}
		 
		  <p>{{ Form::submit('Submit',array('class'=>'btn btn-primary')) }}</p>
		 
		{{ Form::close() }}
	</div>
</div>
<div class="container">
	      		<h2>User settings</h2>     

	        <!-- Thumbnail Carousel -->

	        <div class="scroll-containera table-responsive" id="alluser">
	                        <table class="table table-striped" id="userTable">
	                        	<thead align="center">
	                        		<tr>
	                        			<th>User Name</th>
	                        			<th>Email Id</th>
	                        			<th>Since</th>
	                        			<th>Setting</th>
	                        		</tr>
	                        	</thead>
	                            <tbody>
								@if(count($alluser)>1)
								
									@foreach ($alluser as $user)
										<tr>
										  <td><?php echo $user->firstname." ".$user->lastname;?></td>
										  <td>{{ $user->email }}</td>
										  <td>{{ $user->created_at }}</td>
										  <td>	
										  		<form id="{{ $user->id }}" action="">
										   				@if($user->expart==1 && $user->admin!=1)
										  				<select id="usertype" name="{{$user->id}}">
										  					<option selected value="1">As Expaet</option>
										  					<option value="0">As General User</option>
										  				</select>
										  				@elseif($user->expart!=1 && $user->admin!=1)
										  				<select id="usertype" name="{{$user->id}}" >
										  					<option selected value="0">As General User</option>
										  					<option value="1">As Expert</option>
										  				</select>
										  				@else
										  					Admin
										  				@endif
										  		</form>
										  </td>
										</tr>
									@endforeach
								
								@else								
									<tr>
									  <td colspan="6" style="margin-top:50px"><h5>No other user exist</h5></td>
									</tr>
								@endif
	                            </tbody>
	                        </table>	 
	                        <div id="pager" class="pager" style="margin-top:20px;">
									<?php echo $alluser->links(); ?>
							</div>                       
	                    </div>
 
				

</div>

<style type="text/css">
#alluser table thead{
background: #18BC9C;
color:#fff;
}
</style>
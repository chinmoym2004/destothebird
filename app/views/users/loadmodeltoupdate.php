<?php
	$id=$_REQUEST['id'];
	$res=DB::table('users_upload')->where('id','=',$id)->get();
	print_r($res);
?> 
        		<!--Enable for general user but disable for admin and expart-->
				  <div class="form-group">
				  	<label for="exampleInputEmail1">Do you Know the Common Name ?</label>
				    <input type="text" class="form-control" id="specisname" name="specisname" placeholder="Please Enter Common name">
				  </div>

				  <div class="form-group">
				  	<label for="exampleInputEmail1">Do you Know the Scientific Name ?</label>
				    <input type="text" class="form-control" id="specificname" name="specificname" placeholder="Please Enter Scientific name">
				  </div>
				  <div class="form-group">
				  	<label for="exampleInputEmail1">Recorded On</label>
				    <input type="text" class="form-control" id="datepicker" name="recorded_on" placeholder="Please enter When you recorder . e.g. 2011-11-11" autocomplete='off'>
				  </div>
				  <div class="form-group">
				  	<label for="exampleInputEmail1">Recorded At&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
					    <select id="state" name="state">
					    	<option value="0">--Select State--<option>
					    	<option value="Tamil Nadu">Tamil Nadu<option>
					    	<option value="Andhra Pradesh">Andhra Pradesh<option>
					    	<option value="Kerala">Kerala<option>
					    	<option value="West Bengal">West Bengal<option>
					    </select>
					    <select id="city" name="city">
					    	<option value="0">--Select City--<option>
					    	<option value="Chennai">Chennai<option>
					    	<option value="Kolkata">Kolkata<option>
					    	<option value="Mumbai">Mumbai<option>
					    </select>
					    <select id="area" name="area">
					    	<option value="0">--Select Region--<option>
					    	<option value="Chennai">Chennai<option>
					    	<option value="Kolkata">Kolkata<option>
					    	<option value="Mumbai">Mumbai<option>
					    </select>
				  </div>

				  <div class="form-group">
				  	<label for="exampleInputEmail1">Select the Audio file Please ( Max 4MB )</label>
					<input type="file" name="audio" id="faudio"/>
				  </div>

				  <div class="form-group">
				  	<label for="exampleInputEmail1">Do you Have an Image ? ( Max 1MB )</label>
					<input type="file" name="image" id="fname"/>
				  </div>

				
				  <!-- enable if is an identifier -->
				<div>
					  <hr>
					  <h3>By Expart</h3>
					  <div class="form-group">
					  	<label for="exampleInputEmail1">Common Name</label>
					  	@if(Auth::user()->expart==1)
					    	<input type="text" class="form-control" id="cnamebyexp" name="cnamebyexp" placeholder="Please Enter Common name">
					    @else
					    	 <input type="text" class="form-control" id="cnamebyexp" name="cnamebyexp" placeholder="Please Enter Common name" disabled>
					    @endif
					  </div>

					  <div class="form-group">
					  	<label for="exampleInputEmail1">Scientific Name</label>
					  	@if(Auth::user()->expart==1)
					    	<input type="text" class="form-control" id="snamebyexp" name="snamebyexp" placeholder="Please Enter Scientific name">
					   @else
					   		<input type="text" class="form-control" id="snamebyexp" name="snamebyexp" placeholder="Please Enter Scientific name" disabled>
					   	@endif
					  </div>
				 </div>
				 

				 
				 <!-- enable if admin -->
				 <div>
					  <hr>
					  <h3>By Algorithm</h3>
					  <div class="form-group">
					  	<label for="exampleInputEmail1">Common Name</label>
					  	@if(Auth::user()->admin==1)
					   		<input type="text" class="form-control" id="cnamebyalgo" name="cnamebyalgo" placeholder="Please Enter Common name">
					   	@else
					   		<input type="text" class="form-control" id="cnamebyalgo" name="cnamebyalgo" placeholder="Please Enter Common name" disabled>
					   	@endif
					  </div>

					  <div class="form-group">
					  	<label for="exampleInputEmail1">Scientific Name</label>
					  	@if(Auth::user()->admin==1)
					    	<input type="text" class="form-control" id="snamebyalgo" name="snamebyalgo" placeholder="Please Enter Scientific name">
					    @else
					    	<input type="text" class="form-control" id="snamebyalgo" name="snamebyalgo" placeholder="Please Enter Scientific name" disabled>
					    @endif
					  </div>
				 <div>

				  <button type="reset" class="btn btn-default" data-dismiss="modal">Cancle</button>&nbsp;&nbsp;&nbsp;
				  <button type="submit" class="btn btn-default">Save</button>
				
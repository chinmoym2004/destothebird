<div>
    <span class="btn btn-success fileinput-button" id="newupload" data-toggle="modal" data-target="#editModal">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Upload File</span>
        <!-- The file input field used as target for the file upload widget -->
<!--         <input type="file" multiple="" name="file" id="fileupload" accept="audio/*">
 -->    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
</div>




<div class="container">
	<h2>Your uploads</h2>     
    <!-- Thumbnail Carousel -->
    <div class="scroll-containera table-responsive" id="alluploads"  style="font-size:12px;">
	                        <table class="table table-bordered table-striped" id="uploadTable">
	                        	<thead align="center" style="font-weight:bold">
	                        		<tr>
	                        			<td rowspan=2  style="padding-top: 25px;">Identification</td>
	                        			<td colspan=2>Identified By User</td>
	                        			<td colspan=2>Identified By Expert</td>
	                        			<td colspan=2>Identified By Algo</td>
	                        			<td rowspan=2  style="padding-top: 25px;">Recorded At</td>
	                        			<td rowspan=2  style="padding-top: 25px;">Recorded On</td>
	                        			<td colspan=3 rowspan=2  style="padding-top: 25px;">Operation</td>
	                        		</tr>	
	                        		<tr>		
	                        			<td>Common Name</td>
		                        		<td>Scientific Name</td>
		                        		<td>Common Name</td>
	                        			<td>Scientific Name</td>
	                        			<td>Common Name</td>
	                        			<td>Scientific Name</td>
	                        		</tr>	
	                        	</thead>
	                            <tbody>
								@if(count($alluploadbyu)>0)
								
									@foreach ($alluploadbyu as $upload)
										<tr>
										  <td id="td0-<?php echo $upload->id;?>">
												<img src="<?php echo asset('/uploads/image/').'/'.$upload->identified_img; ?>" class="thumb" />
										 </td>
										 <!-- By User -->
										 <!-- By Expart -->
										<td class="birdSpecies" id="td1-<?php echo $upload->id;?>">{{ $upload->specisname }}</td>
										<td class="birdName" id="td2-<?php echo $upload->id;?>">{{ $upload->specificname }}</td>
										 <!-- By Expart -->
										<td class="birdSpecies" id="td3-<?php echo $upload->id;?>">{{ $upload->cnamebyexp }}</td>
										<td class="birdName" id="td4-<?php echo $upload->id;?>">{{ $upload->snamebyexp }}</td>
										 
										  <!-- By Algo-->
										<td class="birdSpecies" id="td5-<?php echo $upload->id;?>">{{ $upload->cnamebyalgo }}</td>
										<td class="birdName" id="td6-<?php echo $upload->id;?>">{{ $upload->snamebyalgo }}</td>
										
										 <td class="birdArea" id="td7-<?php echo $upload->id;?>" title="<?php echo 'State : '.$upload->state.',City : '.$upload->city;?>">{{ $upload->area }}</td>
										 <td id="td8-<?php echo $upload->id;?>">{{ $upload->recorded_on }}</td>

										  <td><a href="<?php echo asset('/uploads/audio/').'/'.$upload->filpath;?>" title="Play" class="playaudio"><span class="glyphicon glyphicon-play"></san>
										  </a>&nbsp;&nbsp;&nbsp;

										  <a href="#" title="Delete" data-toggle="modal" class="deleteinfo" data-target="#deleteModal" id="<?php echo $upload->id;?>"><span class="glyphicon glyphicon-trash"></san>
										  </a>&nbsp;&nbsp;&nbsp;

										  <a href="#" title="Edit" data-toggle="modal" class="editinfo" data-target="#editModal" id="<?php echo $upload->id;?>"><span class="glyphicon glyphicon-pencil"></san>
										  </a></td>

										  <!--<td><audio src="upload/<?php //echo $upload->filpath;?>" preload="auto" /></td> img/birds/Acadian_Flycatcher.gif-->  
										</tr>
									@endforeach
								
								@else								
									<tr>
									  <td colspan="10" style="margin-top:50px"><h5>No records found</h5></td>
									</tr>
								@endif
	                            </tbody>
	                        </table>	 
	                        <div id="pager" class="pager" style="margin-top:20px;">
									<?php echo $alluploadbyu->links(); ?>
							</div>                       
	        </div>
</div>




<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Identification</h4>
      </div>
      <div class="modal-body">
      	<form id="edituploadinfo" name="edituploadinfo" enctype="multipart/form-data" role="form" accept-charset="UTF-8" method="POST" action="uploadedinfoupdate/0">
        		<!--Enable for general user but disable for admin and expart-->
				  <div class="form-group">
				  	<label for="exampleInputEmail1">Do you Know the Common Name ?</label>
				    <input type="text" class="form-control" id="specisname" name="specisname" placeholder="Please Enter Common name" required>
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
						    <select id="state" name="state" class="form-control">
						    	<option value="0">                                Select State                            <option>
								<option value="Andaman/Nicobar Islands">Andaman/Nicobar Islands</option>
								<option value="Andhra Pradesh">Andhra Pradesh</option>
								<option value="Arunachal Pradesh">Arunachal Pradesh</option>
								<option value="Assam">Assam</option>
								<option value="Bihar">Bihar</option>
								<option value="Chandigarh">Chandigarh</option>
								<option value="Chhattisgarh">Chhattisgarh</option>
								<option value="Dadra/Nagar Haveli">Dadra/Nagar Haveli</option>
								<option value="Daman/Diu">Daman/Diu</option>
								<option value="New Delhi">New Delhi</option>
								<option value="Goa">Goa</option>
								<option value="Gujarat">Gujarat</option>
								<option value="Haryana">Haryana</option>
								<option value="Himachal Pradesh">Himachal Pradesh</option>
								<option value="Jammu/Kashmir">Jammu/Kashmir</option>
								<option value="Jharkhand">Jharkhand</option>
								<option value="Karnataka">Karnataka</option>
								<option value="Kerala">Kerala</option>
								<option value="Lakshadweep">Lakshadweep</option>
								<option value="Madhya Pradesh">Madhya Pradesh</option>
								<option value="Maharashtra">Maharashtra</option>
								<option value="Manipur">Manipur</option>
								<option value="Meghalaya">Meghalaya</option>
								<option value="Mizoram">Mizoram</option>
								<option value="Nagaland">Nagaland</option>
								<option value="Orissa">Orissa</option>
								<option value="Pondicherry">Pondicherry</option>
								<option value="Punjab">Punjab</option>
								<option value="Rajasthan">Rajasthan</option>
								<option value="Sikkim">Sikkim</option>
								<option value="Tamil Nadu">Tamil Nadu</option>
								<option value="Tripura">Tripura</option>
								<option value="Uttaranchal">Uttaranchal</option>
								<option value="Uttar Pradesh">Uttar Pradesh</option>
								<option value="West Bengal">West Bengal</option>
						    </select>
					    	<input type="text" class="form-control" id="city" name="city" placeholder="Please enter city name">
					    	<input type="text" class="form-control" id="area" name="area" placeholder="Please enter sub-region">
					   <!--  <select id="city" name="city">
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
					    </select> -->
				  </div>

				  <div class="form-group">
				  	<label for="exampleInputEmail1">Select the Audio file Please ( Max 4MB )</label>
					<input type="file" name="audio" id="faudio" disabled="false"/>
				  </div>

				  <div class="form-group">
				  	<label for="exampleInputEmail1">Do you Have an Image ? ( Max 1MB )</label>
					<input type="file" name="image" id="fname"/>
				  </div>

				
				  <!-- enable if is an identifier -->
				<div>
					  <hr>
					  <h3>By Expert</h3>
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
				</form>

      </div>
      <div class="modal-footer">
       <!--  <button type="button" class="btn btn-default" >Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</div>



<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete Identification</h4>
      </div>
      <div class="modal-body">
        	{{ Form::open(array('role'=>'form','id'=>'deleteuploadinfo')) }}
				  <div class="form-group">
				    <h4>Are you sure ?</h4>
				  </div>
				  <button type="reset" class="btn btn-default" data-dismiss="modal">Cancle</button>&nbsp;&nbsp;&nbsp;
				  <button type="submit" class="btn btn-default">Yes</button>
				</form>

      </div>
      <div class="modal-footer">
       <!--  <button type="button" class="btn btn-default" >Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style type="text/css">
#alluploads table thead{
background: #18BC9C;
color:#fff;
}
</style>
<script>
document.forms['edituploadinfo'].addEventListener('submit', function( evt ) {
		    var afile = document.getElementById('faudio').files[0];
		    var ifile = document.getElementById('fname').files[0];
		    if(document.getElementById('faudio').disabled == false)
		    {
			    
			    if(afile && afile.size < 4194304) 
			    { 
			    } 
			    else
			    {
			    	// 4 MB (this size is in bytes)
			        alert("Error : Either audio size exited or file not selected");  
			        //Prevent default and display error
			        evt.preventDefault();
			    }
			}
		    if(ifile) 
		    { // 10 MB (this size is in bytes)
			   if(ifile.size > 1048576)
			    {
			    	alert("Error : Image File size exited !");
			      	evt.preventDefault();
			    }       
			} 
		}, false);


</script>
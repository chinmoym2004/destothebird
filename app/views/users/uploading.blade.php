<div>
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Select files...</span>
        <!-- The file input field used as target for the file upload widget -->
        <input type="file" multiple="" name="file" id="fileupload" accept="audio/*">
    </span>
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

	        <div class="scroll-containera table-responsive" id="alluploads">
	                        <table class="table table-hover tablesorter" cellspacing="1" id="birdTable">
	                        	<thead>
	                        		<tr>
	                        			<th>Identification</th>
	                        			<th>Species Name</th>
	                        			<th>Specific Name</th>
	                        			<th>Recorded At</th>
	                        			<th>Recorded On</th>
	                        			<th></th>
	                        			<th></th>
	                        			<th></th>

	                        		</tr>
	                        	</thead>
	                            <tbody class="list">
								@if(count($alluploadbyu)>0)
								
									@foreach ($alluploadbyu as $upload)
										<tr>
										  <td><img src="<?php echo $upload->identified_img;?>" class="thumb" /></td>

										  <td>{{ $upload->specisname }}</td>

										  <td>{{ $upload->specificname }}</td>
										  <td>{{ $upload->area }}</td>
										  <td>{{ $upload->recorded_on }}</td>

										  <td><a href="#" title="Play"><span class="glyphicon glyphicon-play"></san>
										  </a></td>

										  <td><a href="#" title="Delete" data-toggle="modal" class="deleteinfo" data-target="#deleteModal" id="<?php echo $upload->id;?>"><span class="glyphicon glyphicon-trash"></san>
										  </a></td>

										  <td><a href="#" title="Edit" data-toggle="modal" class="editinfo" data-target="#editModal" id="<?php echo $upload->id;?>"><span class="glyphicon glyphicon-pencil"></san>
										  </a></td>

										  <!--<td><audio src="upload/<?php //echo $upload->filpath;?>" preload="auto" /></td> img/birds/Acadian_Flycatcher.gif-->  
										</tr>
									@endforeach
								
								@else								
									<tr>
									  <td colspan="6" style="margin-top:50px"><h3>You haven't uploaded yet !!</h3></td>
									</tr>
								@endif
	                            </tbody>
	                        </table>	 
	                        <div id="pager" class="pager">
								<form>
									<img src="img/first.png" class="first"/>
									<img src="img/prev.png" class="prev"/>
									<input type="text" class="pagedisplay"/>
									<img src="img/next.png" class="next"/>
									<img src="img/last.png" class="last"/>
									<select class="pagesize">
										<option selected="selected"  value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
										<option  value="40">40</option>
									</select>
								</form>
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
        	{{ Form::open(array('role'=>'form','id'=>'edituploadinfo')) }}
				  <div class="form-group">
				    <input type="text" class="form-control" id="specisname" name="specisname" placeholder="Enter specis name">
				  </div>

				  <div class="form-group">
				    <input type="text" class="form-control" id="specificname" name="specificname" placeholder="Enter specific name">
				  </div>
				  <div class="form-group">
				    <input type="text" class="form-control" id="area" name="area" placeholder="Where you recorded this ?">
				  </div>
				  <div class="form-group">
				    <input type="text" class="form-control" id="datepicker" name="recorded_on" placeholder="When you recorder ? e.g. 2011-11-11" autocomplete='off'>
				  </div>
				  <div class="form-group">
				    <label for="identified_img">Upload Image</label>
				    <input type="file" id="identified_img" name="file"><br/>
				    <img href="#" class="thumbnail" data-src="holder.js/150x180"/>
				  </div>
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
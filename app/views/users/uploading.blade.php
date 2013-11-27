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
	                        			<th>Tag No.</th>
	                        			<th>File Path</th>
	                        			<th>Posted On</th>
	                        			<th>Status</th>
										<th>Sound</th>
	                        		</tr>
	                        	</thead>
	                            <tbody class="list">
								@if(count($alluploadbyu)>0)
								
								@foreach ($alluploadbyu as $upload)
									<tr>
									  <td>{{ $upload->id }}</td>
									  <td>Play</td>
<!-- 									  <td><audio src="upload/<?php //echo $upload->filpath;?>" preload="auto" /></td>
 -->									  <td>{{ $upload->created_at }}</td>
									  <td>{{ $upload->status }}</td>
									  
									</tr>
								@endforeach
								
								@else								
									<tr>
									  <td colspan="5"><h3>You haven't uploaded yet !!</h3></td>
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
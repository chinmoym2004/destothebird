<div class="row">
{{ Form::open(array('url'=>'users/identifyrequest', 'class'=>'form-signin')) }}
	<div class="col-md-8" style="margin-top:10px;">
		<div id="html4_uploader" style="height: 330px; position: relative;">Your browser doesn't have HTML 4 support.</div>
	
		<div id="html5_uploader" style="height: 330px; position: relative;">Your browser doesn't support native upload.</div>
	</div>
	<div class="col-md-4" style="margin-top:150px;">
	{{ Form::submit('Send Identify Request', array('class'=>'btn btn-default'))}}
	</div>
{{ Form::close() }}

</div>

<div class="container">
	      		<h2>Your uploads</h2>     

	        <!-- Thumbnail Carousel -->

	        <div class="scroll-containera table-responsive">
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
									  <td>{{ $upload->filpath }}</td>
									  <td>{{ $upload->created_at }}</td>
									  <td>{{ $upload->status }}</td>
									  <td>Play</td>
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
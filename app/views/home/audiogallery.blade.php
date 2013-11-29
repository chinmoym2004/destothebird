<div class="">
	      	<div class="well">
	      		<h1>Wildlife Acoustics</h1>
	      	</div>
	        

	        <!-- Thumbnail Carousel -->

	        <div class="wellq">        
 
				<div class="">
					<div id="audio-gallery-list" style="display:block;">
						<div class="col-md-12 center">
							<span class="col-md-6">
								<input type="text" id="search" class="search form-control col-md-4"  placeholder="Filter by Specific Name or Species Name  " /> 
							</span>
							<span class="col-md-6">
								<input type="text" id="searchArea" class="search form-control col-md-4"  placeholder="Filter by Area" /> 
							</span>							                    
		                    
						</div>
						
						
						<br/><br/><br/><br/>	                    
						<div class="scroll-containera table-responsive">
	                        <table class="table table-hover tablesorter" cellspacing="1" id="birdTable">
	                        	<thead>
	                        		<tr>
	                        			<th>Thumb</th>
	                        			<th>Species Name</th>
	                        			<th>Specific Name</th>
	                        			<th>Area</th>
	                        			<th>Uploaded By</th>
	                        		</tr>
	                        	</thead>
	                            <tbody class="list">
								<?php
									if(count($alluploadbyu)>0)
									{
										foreach($alluploadbyu as $tmp)
										{
											echo '<tr><td><img src="../uploads/images/'.$tmp->identified_img.'" class="thumb" /></td>';
											echo "<td>".$tmp->specisname."</td>";
											echo "<td>".$tmp->specificname."</td>";
											echo "<td>".$tmp->area."</td>";
											echo "<td>Unknown</td></tr>";
											
										}
									}
									else
									{
											echo "<tr><td colspan='5'><h5>No audio clip found </h5></td><tr>";
									}
								?>
	                            	<!--
	                            	<tr>
	                            		<td>36</td>
	                            		<td><img src="img/birds/Yellow-billed_Cuckoo.gif" class="thumb" /></td>
	                            		<td class="birdSpecies">Yellow-billed Cuckoo</td>
	                            		<td class="birdName">Coccyzus americanus</td>
	                            		<td class="birdArea">America</td>
	                            		<td>ABC</td>
	                            	</tr>-->
	                            </tbody>
	                        </table>	 
	                        <div id="pager" class="pager" style="margin-top:20px;">
									<?php echo $alluploadbyu->links(); ?>
							</div>                        
	                    </div>
	                    
	                </div>

                </div>
				 
			</div><!--/well-->
</div>
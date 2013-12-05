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
	                        			<th>play</th>
	                        		</tr>
	                        	</thead>
	                            <tbody class="list">
								<?php
									if(count($alluploadbyu)>0)
									{
										foreach($alluploadbyu as $tmp)
										{
								?>
								<tr>
									<td><img src="<?php echo asset('/uploads/image/').'/'.$tmp->identified_img;?>" class="thumb"/></td>
									<td class='birdSpecies'><?php echo $tmp->specisname;?></td>
									<td class='birdName'><?php echo $tmp->specificname;?></td>
									<td class="birdArea" title="<?php echo 'State : '.$tmp->state.',City : '.$tmp->city;?>"><?php echo $tmp->area;?></td>
									<td><?php echo $tmp->firstname." ".$tmp->lastname;?></td>
									<td><a href="<?php echo asset('/uploads/audio/').'/'.$tmp->filpath;?>" title="Play" class="playaudio"><span class="glyphicon glyphicon-play"></san>
									</a></td>
								</tr>
											
								<?php
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
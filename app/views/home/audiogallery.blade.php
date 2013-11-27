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
											echo '<td><img src="img/birds/Acadian_Flycatcher.gif" class="thumb" /></td>';
											echo "<td>".$tmp->specisname."</td>";
											echo "<td>".$tmp->specificname."</td>";
											echo "<td>".$tmp->area."</td>";
											echo "<td>NA</td>";
											
										}
									}
									else
									{
											echo "<td><h3>No verification done yet :-( </h3></td>";
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

                </div>
				 
			</div><!--/well-->
</div>
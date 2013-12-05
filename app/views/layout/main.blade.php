<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Wildlife Acoustics</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
            .pad-left-5{
            	padding-left: 5px;
            }
            .pad-right-5{
            	padding-right:5px;
            }
            .mrg-left-5{
            	margin-left: 5px;
            }
            .mrg-right-5{
            	margin-right:5px;
            }
            .mrg-5{margin:5px;}
            .pad-5{padding:5px;}
            .header-login{width:150px;}
            .center{
			    float: none;
			    margin: 0 auto;
			}
            /* - Carousel - */
            /* Removes the default 20px margin and creates some padding space for the indicators and controls */
			.carousel {
				margin-bottom: 0;
				padding: 10px;
			}
			/* Reposition the controls slightly */
			.carousel-control {
				left: -12px;
			}
			.carousel-control.right {
				right: -12px;
			}
			/* Changes the position of the indicators */
			.carousel-indicators {
				right: 50%;
				top: auto;
				bottom: 0px;
				margin-right: -19px;
			}
			/* Changes the colour of the indicators */
			.carousel-indicators li {
				background: #c0c0c0;
			}
			.carousel-indicators .active {
			background: #333333;
			}
            /* - /Carousel- */
        </style>
        <!-- <link rel="stylesheet" href="css/bootstrap-theme.min.css"> -->
        <link rel="stylesheet" href="{{URL::asset('css/main.css') }}" >

        <script src="{{URL::asset('js/vendor/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
	    <div class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
				{{ HTML::link('/', 'Wildlife Acoustics',array('class'=>'navbar-brand')) }}
	        </div>
	        <div class="navbar-collapse collapse">
	          <ul class="nav navbar-nav">
			  @if(!Auth::check())
				<li class="" id="home">
					{{ HTML::link('/', 'Home') }}
				</li>
	            <li id="agal">
					{{ HTML::link('home/audiogallery', 'Audio Gallery') }}
				</li>
			  @else
				<li class="" id="home">{{ HTML::link('/', 'Home') }}</li>
	            <li id="agal">{{ HTML::link('home/audiogallery', 'Audio Gallery') }}</li>
	            <li id="upload">{{ HTML::link('users/upload', 'Upload') }}</li>
	            
		            @if(Auth::user()->expart==1)
		            	<!-- <li id="identify">{{ HTML::link('users/identify', 'Identify') }}</li> -->
		             @endif
		             @if(Auth::user()->admin==1)
		            	<li id="identify">{{ HTML::link('users/setting', 'Setting') }}</li>
		             @endif
	           		<!--<li><a href="#exclusive-gallery">Exclusive Gallery</a></li>-->
			  @endif
	           
	          </ul>


			  
	          <div class="dropdown navbar-form navbar-right">
					@if(!Auth::check())
						<!-- link trigger modal -->			  
						<a href="#" class="dropdown-toggle btn btn-primary" data-toggle="modal" data-target="#loginModel"><span class="glyphicon glyphicon-log-in pad-right-5"></span> Sign in  </a>		  
					@else
						<a href="{{URL::to('users/logout')}}" class="btn btn-primary"><span class="glyphicon glyphicon-log-out pad-right-5"></span>Log out</a>
					@endif					
			  </div>          
	        </div><!--/.navbar-collapse -->
	      </div>
	    </div>
		<br/>

			<!-- Modal -->	
			  <div class="modal fade" id="loginModel" tabindex="-1" role="dialog" aria-labelledby="loginModelLabel" aria-hidden="true" data-backdrop="true" data-keyboard="true">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="loginModelLabel">Sign In</h4>
					  </div>
					  <div class="modal-body">
						  {{ Form::open(array('url' => 'users/signin','class'=>'mrg-left-5 mrg-right-5','role'=>'form')) }}
							   {{Form::text('email',null, array('class'=>'form-control', 'placeholder'=>'Email Address'))}}<br/>
							   {{Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password'))}}<br/>
							   <div class="control-group">
									<div class="controls">
										<label class="checkbox">
											<input type="checkbox"><span class="metro-checkbox">Remember me</span>
										</label>
										<div>{{ Form::submit('Login', array('class'=>'btn btn-primary'))}}&nbsp;&nbsp;&nbsp;{{ HTML::link('password/reset', 'Forgot Password?') }}</div>
									</div>
								</div>
						  {{ Form::close() }}
					  </div>
					  <div class="modal-footer">						
						{{ HTML::link('users/register', 'New User ?',array('class'=>'btn btn-default')) }}
					  </div>
					</div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.modal -->	

		
		<!--Here is your content goes . all other layout will be displayed under this layout -->

	    <div class="container">
	      @if(Session::has('message'))
	      	<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  {{ Session::get('message') }}.
			</div>
	      @endif
		  {{ $content }}
	    </div>
		<script></script>
		<!--End of the content holder -->
		
		<!--Start of Footer -->

	    <div class="container">
		    <hr>
		    <footer>
		      <p>&copy; TheBird 2013</p>
		    </footer>
	    </div> <!-- /container -->
	    <!--End of Footer -->
        
        <script src="{{ URL::asset('js/vendor/jquery-1.10.1.min.js')}}"></script>

        <script src="{{ URL::asset('js/vendor/bootstrap.js')}}"></script>


        <script src="{{ URL::asset('js/holder.js')}}"></script>
        <script src="{{ URL::asset('js/list.min.js')}}"></script>

        <script src="{{ URL::asset('js/plugins.js')}}"></script>
        <script src="{{ URL::asset('js/main.js')}}"></script>

<!--This are for file upload-->

		<link rel="stylesheet" href="{{URL::asset('css/upload/jquery.fileupload.css') }}" >
		<!-- Third party script for BrowserPlus runtime (Google Gears included in Gears runtime now) -->
		<script type="text/javascript" src="{{ URL::asset('js/vendor/fileupload/jquery.ui.widget.js')}}"></script>
		<!-- Load plupload and all it's runtimes and finally the jQuery queue widget -->
		<script type="text/javascript" src="{{ URL::asset('js/vendor/fileupload/jquery.iframe-transport.js')}}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/vendor/fileupload/jquery.fileupload.js')}}"></script>
<!--This are for audio play -->

		<script type="text/javascript" src="{{ URL::asset('js/howler-js-master/howler.js')}}"></script>

<!-- for inline edit options -->
		<link href="{{ URL::asset('css/bootstrap3-editable/bootstrap-editable.css')}}" rel="stylesheet">
		<script src="{{ URL::asset('js/bootstrap3-editable/bootstrap-editable.js')}}"></script>
<!-- end -->

<!-- for date picker and tooltip -->
		<link href="{{ URL::asset('css/datepicker/jquery-ui.css')}}" rel="stylesheet">
		<script src="{{ URL::asset('js/datepicker/jquery-ui.js')}}"></script>
<!-- end -->

<!-- state city region -- >
	<script src="{{ URL::asset('js/state_city_region.js')}}"></script>
<!-- end -->
		<script type="text/javascript">
		/*function getCookie(name) 
			{ 
				var re = new RegExp(name + "=([^;]+)"); 
				var value = re.exec(document.cookie); 
					return (value != null) ? unescape(value[1]) : null; 
			}
		*/
	    // Define value names
        
	    // Define value names
        var options = {
    	    valueNames: [ 'birdSpecies', 'birdName']
        };
        var options2 = {
    	    valueNames: [ 'birdArea']
        };
        

        // Init list
        var birdList = new List('audio-gallery-list', options);
        //var birdList1 = new List('audio-gallery-list', options2);

        // $('#search').keypress(searchNames);	
        // $('#searchArea').keypress(searchArea);	

        function searchNames(event){
        	var birdList = new List('audio-gallery-list', options);
        }

        function searchArea(event){
        	var birdList = new List('audio-gallery-list', options2);
        }

        

		$(document).ready(function() {
			/*==============for tooltip ==========*/

			$(document).tooltip({
				track: true
			});

			$('#myCarousel').carousel({
				interval: 10000
			});	

			//$(".alert").delay(3200).fadeOut(300);

			$(".nav li").click(function(){
				/* var actv='\"#'+this.id+'\"';
				//alert();
				document.cookie="lastclick=" + actv;
				$(".nav li").removeClass("active");
				alert(getCookie("lastclick"));
				//$().addClass("active"); */
			});

			/*=================For audio file upload===============*/
			
			var url = 'upload';
			    $('#fileupload').fileupload({
			        url: url,
			        dataType: 'json',
			        done: function (response) {
			          //ajax call to update the upload table 
							var xmlhttp;
							if (window.XMLHttpRequest)
							  {// code for IE7+, Firefox, Chrome, Opera, Safari
							  xmlhttp=new XMLHttpRequest();
							  }
							else
							  {// code for IE6, IE5
							  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
							  }
							xmlhttp.onreadystatechange=function()
							  {
							  if (xmlhttp.readyState==4 && xmlhttp.status==200)
							    {
							       // $.get("upload");
							        location.reload('users/upload'); 
							       
							       /* $(xmlhttp.responseText).find('#alluploads').each(function(){
					                document.getElementById("alluploads").innerHTML=$(this).html(); //here including the div content
					                $('#editModal').modal('show');

					            });*/
			    				
							    
							    }
							  }
							xmlhttp.open("GET","upload",true);
							xmlhttp.send();
							
					    },
			        progressall: function (e, data) {
			            var progress = parseInt(data.loaded / data.total * 100, 10);
			            $('#progress .progress-bar').css(
			                'width',
			                progress + '%'
			            );
			        }
			    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');

			/*===============End=============*/

			
			/*============end============*/
			/*=========for model wise operation =========*/
			var imagefo;
			$("a").click(function(e){
				//e.preventDefault();
				/*-----for edit-----*/
				if($(this).hasClass("editinfo"))
				{
					$("#edituploadinfo").removeAttr("action");
					$("#edituploadinfo").attr("action","uploadedinfoupdate/"+$(this).attr("id"));
					/*$.get("loadmodeltoupdate?id="+$(this).attr("id"),function(data){
						$("#edituploadinfo").html(data);	
					});*/
					//$("#faudio").attr('disabled',true);
					$("#specisname").val($("#td1-"+$(this).attr("id")).text());
					$("#specificname").val($("#td2-"+$(this).attr("id")).text());
					$("#cnamebyexp").val($("#td3-"+$(this).attr("id")).text());
					$("#snamebyexp").val($("#td4-"+$(this).attr("id")).text());
					$("#cnamebyalgo").val($("#td5-"+$(this).attr("id")).text());
					$("#snamebyalgo").val($("#td6-"+$(this).attr("id")).text());
					$("#area").val($("#td7-"+$(this).attr("id")).text());
					$("#datepicker").val($("#td8-"+$(this).attr("id")).text());
					document.getElementById('faudio').disabled = true;
					$("#identified_img").attr("data-id",$(this).attr("id"));
				}
				/*-----for delete-----*/
				if($(this).hasClass("deleteinfo"))
				{
					//$("#deleteuploadinfo").removeAttr("action");
					$("#deleteuploadinfo").attr("action","uploadedinfodelete/"+$(this).attr("id"));
				}
				/*============for audio play==========*/
				if($(this).hasClass("playaudio"))
				{
						//alert($(this).attr("href"));
					var sound = new Howl({
					  urls: [$(this).attr("href")]
					}).play();
				}
			});
			$("#newupload").click(function(){
				$("#edituploadinfo").removeAttr("action");
				$("#edituploadinfo").attr("action","uploadedinfoupdate/0");
				$("#specisname").val("");
				$("#specificname").val("");
				$("#cnamebyexp").val("");
				$("#snamebyexp").val("");
				$("#cnamebyalgo").val("");
				$("#snamebyalgo").val("");
				$("#area").val("");
				$("#datepicker").val("");
				document.getElementById('faudio').disabled = false;
				//$("#faudio").attr('disabled',false);

			});

			/*==========post all data after edit to update==============*/
/*
				$("#edituploadinfo").submit(function(e) {
					e.preventDefault();

				    //var url =$(this).attr("action"); // the script where you handle the form input.
				    $.ajax({
				           type: "POST",
				           url: $(this).attr("action"),
				           data: $(this).serialize()+'&'+$.param({ 'image': $('#fname').val() }),// serializes the form's elements.
				           success: function(data)
				           {
				               $("#edituploadinfo")[0].reset();
				               $('#editModal').modal('hide');
				               //ajax call to update the upload table 
								var xmlhttp;
								if (window.XMLHttpRequest)
								  {// code for IE7+, Firefox, Chrome, Opera, Safari
								  xmlhttp=new XMLHttpRequest();
								  }
								else
								  {// code for IE6, IE5
								  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
								  }
								xmlhttp.onreadystatechange=function()
								  {
								  if (xmlhttp.readyState==4 && xmlhttp.status==200)
								    {
								        $(xmlhttp.responseText).find('#alluploads').each(function(){
						                document.getElementById("alluploads").innerHTML=$(this).html(); //here including the div content
						            });
								    
								    }
								  }
								xmlhttp.open("GET","upload",true);
								xmlhttp.send();
				           }
				         });

				    return false; // avoid to execute the actual submit of the form.
				});

*/
			/*==========ajax data delete from upload table and dispaly result after delete==============*/

				$("#deleteuploadinfo").submit(function(e) {
					e.preventDefault();
				    //var url =$(this).attr("action"); // the script where you handle the form input.

				    $.ajax({
				           type: "POST",
				           url: $(this).attr("action"),
				           data: $(this).serialize(), // serializes the form's elements.
				           success: function(data)
				           {
				         
				               $('#deleteModal').modal('hide');
				               //ajax call to update the upload table 
								var xmlhttp;
								if (window.XMLHttpRequest)
								  {// code for IE7+, Firefox, Chrome, Opera, Safari
								  xmlhttp=new XMLHttpRequest();
								  }
								else
								  {// code for IE6, IE5
								  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
								  }
								xmlhttp.onreadystatechange=function()
								  {
								  if (xmlhttp.readyState==4 && xmlhttp.status==200)
								    {
								        /*
								        $(xmlhttp.responseText).find('#alluploads').each(function(){
						                document.getElementById("alluploads").innerHTML=$(this).html(); //here including the div content
						                

						            });*/
								    location.reload("users/upload");

								    }
								  }
								xmlhttp.open("GET","upload",true);
								xmlhttp.send();
				           }
				         });

				    return false; // avoid to execute the actual submit of the form.
				});
			/*===========for date picker ============*/
				$("#datepicker").datepicker({ dateFormat: 'yy-dd-mm'});
			/*=================For image file upload for a audio===============
			var url = 'uploadimageforaudio';
			    $('#identified_img').fileupload({
			        url: url,
			        dataType: 'json',
			        done: function (e,response) {
			        	$("#files").html(response); 
			        	
					},
			        progressall: function (e,data) {
			            var progress = parseInt(data.loaded / data.total * 100, 10);
			            $('#progress1 .progress-bar').css(
			                'width',
			                progress + '%'
			            );
			        }
			    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');*/

				/* ========for user setting ===========*/
				$('#usertype').on('change', '', function (e) {
						var optionSelected = $("option:selected", this);
    					var valueSelected = this.value;
    					$.post("setting",{usertype:valueSelected,userid:this.name},function(){

    					}).done(function() {
						    alert( "User's privilege Updated ..." );
						});
						/*.fail(function() {
						    alert( "error" );
						})
						.always(function() {
						    alert( "finished" );
						 });*/
    					//alert(valueSelected+"name:"+this.name);
				});
		});

		Holder.add_theme("dark", {background:"#000", foreground:"#aaa", size:11, font: "Monaco"})
		</script>
        <!--
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        -->
    </body>
</html>

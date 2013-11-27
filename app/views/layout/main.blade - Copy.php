<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
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
		<link rel="stylesheet" href="{{URL::asset('css/upload/jquery.plupload.queue.css') }}" >

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
				<li class="active" id="home">
					{{ HTML::link('/', 'Home') }}
				</li>
	            <li id="agal">
					{{ HTML::link('home/audiogallery', 'Audio Gallery') }}
				</li>
			  @else
				<li class="active" id="home">{{ HTML::link('/', 'Home') }}</li>
	            <li id="agal">{{ HTML::link('home/audiogallery', 'Audio Gallery') }}</li>
	            <li id="upload">{{ HTML::link('users/upload', 'Upload') }}</li>
	            
		            @if(Auth::user()->useras==2)
		            	<li id="identify">{{ HTML::link('users/identify', 'Identify') }}</li>
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
	      <!--@if(Session::has('message'))
	         <div class="alert">{{ Session::get('message') }}</div>
	      @endif -->
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
		<!-- Third party script for BrowserPlus runtime (Google Gears included in Gears runtime now) -->
		<script type="text/javascript" src="{{ URL::asset('js/plupload/js/browserplus-min.js')}}"></script>
		<!-- Load plupload and all it's runtimes and finally the jQuery queue widget -->
		<script type="text/javascript" src="{{ URL::asset('js/plupload/js/plupload.full.min.js')}}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/plupload/js/jquery.plupload.queue.js')}}"></script>
		<script type="text/javascript">
		function getCookie(name) 
			{ 
				var re = new RegExp(name + "=([^;]+)"); 
				var value = re.exec(document.cookie); 
					return (value != null) ? unescape(value[1]) : null; 
			}
		$(document).ready(function() {
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
			// Setup html5 version
			$("#html5_uploader").pluploadQueue({
				// General settings
				runtimes : 'html5',
				url : '../../upload',
				chunk_size : '1mb',
				unique_names : true,
				
				filters : {
					max_file_size : '10mb',
					mime_types: [
						{title : "Image files", extensions : "jpg,gif,png"},
						{title : "Zip files", extensions : "zip"}
					]
				},

				// Resize images on clientside if we can
				resize : {quality : 90}
			});


			// Setup html4 version
			$("#html4_uploader").pluploadQueue({
				// General settings
				runtimes : 'html4',
				url : '../../upload',
				unique_names : true,				
				filters : {
					mime_types: [
						{title : "Image files", extensions : "jpg,gif,png"},
						{title : "Zip files", extensions : "zip"}
					]
				},
			});
		});
		var canvas = document.createElement('canvas'), context;
			if (!canvas.getContext) {
				$("#html5_uploader").hide();
			}
			else{
				$("#html4_uploader").hide();
			}
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

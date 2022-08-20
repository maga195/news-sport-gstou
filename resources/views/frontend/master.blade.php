<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


		@yield('title')
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CLato:300,400" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/bootstrap.min.css') }}"/>

		<!-- Image hero-slider-style stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/hero-slider-style.css') }}"/>
		<!-- Image magnific-popup stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/magnific-popup.css') }}"/>
		<!-- Image magnific-popup stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/tooplate-style.css') }}"/>

		<!-- Owl Carousel -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/owl.carousel.css') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/owl.theme.default.css') }}" />

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('css/frontend/font-awesome.min.css') }}">
        <link href="{{ asset('css/frontend/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/style.css') }}"/>


		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Top Header -->
			<div id="top-header">
				<div class="container">
					@if(is_countable($icons) > 0)
						<div class="header-social">
							<ul>
							    <li><a href="https://chat.whatsapp.com/L5gTeDuMXm38VvM345vVuq" class="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
								<li><a href="https://t.me/sport_gstou" class="telegram"><i class="fa fa-telegram"></i></a></li>
								@foreach($socials as $key => $social)
									<li><a href="{{ $social->urlsocial }}" class="{{$icons[$key]}}"><i class="fa fa-{{$icons[$key]}}"></i></a></li>
								@endforeach
							</ul>
						</div>
					@endif
				</div>
			</div>
			<!-- /Top Header -->

			<!-- Center Header -->
			<div id="center-header">
				<div class="container">
					@if(isset($setting))
					<div class="header-logo">
						<a href="{{ url('/') }}" class="logo"><img src="{{ url('uploads/settings') }}/{{ $setting->image }}" alt="" ></a>
					</div>
					<div class="header-logo" style="float: right; ">
						<a href="{{ url('/') }}" class="logo"><img  src="{{ url('uploads/others/logosport-right.png') }}" alt="" ></a>
					</div>
					<h1 class="article-title " style="color: #415576;">{{ $setting->title }}</h1>

					@endif
				</div>
			</div>
			<!-- /Center Header -->

			<!-- Nav Header -->
			<div id="nav-header">
				<div class="container">
					<nav id="main-nav">
						<div class="nav-logo">
							<a href="{{ url('/') }}" class="logo"><img src="{{ url('uploads/settings') }}/{{ $setting->image }}" alt=""></a>
						</div>
						<ul class="main-nav nav navbar-nav">
						<li  class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                            @foreach($categories as $key => $cat)
								@if($key < 1)
									<li  class="{{ request()->is('category/'.$cat->slug) ? 'active' : '' }}"><a href="{{ url('category') }}/{{ $cat->slug }}">{{ $cat->title }}</a></li>
								@endif
                            @endforeach
							@foreach($dcategories as $key => $cat)
								@if($key < 2)
									<li  class="{{ request()->is('dcategory/'.$cat->slug) ? 'active' : '' }}"><a href="{{ url('dcategory') }}/{{ $cat->slug }}">{{ $cat->title }}</a></li>
								@endif
                            @endforeach
							<li  class="{{ request()->is('plan-events') ? 'active' : '' }}"><a href="{{ url('plan-events') }}">План мероприятий</a></li>
							<li  class="{{ request()->is('video') ? 'active' : '' }}"><a href="{{ url('video') }}">Видео</a></li>
							<li  class="{{ request()->is('multi-gallery') ? 'active' : '' }}"><a href="{{ url('/multi-gallery') }}">Фотоматериалы</a></li>
							<li  class="{{ request()->is('project') ? 'active' : '' }}"><a href="{{ url('/project') }}">О проекте</a></li>
						</ul>
					</nav>
					<div class="button-nav">
						<button class="search-collapse-btn"><i class="fa fa-search"></i></button>
						<button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
						<div class="search-form" style="color: #000;">
							<form>
								<input class="input" id="search-content" type="search"  placeholder="Search">
								<div id="search-output" ></div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Nav Header -->
		</header>
		<!-- /Header -->

        @yield('content')

        <!-- FOOTER -->
		<footer id="footer">
			<!-- Top Footer -->
			<div id="top-footer" class="section">
				<!-- CONTAINER -->
				<div class="container">
					<!-- /Column 2 -->


					<!-- ROW -->
					<div class="row">


						<!-- Column 2 -->
						<div class="col-md-2">
							<!-- footer article -->
							<div class="footer-widget">

								@foreach($categories as $key => $cat)
									@if($key < 1)
									<!-- ARTICLE -->
									<article class="article widget-article">
										<div class="article-body">
											<h4 class="article-title"><a href="{{ url('category') }}/{{ $cat->slug }}">{{ $cat->title }}</a></h4>
										</div>
									</article>
									<!-- /ARTICLE -->
									@endif
								@endforeach
							</div>
							<!-- /footer article -->
						</div>
						<!-- /Column 2 -->
						<!-- Column 2 -->
						<div class="col-md-2">
							<!-- footer article -->
							<div class="footer-widget">

								@foreach($dcategories as $key => $cat)
									@if($key >= 0 && $key < 2)
									<!-- ARTICLE -->
									<article class="article widget-article">
										<div class="article-body">
											<h4 class="article-title"><a href="{{ url('dcategory') }}/{{ $cat->slug }}">{{ $cat->title }}</a></h4>
										</div>
									</article>
									<!-- /ARTICLE -->
									@endif
								@endforeach
							</div>
							<!-- /footer article -->
						</div>
						@if(isset($setting))
						<div class="col-md-7">
							<!-- footer article -->
							<div class="footer-widget">
								<h4 class="article-title" style="color: #DDD;">{{ $setting->title }}</h4>
								<div class="footer-widget about-widget">
									<p>
										{{ $setting->about }}
									</p>
								</div>
							</div>
							<!-- /footer article -->
						</div>
						@endif
					</div>
					<!-- /ROW -->
				</div>
				<!-- /CONTAINER -->
			</div>
			<!-- /Top Footer -->


		</footer>
		<!-- /FOOTER -->

		<!-- Back to top -->
		<div id="back-to-top"></div>
		<!-- Back to top -->


		<!-- jQuery Plugins -->
		<script src="{{ asset('js/frontend/jquery-1.11.3.min.js') }}"></script>
		<script src="{{ asset('js/frontend/jquery.min.js') }}"></script>
		<script src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/frontend/owl.carousel.min.js') }}"></script>

		<script src="{{ asset('js/frontend/main.js') }}"></script>



		<script src="{{ asset('js/frontend/hero-slider-main') }}"></script>
		<script src="{{ asset('js/frontend/jquery.magnific-popup.min.js') }}"></script>

		<script>

function adjustHeightOfPage(pageNo) {

	var offset = 80;
	var pageContentHeight = 0;

	var pageType = $('div[data-page-no="' + pageNo + '"]').data("page-type");

	if( pageType != undefined && pageType == "gallery") {
		pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .tm-img-gallery-container").height();
	}
	else {
		pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height() + 20;
	}

	if($(window).width() >= 992) { offset = 120; }
	else if($(window).width() < 480) { offset = 40; }

	// Get the page height
	var totalPageHeight = $('.cd-slider-nav').height()
							+ pageContentHeight + offset
							+ $('.tm-footer').height();

	// Adjust layout based on page height and window height
	if(totalPageHeight > $(window).height())
	{
		$('.cd-hero-slider').addClass('small-screen');
		$('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
	}
	else
	{
		$('.cd-hero-slider').removeClass('small-screen');
		$('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
	}
}

/*
	Everything is loaded including images.
*/
$(window).load(function(){

	adjustHeightOfPage(1); // Adjust page height

	/* Gallery One pop up
	-----------------------------------------*/
	$('.gallery-one').magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'image',
		gallery:{enabled:true}
	});

	/* Gallery Two pop up
	-----------------------------------------*/
	$('.gallery-two').magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery:{enabled:true}
	});

	/* Gallery Three pop up
	-----------------------------------------*/
	$('.gallery-three').magnificPopup({
		delegate: 'a',
		type: 'image',
		gallery:{enabled:true}
	});

	/* Collapse menu after click
	-----------------------------------------*/
	$('#tmNavbar a').click(function(){
		$('#tmNavbar').collapse('hide');

		adjustHeightOfPage($(this).data("no")); // Adjust page height
	});

	/* Browser resized
	-----------------------------------------*/
	$( window ).resize(function() {
		var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");

		// wait 3 seconds
		setTimeout(function() {
			adjustHeightOfPage( currentPageNo );
		}, 1000);

	});

	// Remove preloader (https://ihatetomatoes.net/create-custom-preloading-screen/)
	$('body').addClass('loaded');

});

/* Google map
------------------------------------------------*/
var map = '';
var center;

function initialize() {
	var mapOptions = {
		zoom: 14,
		center: new google.maps.LatLng(37.769725, -122.462154),
		scrollwheel: false
	};

	map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

	google.maps.event.addDomListener(map, 'idle', function() {
	  calculateCenter();
	});

	google.maps.event.addDomListener(window, 'resize', function() {
	  map.setCenter(center);
	});
}

function calculateCenter() {
	center = map.getCenter();
}

function loadGoogleMap(){
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
	document.body.appendChild(script);
}

// DOM is ready
$(function() {
	loadGoogleMap(); // Google Map
});

</script>

		<script>
			$('#search-content').keyup(function(){
            var text = $('#search-content').val();
            if(text.length < 1){
                $('#search-output').hide();
                return false;
            }else{
                $.ajax({
                    type: "GET",
                    url: "{{ url('search-content') }}",
                    data: {
                        text: text
                    },
                    success:function(res){
                        $('#search-output').show();
                        $('#search-output').html(res);
                    }
                })
            }
        })
		</script>

	</body>
</html>

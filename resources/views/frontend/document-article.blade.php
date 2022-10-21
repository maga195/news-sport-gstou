@extends('frontend.master')
@section('title')
<title>{{ $article->title }}</title>
@stop
@section('content')

		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-8">

						<!-- breadcrumb -->
						<ul class="article-breadcrumb">
							<li><a href="{{ url('/') }}">Главное</a></li>
						</ul>
						<!-- /breadcrumb -->

						<!-- ARTICLE POST -->
						<article class="article article-post">
							<div class="article-share">
								<a class="whatsapp" id="whatsapp-share-button" data-action="share/whatsapp/share"  target="_blank"><i class="fa fa-whatsapp"></i></a>
								<a class="telegram" id="telegram-share-button"><i class="fa fa-telegram"></i></a>

								<a class="vk" id="vk-share-button" ><i class="fa fa-vk"></i></a>
								<!-- <a href="#" class="google"><i class="fa fa-google-plus"></i></a> -->
							</div>

							<div class="article-body">

								<h1 class="article-title">{{ $article->title }}</h1>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($article->created_at)->diffForHumans() }}</li>
								</ul>



								<iframe src="https://docs.google.com/gview?url={{ url('uploads/documents')}}/{{ $article->image }}&embedded=true"></iframe>
							</div>
						</article>
						<!-- /ARTICLE POST -->


					</div>
					<!-- /Main Column -->

					<!-- Aside Column -->
					<div class="col-md-4">
						<!-- Ad widget -->
						<div class="widget center-block hidden-xs">
							<img class="center-block" src="./img/ad-1.jpg" alt="">
						</div>
						<!-- /Ad widget -->


						<!-- article widget -->
						<div class="widget">
							<div class="section-title">
								<h2 class="title">Документ</h2>
							</div>


							@foreach($related as $key => $r)
							@if($key < 10)
							<!-- ARTICLE -->
							<article class="article widget-article">
									<div class="article-img-document-list" >
										<i class="fa fa-file" style="font-size: 30px; color:#415576;"></i>
									</div>
								<div class="article-body">
									<h4 class="article-title"><a href="{{ url('article')}}/{{$r->slug }}">{{ $r->title }}</a></h4>

								</div>
							</article>
							<!-- /ARTICLE -->
							@endif
							@endforeach

						</div>
						<!-- /article widget -->


					</div>
					<!-- /Aside Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->

		<!-- AD SECTION -->
		<div class="visible-lg visible-md">
			<img class="center-block" src="./img/ad-3.jpg" alt="">
		</div>
		<!-- /AD SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">

			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->
<script>
	var fbButton = document.getElementById('fb-share-button');
	var url = window.location.url;

	fbButton.addEventListener('click', function() {
		window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
			'facebook-share-dialog',
			'width=800,height=600'
		);
		return false;
	});


</script>
<script>
	var vkButton = document.getElementById('vk-share-button');
	var varUrl = window.location.href;

	vkButton.addEventListener('click', function() {
		window.open('https://vk.com/share.php?url=' + varUrl.split('#')[0],
			'width=800,height=600'
		);
		return false;
	});



</script>
<script>
	var vkButton = document.getElementById('telegram-share-button');
	var varUrl = window.location.href;
	var text = ''
	vkButton.addEventListener('click', function() {
		window.open('https://t.me/share/url?url=' + varUrl.split('#')[0] + '&text=' + text,
		);
		return false;
	});
</script>
<script>
	var vkButton = document.getElementById('whatsapp-share-button');
	var varUrl = window.location.href;
	var text = ''
	vkButton.addEventListener('click', function() {
		window.open('https://api.whatsapp.com/send?text=' + varUrl.split('#')[0],
		);
		return false;
	});
</script>


@stop
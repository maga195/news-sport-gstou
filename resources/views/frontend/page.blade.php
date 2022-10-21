@extends('frontend.master')
@section('title')
<title>{{ $page->title }}</title>
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
							<div class="article-body">
								<h1 class="article-title">{{ $page->title }}</h1>
								<p>{!! $page->description !!}</p>
							</div>
						</article>
						<!-- /ARTICLE POST -->


					</div>
					<!-- /Main Column -->


				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->



		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-12">
						<!-- section title -->
						<div class="section-title">
							<h2 class="title">Новости</h2>
						</div>
						<!-- /section title -->

						<!-- row -->
						<div class="row">
							<!-- Column 1 -->
							@foreach($latest as $key => $l)
								@if($key < 4)
							<div class="col-md-3 col-sm-6">

									<!-- ARTICLE -->
									<article class="article">
										<div class="article-img">
											<a href="{{ url('article')}}/{{$l->slug }}">
												<img src="{{ asset('uploads/posts') }}/{{ $l->image}}" alt="">
											</a>
										</div>
										<div class="article-body">
											<h4 class="article-title"><a href="{{ url('article')}}/{{$l->slug }}">{{ $l->title }}</a></h4>
											<ul class="article-meta">
												<li><i class="fa fa-clock-o"></i>{{ Carbon\Carbon::parse($l->created_at)->diffForHumans() }}</li>
											</ul>
										</div>
									</article>
									<!-- /ARTICLE -->
							</div>
							<!-- /Column 1 -->
							@endif
							@endforeach

						</div>
						<!-- /row -->
					</div>
					<!-- /Main Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->
<script>
	var fbButton = document.getElementById('fb-share-button');
	var url = window.location.href;

	fbButton.addEventListener('click', function() {
		window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
			'facebook-share-dialog',
			'width=800,height=600'
		);
		return false;
	});
	document.getElementById('vk-share-button').innerHTML = VK.Share.button('https://vk.com/js/api/share.js?93', {type: 'link'});
</script>
@stop
@extends('frontend.master')
@section('title')
<title>Главное</title>
@stop
@section('content')


		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->


				<div class="row">
					<!-- Aside Column -->
					<div class="col-md-4">


						<div class="widget">
							<!-- owl carousel 3 -->
							<div id="owl-carousel-4" class="owl-carousel owl-theme center-owl-nav">
								<!-- ARTICLE -->
								@foreach($galleries as $key => $gallery)
								@if($key < 3)
								<article class="article">
									<div class="article-img">
										<a href="{{ url('/multi-gallery') }}">
											<img src="{{ asset('uploads/galleries') }}/{{ $gallery->image }}" alt="">
										</a>

									</div>
								</article>
								@endif
								<!-- /ARTICLE -->
								@endforeach

							</div>
						<!-- /owl carousel 3 -->
						</div>

						@if(count($galleries) > 0)
						<!-- galery widget -->
						<div class="widget galery-widget">
							<div class="widget-title">
								<a href="{{ url('/multi-gallery') }}" ><h2 class="title">Галегея</h2></a>
							</div>
							<ul>
								@foreach($galleries as $key => $gallery)
									@if($key < 8)
										<li><a href="{{ asset('uploads/galleries')}}/{{ $gallery->image }}">
											<img src="{{ asset('uploads/galleries')}}/{{ $gallery->image }}" alt="" style="width:100px !important; height: 70px !important;">
											</a>
										</li>
									@endif
								@endforeach
							</ul>
						</div>
						@endif
						@if(isset($youtube))
						<!-- /galery widget -->
						<!-- <div class="widget galery-widget">
							<div class="widget-title">
								<a href="{{ url($youtube->youtube) }}" ><h2 class="title">{{ $youtube->titleyou }}</h2></a>
							</div>
							<iframe src="https://www.youtube.com/embed/{{ $codeyt }}"
   							width="360" height="240" frameborder="0" allowfullscreen></iframe>
						</div> -->
						@endif
						@if(isset($video))
						<div class="widget galery-widget">
							<div class="widget-title">
								<a href="{{ url('/video') }}" ><h2 class="title">Видео</h2></a>
							</div>
							<div class="widget-title-video">
								<a href="{{ url('screenvideo') }}/{{ $video->slug }}">
									<video controls width="360" height="240" >
										<source src="{{ url('uploads/videos') }}/{{ $video->image }}" type="video/mp4">
									</video>
								</a>
							</div>

						</div>
						@endif


					</div>
					<!-- /Aside Column -->

					<!-- Main Column -->
					<div class="col-md-8">
						<!-- row -->
						<div class="row">
							<!-- section title -->
							<div class="col-md-12">
								<div class="section-title">
									<h2 class="title">Новости</h2>
								</div>
							</div>
							<!-- /section title -->
							@foreach($news as $key => $f)
							@if($key < 4)
							<!-- Column 1 -->
							<div class="col-md-6 col-sm-6">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img-home">
										<a href="{{ url('article') }}/{{ $f->slug }}">
											<img src="{{ asset('uploads/posts') }}/{{ $f->image }}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h3 class="article-title"><a href="{{ url('article') }}/{{ $f->slug }}">{{ $f->title }}</a></h3>

									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /Column 1 -->
							@endif
							@endforeach
						</div>
						<!-- /row -->
						<!-- row -->
						<div class="row">
							@foreach($news as $key => $f)
							@if($key > 4 && $key < 8)
							<!-- Column 1 -->
							<div class="col-md-4 col-sm-4">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img-home-bottom">
										<a href="{{ url('article') }}/{{ $f->slug }}">
											<img src="{{ asset('uploads/posts') }}/{{ $f->image }}" alt="">
										</a>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="{{ url('article') }}/{{ $f->slug }}">{{ $f->title }}</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> {{ Carbon\Carbon::parse($f->created_at)->diffForHumans() }}</li>
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

@stop
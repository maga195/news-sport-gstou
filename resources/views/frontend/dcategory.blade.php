@extends('frontend.master')
@section('title')
<title>{{ $cat->title }}</title>
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
                            <!-- section title -->
						<div class="section-title">
							<h2 class="title">{{ $cat->title }}</h2>
						</div>
						<!-- /section title -->
                        @foreach($documents as $document)
							<!-- ARTICLE -->
							<article class="article row-article">
									<div class="article-img-document">
										<i class="fa fa-file" style="font-size: 50px; color:#415576;"></i>
									</div>
								<div class="article-body">

									<h3 class="article-title"><a href="https://docs.google.com/gview?url={{ url('uploads/documents')}}/{{ $document->image }}">{{ $document->title }}</a></h3>
									<ul class="article-meta" style="text-align: right;">
										<li><i class="fa fa-clock-o">  {{ Carbon\Carbon::parse($document->created_at)->diffForHumans() }}</i> </li>
									</ul>

								</div>

							</article>
							<!-- /ARTICLE -->
                        @endforeach
						<div class="article-pagination">
							{{ $documents->links('partials.view-paginate') }}
						</div>
					</div>
					<!-- /Main Column -->

					<!-- Aside Column -->
					<div class="col-md-4">
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
						<!-- /galery widget -->
						@endif
						@if(isset($youtube))
						<!-- /galery widget -->
						<div class="widget galery-widget">
							<div class="widget-title">
								<a href="{{ url($youtube->youtube) }}"><h2 class="title">{{ $youtube->titleyou }}</h2></a>
							</div>
							<iframe src="https://www.youtube.com/embed/{{ $codeyt }}"
   							width="360" height="240" frameborder="0" allowfullscreen></iframe>
						</div>
						@endif
						@if(isset($video))
						<div class="widget galery-widget">
							<div class="widget-title-video">
								<a href="{{ url('screenvideo') }}/{{ $video->slug }}">
									<video width="360" controls>
										<source src="{{ asset('uploads/videos') }}/{{ $video->image }}" type="video/mp4">
									</video>
								</a>
							</div>

						</div>
						@endif


						<!-- article widget -->
						<div class="widget">
							<div class="section-title">
								<h2 class="title">Новости</h2>
							</div>


							<!-- /owl carousel 3 -->
							@foreach($featured as $key => $f)
							@if($key > 0 && $key < 5)
							<!-- ARTICLE -->
							<article class="article widget-article">
								<div class="article-img">
									<a href="{{ url('article') }}/{{ $f->slug }}">
										<img src="{{ asset('uploads/posts') }}/{{ $f->image }}" alt="">
									</a>
								</div>
								<div class="article-body">
									<h4 class="article-title"><a href="{{ url('article') }}/{{ $f->slug }}">{{ $f->title }}</a></h4>

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


@stop
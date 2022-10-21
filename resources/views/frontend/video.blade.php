@extends('frontend.master')
@section('title')
<title>Видео</title>
@stop
@section('content')

<div class="section">
    <!-- CONTAINER -->
    <div class="container">
        <!-- ROW -->
        <div class="row">
            <!-- Main Column -->
            <div class="col-md-12">
                @if(count($videos) > 0)
					<div class="widget galery-widget-youtube">

						<ul>
							@foreach($videos as $video)
							<li>
								<div class="widget-title-video">
									<a href="{{ url('screenvideo') }}/{{ $video->slug }}"><video width="360" height="240" controls>
									<source src="{{ asset('uploads/videos') }}/{{ $video->image }}" type="video/mp4">
									</video></a>
								</div>

							</li>
							@endforeach
						</ul>
					</div>
                @endif
            </div>
			<div class="article-pagination">
				{{ $videos->links('partials.view-paginate')}}
			</div>
        </div>
    </div>
</div>


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
												<img src="{{ asset('uploads/posts') }}/{{ $l->image}}" alt="" style="height: fit-content !important;">
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
@stop
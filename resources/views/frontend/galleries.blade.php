@extends('frontend.master')
@section('title')
<title>Галерея</title>
@stop
@section('content')

<div class="section">
    <!-- CONTAINER -->
    <div class="container">
        <!-- ROW -->
        <div class="row">
            <!-- Main Column -->
            <div class="col-md-12">
                <div class="cd-full-width">
                    <!-- CONTAINER -->
                    <div class="container-fluid js-tm-page-content " data-page-no="1">
                        <!-- ROW -->
                        <div class="tm-img-gallery-container">
                            <!-- Main Column -->
                            <div class="tm-img-gallery gallery-one ">
                                <!-- Gallery One pop up connected with JS code below -->
                                @foreach($galleries as $gallery)
                                <div class="grid-item ">
                                    <figure class="effect-bubba">
                                        <img src="{{ asset('uploads/galleries' )}}/{{ $gallery->image }}"
                                        alt="Image" class="img-fluid tm-img"
                                        style="width: 250px !important; height: 150px !important;">
                                        <figcaption>
                                            <a href="{{ url('uploads/galleries' )}}/{{ $gallery->image }}" >Посмотреть больше</a>
                                        </figcaption>
                                    </figure>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
				<div class="article-pagination">
					{{ $galleries->links('partials.view-paginate') }}
				</div>
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
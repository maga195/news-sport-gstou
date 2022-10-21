@extends('frontend.master')
@section('title')
<title>Контакт</title>
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
                        @if(Session::has('message'))
                        <div class="col-sm-12">
                            <div class="alert alert-success alert-dissimable fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
                            </div>
                        </div>
                        @endif
						<!-- reply form -->
						<div class="article-reply-form">
							<div class="section-title">
								<h2 class="title">Контакт</h2>
							</div>

							<form method="post" action="{{ url('sendмessage') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="tbl" value="{{ encrypt('messages') }}" />
								<input class="input" name="name" placeholder="Имя" type="text">
								<input class="input" name="email" placeholder="Email" type="email">
								<input class="input" name="phone" placeholder="Ваш номер" type="phone">
								<textarea class="input" name="message" placeholder="Сообщение"></textarea>
								<button class="input-btn">Отправить</button>
							</form>
						</div>
						<!-- /reply form -->


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
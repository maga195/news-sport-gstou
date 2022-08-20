@extends('backend.master')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Видео</h1>
		</div>
		<div class="col-sm-4 cat-form">
			@if(Session::has('message'))
			<div class="alert alert-success alert-dissimable fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
			</div>

			@endif
			<h3>Добавить новое видео</h3>
			<form method="post" action="{{ url('addcategory') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input type="hidden" name="tbl" value="{{ encrypt('videos') }}" />
				<div class="form-group">
					<input type="text" name="title" id="video_title" class="form-control">
				</div>
				<div class="form-group">
					<input type="hidden" name="slug" id="slug-video" class="form-control" readonly="">
				</div>
                <div class="form-group">
                    <input type="file" name="image" class="btn btn-primary"/>
                    @error('image')
                        <div class="alert alert-danger alert-dissimable fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>Изображение должно быть файлом типа: mp4
                        </div>
					@enderror
                </div>

				<div class="form-group">
					<button class="btn btn-primary">Добавить видео</button>
				</div>
			</form>


		</div>

		<div class="col-sm-8 cat-view">
			<form method="post" action="{{ url('multipledelete') }}">
				<div class="row">

					{{ csrf_field() }}
					<input type="hidden" name="tbl" value="{{ encrypt('videos') }}" />
					<input type="hidden" name="tblid" value="{{ encrypt('vid') }}" />

					<div class="col-sm-2">
						<select name="bulk-action" class="form-control">
							<option value="0">Нет</option>
							<option value="1">Да</option>
						</select>
					</div>
					<div class="col-sm-2">
						<button class="btn btn-default">Удалить</button>
					</div>
					<div class="col-sm-3 col-sm-offset-4">
						<a href="{{ url('video') }}" ><h3>Посмотреть</h3></a>
						<input type="text" id="search" class="form-control" placeholder="Поиск...">
					</div>
				</div>


				<div class="content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th width="15%"><input type="checkbox" id="select-all">Название</th>
								<th width="15%">Видео</th>
								<th width="15%">Вид</th>
                                <th width="10%">Дате</th>
							</tr>
						</thead>
						<tbody>
							@if(count($videos) > 0 )
							@foreach($videos as $video)
							<tr>
								<td><input type="checkbox" name="select-data[]" value="{{ $video->vid }}">{{ $video->title }}</td>
								<td>{{ $video->image }}</td>
								<td><a href="{{ url('screenvideo') }}/{{ $video->slug }}">просмотреть</td>
                                <td>{{ $video->created_at }}</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="3">Данные не найдены</td>
							</tr>
							@endif
						</tbody>
					</table>
				</div>
			</form>
			<div class="filter-div">
				<div class="col-sm-12 text-right">
					{{ $videos->links('partials.admin-paginate') }}
				</div>
			</div>
		</div>
	</div>

</div>

@stop
@extends('backend.master')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 title">
			<h1><i class="fa fa-bars"></i> Галерея</h1>
		</div>

		<div class="col-sm-4 cat-form">
			@if(Session::has('message'))
			<div class="alert alert-success alert-dissimable fade in">
				<a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
			</div>

			@endif
			<h3>Добавить новую картинку</h3>
			<form method="post" action="{{ url('addgallery') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<!-- <input type="hidden" name="tbl" value="{{ encrypt('galleries') }}" /> -->
                <!-- <input type="file" name="image[]" multiple="" > -->
				<div class="form-group content featured-image">
                <hr>
                    <p><img id="output" style="max-width: 100%;" /></p>

                    <p><input type="file" name="image[]" id="file" multiple="" onchange="loadFile(event)" style="display: none;"></p>
                    <p><label for="file" style="cursor: pointer;">Загрузить изображение</label></p>
					@error('image')
                        <div class="alert alert-danger alert-dissimable fade in">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>Изображение должно быть файлом типа: jpg, jpeg, png
                        </div>
					@enderror
                </div>

				<div class="form-group">
					<button class="btn btn-primary">Добавить картинку</button>
				</div>
			</form>


		</div>

		<div class="col-sm-8 cat-view">
			<form method="post" action="{{ url('multipledelete') }}">
				<div class="row">

					{{ csrf_field() }}
					<input type="hidden" name="tbl" value="{{ encrypt('galleries') }}" />
					<input type="hidden" name="tblid" value="{{ encrypt('gid') }}" />

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
						<a href="{{ url('multi-gallery') }}" ><h3>Посмотреть</h3></a>
					</div>
				</div>


				<div class="col-sm-12 content">

                        <div class="form-group">
                            <input type="checkbox"  id="select-all">Все удалить
                        </div>

                        <div class="form-group">
                            @if(count($multi_images) > 0)
                                @foreach($multi_images as $multi)
                                    <div class="multi-column">
                                        <input type="checkbox"  name="select-data[]" value="{{ $multi->gid }}">
                                        <img src="{{ asset('uploads/galleries') }}/{{$multi->image}}" style="width: 150px; height: 150px;"/>
                                    </div>
                                @endforeach
                            @else
                            <div class="multi-column">
                                <p colspan="3">Картинки не найдены</p>
                            </div>
                            @endif
                        </div>



				</div>
		</div>
		<div class="filter-div">
            <div class="col-sm-12 text-right">
                {{ $multi_images->links('partials.admin-paginate') }}
            </div>
        </div>
	</div>
</div>
<script>
  var loadFile = function(event) {
    // var countImages = event.target.files.length;
    // for(i = 0; i < countImages; i++){
    //     var image = document.getElementById('output');
    //     image.src = URL.createObjectURL(event.target.files[i]);
    // }
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@stop
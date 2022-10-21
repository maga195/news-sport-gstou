@extends('backend.master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 title">
      <h1><i class="fa fa-bars"></i> Изменить рекламу</h1>
    </div>

    <div class="col-md-12">
      @if(Session::has('message'))
      <div class="alert alert-success alert-dissimable fade in">
        <a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
      </div>

      @endif
    </div>

    <div class="col-sm-12">
      <div class="row">
        <form method="post" action="{{ url('updateadv') }}/{{ $edit->aid }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="tbl" value="{{ encrypt('advertisements') }}" />
          <input type="hidden" name="aid" value="{{ $edit->aid }}" />
        <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="title" value="{{ $edit->title }}" class="form-control" placeholder="Введите название">
            </div>
            <div class="form-group">
              <input type="url" name="url"class="form-control"  value="{{ $edit->url }}">
            </div>




            <div class="form-group content featured-image">
              <h4>Рекламная картинка <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
              <hr>
              @if($edit->image != '')
                <p><img id="output" style="max-width: 100%;" src="{{ asset('uploads/advertisements') }}/{{ $edit->image }}"/></p>
                <p><input type="file" accept="image/*"  name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
                <p><label for="file" style="cursor: pointer;">Изменить изображение</label></p>
                @else
                <p><img id="output" style="max-width: 100%;" /></p>
                <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
                <p><label for="file" style="cursor: pointer;">Загрузить изображение</label></p>
                @endif
            </div>
            <div class="form-group">
                <label>Местонахождение</label>
                <select class="form-control" name="location">
                    <option>{{ $edit->location }}</option>
                    @if($edit->location != 'Таблица-лидеров')
                    <option>Таблица-лидеров</option>
                    @endif
                    @if($edit->location != 'Боковая-панель вверху')
                    <option>Боковая-панель вверху</option>
                    @endif
                    @if($edit->location != 'Боковая-панель внизу')
                    <option>Боковая-панель внизу</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label>Статус</label>
                <select class="form-control" name="status">
                    <option>{{$edit->status}}</option>
                    @if($edit->status == 'Скрыть')
                    <option>Отображение</option>
                    @else
                    <option>Скрыть</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Обновить рекламу</button>
            </div>


        </div>

        </form>
      </div>
    </div>
  </div>
</div>

<script>
  var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@stop
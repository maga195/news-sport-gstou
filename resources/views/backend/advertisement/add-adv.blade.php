@extends('backend.master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 title">
      <h1><i class="fa fa-bars"></i> Добавить рекламу</h1>
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
        <form method="post" action="{{ url('addadv') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="tbl" value="{{ encrypt('advertisements') }}" />
        <div class="col-sm-12">
            <div class="form-group">
              <input type="text" name="title" class="form-control" placeholder="Введите название">
            </div>
            <div class="form-group">
              <input type="url" name="url"class="form-control" >
            </div>




            <div class="form-group content featured-image">
              <h4>Рекламная картинка <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
              <hr>
                <p><img id="output" style="max-width: 100%;" /></p>
                <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
                <p><label for="file" style="cursor: pointer;">Загрузить изображение</label></p>
            </div>
            <div class="form-group">
                <label>Местонахождение</label>
                <select class="form-control" name="location">
                    <option>Таблица-лидеров</option>
                    <option>Боковая-панель вверху</option>
                    <option>Боковая-панель внизу</option>
                </select>
            </div>
            <div class="form-group">
                <label>Статус</label>
                <select class="form-control" name="status">
                    <option>Отображение</option>
                    <option>Скрыть</option>

                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Добавить рекламу</button>
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
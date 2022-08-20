@extends('backend.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Настройка</h1>
            @if(Session::has('message'))
            <div class="alert alert-success alert-dissimable fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
            </div>

            @endif
        </div>

        <div class="col-sm-4 cat-form" >

            @if(is_null($data))
                    @if(is_array($data))

                    <form method="post" action="{{ url('updatesettings') }}/{{ $data->sid }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="tbl" value="{{ encrypt('settings') }}" />
                            <input type="hidden" name="sid" value="{{ $data->sid }}" />
                            <div class="form-group">
                                @error('title')
                                    <div class="alert alert-danger alert-dissimable fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>Поле заголовка обязательно.
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                @error('image')
                                <div class="alert alert-danger alert-dissimable fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>Поле изображения обязательно.
                                </div>
                                @enderror
                                <label>Логотип</label>
                                @if(!empty($data->image))
                                <p><img src="{{ asset('uploads/settings') }}/{{ $data->image }}" id="output" style="width: 300px !important;"/></p>
                                <p><input type="file" accept="image/*" name="image"  id="file" onchange="loadFile(event)" style="display: none;"></p>
                                <p><label for="file" style="cursor: pointer;" class="btn btn-warning">Изменить логотип</label></p>
                                <p><img id="output" /></p>
                                @else
                                <p><input type="file" accept="image/*" name="image"  id="file" onchange="loadFile(event)" style="display: none;"></p>
                                <p><label for="file" style="cursor: pointer;" class="btn btn-warning">Добавить логотип</label></p>
                                <p><img id="output" /></p>
                                @endif

                            </div>
                            <div class="form-group">
                                @error('about')
                                <div class="alert alert-danger alert-dissimable fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>Поле описания обязательно для заполнения.
                                </div>
                                @enderror
                                <label>О нас</label>
                                <textarea name="about" class="form-control" rows="10">{{ $data->about }}</textarea>
                            </div>


                            <div class=<div class="form-group">
                                <button class="btn btn-primary">Обновить настройку</button>
                            </div>
                        </form>


                        @else
                        <form method="post" action="{{ url('addsettings') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="tbl" value="{{ encrypt('settings') }}" />
                            <div class="form-group">
                                @error('title')
                                    <div class="alert alert-danger alert-dissimable fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>Поле заголовка обязательно.
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group">
                                @error('image')
                                <div class="alert alert-danger alert-dissimable fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>Поле изображения обязательно.
                                </div>
                                @enderror
                                <label>Логотип</label>
                                <p><input type="file" accept="image/*" name="image"   id="file" onchange="loadFile(event)" style="display: none;" ></p>
                                <p><label for="file" style="cursor: pointer;" class="btn btn-warning">Добавить логотип</label></p>
                                <p><img id="output" style="width: 300px !important;"/></p>

                            </div>
                            <div class="form-group">
                                @error('about')
                                <div class="alert alert-danger alert-dissimable fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>Поле описания обязательно для заполнения.
                                </div>
                                @enderror
                                <label>О нас</label>
                                <textarea name="about" class="form-control" rows="10" ></textarea>
                            </div>


                            <div class=<div class="form-group">
                                <button class="btn btn-primary">Добавить настройку</button>
                            </div>
                        </form>


                        @endif

                @else

                    <form method="post" action="{{ url('updatesettings') }}/{{ $data->sid }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="tbl" value="{{ encrypt('settings') }}" />
                        <input type="hidden" name="sid" value="{{ $data->sid }}" />
                        <div class="form-group">
                            @error('title')
                                <div class="alert alert-danger alert-dissimable fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>Поле заголовка обязательно.
                                </div>
                            @enderror
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            @error('image')
                            <div class="alert alert-danger alert-dissimable fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>Поле изображения обязательно.
                            </div>
                            @enderror
                            <label>Логотип</label>
                            @if(!empty($data->image))
                            <p><img src="{{ asset('uploads/settings') }}/{{ $data->image }}" id="output" style="width: 300px !important;"/></p>
                            <p><input type="file" accept="image/*" name="image"  id="file" onchange="loadFile(event)" style="display: none;"></p>
                            <p><label for="file" style="cursor: pointer;" class="btn btn-warning">Изменить логотип</label></p>
                            <p><img id="output" /></p>
                            @else
                            <p><input type="file" accept="image/*" name="image"  id="file" onchange="loadFile(event)" style="display: none;"></p>
                            <p><label for="file" style="cursor: pointer;" class="btn btn-warning">Добавить логотип</label></p>
                            <p><img id="output" /></p>
                            @endif

                        </div>
                        <div class="form-group">
                            @error('about')
                            <div class="alert alert-danger alert-dissimable fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>Поле описания обязательно для заполнения.
                            </div>
                            @enderror
                            <label>О нас</label>
                            <textarea name="about" class="form-control" rows="10" >{{ $data->about }}</textarea>
                        </div>


                        <div class=<div class="form-group">
                            <button class="btn btn-primary">Обновить настройку</button>
                        </div>
                    </form>


            @endif
        </div>
        <div class="col-sm-4 cat-form">
            @error('urlsocial')
                <div class="alert alert-danger alert-dissimable fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>Имя уже занято
                </div>
            @enderror
            @if(count($allsocials) < 6)
            <form method="post" action="{{ url('addsocial') }}">
                {{ csrf_field() }}
                <input type="hidden" name="tbl" value="{{ encrypt('socials') }}" />
                <div id="socialFieldGroup">
                    <div class="form-group">
                        <label>Соц сети</label>
                        <input type="url" name="urlsocial" class="form-control socialCountM" required />
                    </div>
                    <p class="text-muted">Например: https://www.youtube.com/c/RuHandTalk/videos</p>
                </div>
                <div class=<div class="form-group">
                    <button class="btn btn-primary">Добавить соц сети</button>
                </div>
            </form>
            @else
            <div class="title">
            <h1><strong>Извини! </strong>Вы достигли лимита социальных полей.</h1>
            </div>
            @endif
        </div>


            <div class="col-sm-8 cat-form">
                <form method="post" action="{{ url('multipledelete') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="tbl" value="{{ encrypt('socials') }}" />
                    <input type="hidden" name="tblid" value="{{ encrypt('uid') }}" />
                    <div class="filter-div">

                    <div class="col-sm-2">
						<select name="bulk-action" class="form-control">
							<option value="0">Нет</option>
							<option value="1">Да</option>
						</select>
					</div>
					<div class="col-sm-2">
						<button class="btn btn-default">Удалить</button>
					</div>


                    </div>

                    <div class="col-sm-12">
                        <div class="content">
                        @if(count($allsocials) > 0)

                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th width="2%"><input type="checkbox" id="select-all"></th>
                                        <th width="15%">Соц сети</th>
                                        <th width="10%">Дате</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($allsocials as $social)
                                        <tr>
                                            <td><input type="checkbox" name="select-data[]" value="{{ $social->uid }}"></td>
                                            <td>{{ $social->urlsocial }}</td>
                                            <td>{{ $social->created_at }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        @else
                        <h1>Соц сети не найден</h1>
                        @endif
                        </div>
                    </div>
                </form>
            </div>




    </div>
</div>
<style>
    .noshow {
        display: none;
    }
</style>
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@stop
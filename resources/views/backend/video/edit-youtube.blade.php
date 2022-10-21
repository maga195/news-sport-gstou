@extends('backend.master')
@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="col-sm-12 title">
                <h1><i class="fa fa-bars"></i> Изменить Ютуб</h1>
            </div>

            <div class="col-sm-4 cat-form">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dissimable fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
                </div>

                @endif
                <h3>Изменить видео из Ютуб</h3>
                <form method="post" action="{{ url('updatecategory') }}/{{ $youtube->yid }}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="tbl" value="{{ encrypt('youtubes') }}" />
                    <input type="hidden" name="yid" value="{{ $youtube->yid }}" />
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" name="titleyou"  class="form-control" value="{{ $youtube->titleyou }}">
                        @error('titleyou')
                            <div class="alert alert-danger alert-dissimable fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>Поле заголовка обязательно.
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                    <input type="url" name="youtube"  class="form-control" value="{{ $youtube->youtube }}">
                        @error('youtube')
                            <div class="alert alert-danger alert-dissimable fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>Обязательно поделитесь
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Обновить ссылку</button>
                    </div>
                </form>


            </div>

            <div class="col-sm-8 cat-view">
                <form method="post" action="{{ url('multipledelete') }}">
                    <div class="row">

                        {{ csrf_field() }}
                        <input type="hidden" name="tbl" value="{{ encrypt('youtubes') }}" />
                        <input type="hidden" name="tblid" value="{{ encrypt('yid') }}" />

                        <div class="col-sm-3">
                            <select name="bulk-action" class="form-control">
                                <option value="0">Действие</option>
                                <option value="1">Переместить в корзину</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-default">Применить</button>
                        </div>
                        <div class="col-sm-3 col-sm-offset-4">
                            <a href="{{ url('youtube') }}" ><h3>Посмотреть</h3></a>
                            <input type="text" id="search" class="form-control" placeholder="Поиск...">
                        </div>
                    </div>


                    <div class="content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"> Название</th>
                                    <th>Видео</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($list))
                                    @foreach($list as $youtube)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="select-data[]" value="{{ $youtube->yid }}">
                                            <a href="{{ url('edityoutube')}}/{{ $youtube->yid }}">{{ $youtube->titleyou }}</a>
                                        </td>
                                        <td>{{ $youtube->youtube }}</td>
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
            </div>
        </div>
</div>
@stop
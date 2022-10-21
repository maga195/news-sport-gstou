@extends('backend.master')
@section('content')
<div class="container-fluid">
    <div class="row">
            <div class="col-sm-12 title">
                <h1><i class="fa fa-bars"></i> Видео из Ютуба</h1>
            </div>


            <div class="col-sm-4 cat-form">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dissimable fade in">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
                </div>

                @endif
                <h3>Поделиться видео из Ютуб</h3>
                <form method="post" action="{{ url('addcategory') }}" >
                    {{ csrf_field() }}
                    <input type="hidden" name="tbl" value="{{ encrypt('youtubes') }}" />
                    <div class="form-group">
                        <label>Название</label>
                        <input type="text" name="titleyou"  class="form-control">
                        @error('titleyou')
                            <div class="alert alert-danger alert-dissimable fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>Поле заголовка обязательно.
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                    <input type="url" name="youtube"  class="form-control">
                        @error('youtube')
                            <div class="alert alert-danger alert-dissimable fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>Обязательно поделитесь
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary">Добавить ссылку</button>
                    </div>
                </form>


            </div>

            <div class="col-sm-8 cat-view">
                <form method="post" action="{{ url('multipledelete') }}">
                    <div class="row">


                        {{ csrf_field() }}
                        <input type="hidden" name="tbl" value="{{ encrypt('youtubes') }}" />
                        <input type="hidden" name="tblid" value="{{ encrypt('yid') }}" />

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
                            <a href="{{ url('youtube') }}" ><h3>Посмотреть</h3></a>
                            <input type="text" id="search" class="form-control" placeholder="Поиск...">
                        </div>
                    </div>


                    <div class="content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="15%"><input type="checkbox" id="select-all"> Название</th>
                                    <th width="15%">Видео</th>
                                    <th width="15%">Вид</th>
                                    <th width="10%">Дате</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($youtubes))
                                    @foreach($youtubes as $youtube)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="select-data[]" value="{{ $youtube->yid }}">
                                            <a href="{{ url('edityoutube')}}/{{ $youtube->yid }}">{{ $youtube->titleyou }}</a>
                                        </td>
                                        <td>{{ $youtube->youtube }}</td>
                                        <td><a href="{{ url($youtube->youtube) }}">просмотреть</td>
                                        <td>{{ $youtube->created_at }}</td>
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
                        {{ $youtubes->links('partials.admin-paginate') }}
                    </div>
                </div>
            </div>
        </div>
</div>
@stop
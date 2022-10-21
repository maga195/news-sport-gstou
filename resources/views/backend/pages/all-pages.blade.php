@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Все страницы <a href="{{ url('add-page') }}" class="btn btn-sm btn-default">Добавить новую страницу</a></h1>
        </div>
        <div class="col-sm-12">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dissimable fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
            </div>

            @endif
        </div>
        <div class="search-div">
            <div class="col-sm-9">
                Все({{ $allPages }}) | Опубликовано ({{$published}})
            </div>

            <div class="col-sm-3">
                <input type="text" id="search" name="search" class="form-control" placeholder="Поиск...">
            </div>
        </div>

        <div class="clearfix"></div>
        <form method="post" action="{{ url('multipledelete') }}">
            {{ csrf_field() }}
            <input type="hidden" name="tbl" value="{{ encrypt('pages') }}" />
            <input type="hidden" name="tblid" value="{{ encrypt('pageid') }}" />
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

                <div class="col-sm-12 text-right">

                </div>
            </div>

            <div class="col-sm-12">
                <div class="content">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th width="50%"><input type="checkbox" id="select-all"> Название</th>

                                <th width="15%">Статус</th>
                                <th width="15%">Вид</th>
                                <th width="10%">Дате</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($pages) > 0)
                            @foreach($pages as $page)
                            <tr>
                                <td>
                                    <input type="checkbox" name="select-data[]" value="{{ $page->pageid }}">
                                    <a href="{{ url('editpage') }}/{{ $page->pageid }}">{{ $page->title }}</a>
                                </td>
                                <td>{{$page->status }}</td>
                                <td><a href="{{ url('page') }}/{{ $page->slug }}">Посмотреть</td>
                                <td>{{ $page->created_at }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td calspan="4">Страница не найденa</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>


@stop
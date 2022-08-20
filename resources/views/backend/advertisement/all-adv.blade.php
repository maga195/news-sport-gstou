@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Все рекламы <a href="{{ url('add-adv') }}" class="btn btn-sm btn-default">Добавить рекламу</a></h1>
        </div>
        <div class="col-sm-12">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dissimable fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
            </div>

            @endif
        </div>



        <form method="post" action="{{ url('multipledelete') }}">
            {{ csrf_field() }}
            <input type="hidden" name="tbl" value="{{ encrypt('advertisements') }}" />
            <input type="hidden" name="tblid" value="{{ encrypt('aid') }}" />
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
                                <th><input type="checkbox" id="select-all"> Название</th>
                                <th>Ссылка</th>
                                <th>Местонахождение</th>
                                <th>Баннер</th>
                                <th>Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($adv) > 0)
                            @foreach($adv as $a)
                            <tr>
                                <td>
                                    <input type="checkbox" name="select-data[]" value="{{ $a->aid }}">
                                    <a href="{{ url('editadv') }}/{{ $a->aid }}">{{ $a->title }}</a>
                                </td>
                                <td>{{ $a->url }}</td>
                                <td>{{ $a->location }}</td>
                                <td><img src="{{ asset('uploads/advertisements') }}/{{ $a->image }}" width="200"/></td>
                                <td>{{$a->status }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td calspan="4">Реклама не найдена</td>
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
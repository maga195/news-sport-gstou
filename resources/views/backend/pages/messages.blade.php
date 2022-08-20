@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Все сообщение </h1>
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
                Все({{ count($messages) }})
            </div>

            <div class="col-sm-3">
                <input type="text" id="search" name="search" class="form-control" placeholder="Поиск...">
            </div>
        </div>

        <div class="clearfix"></div>
        <form method="post" action="{{ url('multipledelete') }}">
            {{ csrf_field() }}
            <input type="hidden" name="tbl" value="{{ encrypt('messages') }}" />
            <input type="hidden" name="tblid" value="{{ encrypt('mid') }}" />
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
                                <th ><input type="checkbox" id="select-all"> Отправитель</th>
                                <th>Email</th>
                                <th>Номер</th>
                                <th>Сообщение</th>
                                <th>Дате</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($messages) > 0)
                            @foreach($messages as $message)
                            <tr>
                                <td>
                                    <input type="checkbox" name="select-data[]" value="{{ $message->mid }}">
                                    {{ $message->name }}
                                </td>
                                <td>{{$message->email }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ mb_substr($message->message, 0, 100, 'UTF-8') }}<a href="#expand{{$message->mid}}" data-toggle="modal">Читать далее &raquo;</a></td>
                                <td>{{ $message->created_at }}</td>
                                <div class="modal" id="expand{{ $message->mid }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <a href="#" class="close" data-dismiss="modal">&times;</a>
                                                <h4 class="modal-title">Отправлено :{{ $message->name }}</h4>
                                            </div>

                                            <div class="modal-body">
                                                {{$message->message }}
                                            </div>
                                            <div class="modal-footer">
                                                <p>Отправлено на: {{ $message->created_at }}</p>
                                                <p>Тел : {{ $message->phone }}</p>
                                                <p>Почта : {{ $message->email }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td calspan="4">Сообщение не найдено</td>
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
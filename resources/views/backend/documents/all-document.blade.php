@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Добавить новый документ <a href="{{ url('add-document') }}" class="btn btn-sm btn-default">Добавить пост</a></h1>
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
                Все({{ $allDocuments }}) | Опубликовано ({{$published}})
            </div>

            <div class="col-sm-3">
                <input type="text" id="search" name="search" class="form-control" placeholder="Поиск...">
            </div>
        </div>

        <div class="clearfix"></div>
        <form method="post" action="{{ url('multipledelete') }}">
            {{ csrf_field() }}
            <input type="hidden" name="tbl" value="{{ encrypt('documents') }}" />
            <input type="hidden" name="tblid" value="{{ encrypt('did') }}" />
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
                    {{ $documents->links('partials.admin-paginate') }}
                </div>
            </div>

            <div class="col-sm-12">
                <div class="content">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th width="50%"><input type="checkbox" id="select-all"> Название</th>
                                <th width="15%">Категория</th>
                                <th width="15%">Статус</th>
                                <th width="15%">Вид</th>
                                <th width="10%">Дата</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($documents) > 0)
                            @foreach($documents as $document)
                            <tr>
                                <td>
                                    <input type="checkbox" name="select-data[]" value="{{ $document->did }}">
                                    <a href="{{ url('editdocument') }}/{{ $document->did }}">{{ $document->title }}</a>
                                </td>
                                <td>{{ $document->category_id }}</td>
                                <td>{{$document->status }}</td>
                                <td><a href="https://docs.google.com/gview?url={{ url('uploads/documents')}}/{{ $document->image }}">Посмотреть</td>
                                <td>{{ $document->created_at }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td calspan="4">Документ не найден</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <div class="clearfix"></div>

        <div class="filter-div">
            <div class="col-sm-12 text-right">
                {{ $documents->links('partials.admin-paginate') }}
            </div>
        </div>
    </div>
</div>


@stop
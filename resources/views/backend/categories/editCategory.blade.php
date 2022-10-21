@extends('backend.master')
@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Редакт категорию</h1>
        </div>

        <div class="col-sm-4 cat-form">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dissimable fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>{{ Session('message') }}
            </div>

            @endif
            <h3>Изменить категорию</h3>
            <form method="post" action="{{ url('updatecategory') }}/{{ $category->cid }}">
                {{ csrf_field() }}
                <input type="hidden" name="tbl" value="{{ encrypt('categories') }}" />
                <input type="hidden" name="cid" value="{{ $category->cid }}" />
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" name="title" id="category_name" class="form-control" value="{{ $category->title }}">
                    <p>Название — это то, как оно отображается на вашем сайте.</p>
                </div>

                <div class="form-group">
                    <input type="hidden" name="slug" id="slug-nav" class="form-control" readonly="" value="{{ $category->slug }}">
                </div>

                <div class="form-group">
                    <labe>Статус</labe>
                    <select class="form-control" name="status">
                        <option>{{$category->status}}</option>
                        @if($category->status === 'Выкл')
                        <option>Вкл</option>
                        @else
                        <option>Выкл</option>
                        @endif

                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Обновить категорию</button>
                </div>
            </form>


        </div>

        <div class="col-sm-8 cat-view">
            <div class="content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"> Название</th>
                            <th>Описание</th>
                            <th>Слизняк</th>
                            <th>Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($data) > 0 )
                        @foreach($data as $category)
                        <tr>
                            <td>
                                <input type="checkbox" name="select-data[]" value="{{ $category->cid }}">
                                <a href="{{ url('/editcategory') }}/{{ $category->cid }}">{{ $category->title }}</a>
                            </td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->status }}</td>
                            <td>0</td>
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
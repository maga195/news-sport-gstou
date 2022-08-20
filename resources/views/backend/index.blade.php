@extends('backend.master')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 title">
      <h1><i class="fa fa-bars"></i> Админ</h1>
    </div>

    <div class="col-sm-12">
      <div class="content">
        <div class="row">
          <div class="col-sm-12">
              <div class="content">
                  <table class="table table-striped" id="myTable">
                      <thead>
                          <tr>
                              <th width="50%"> Название</th>
                              <th>Фото</th>
                              <th width="15%">Категория</th>
                              <th width="15%">Статус</th>
                              <th width="10%">Дате</th>
                          </tr>
                      </thead>
                      <tbody>
                          @if(count($posts) > 0)
                          @foreach($posts as $post)
                          <tr>
                              <td>
                                  <a href="{{ url('editpost') }}/{{ $post->pid }}">{{ $post->title }}</a>
                              </td>
                              <td><img src="{{ asset('uploads/posts') }}/{{ $post->image }}" width="50" /></td>
                              <td>{{ $post->category_id }}</td>
                              <td>{{$post->status }}</td>
                              <td>{{ $post->created_at }}</td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                              <td calspan="4">Посты не найдено</td>
                          </tr>
                          @endif
                      </tbody>
                  </table>
              </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@stop
@extends('backend.master')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 title">
      <h1><i class="fa fa-bars"></i> Добавить страницу</h1>
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
        <form method="post" action="{{ url('addpage') }}" enctype="multipart/form-data" >
          {{ csrf_field() }}
          <input type="hidden" name="tbl" value="{{ encrypt('pages') }}" />
          <div class="col-sm-9">
              @error('title')
                <div class="alert alert-warning alert-dissimable fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>{{ $message }}
                </div>
              @enderror
            <div class="form-group">
              <input type="text" name="title" id="post_title" class="form-control" placeholder="Введите название">
            </div>
            <div class="form-group">
              <input type="hidden" name="slug" id="slug" class="form-control" readonly="">
            </div>
              @error('description')
                <div class="alert alert-warning alert-dissimable fade in">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>{{ $message }}
                </div>
              @enderror
            <div class="form-group">
              <textarea class="form-control" name="description" rows="25"></textarea>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="content publish-box">
              <h4>Публиковать <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
              <hr>
              <div class="form-group">
                <button class="btn btn-default" name="status" value="draft">Cохранить черновик</button>
              </div>
              <div class="row">
                <div class="col-sm-12 main-button">
                  <button class="btn btn-primary pull-right" name="status" value="publish">Публиковать</button>
                </div>
              </div>
            </div>


          </div>
        </form>
      </div>
    </div>
  </div>
</div>




<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script>
  CKEDITOR.replace('description', {
    "language": "ru",
    // "filebrowserBrowseUrl": "ckfinder\/ckfinder.html",
    // "filebrowserImageBrowseUrl": "ckfinder\/ckfinder.html?type=Images",
    // "filebrowserFlashBrowseUrl": "ckfinder\/ckfinder.html?type=Flash",
    // "filebrowserUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Files",
    // "filebrowserImageUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Images",
    // "filebrowserFlashUploadUrl": "ckfinder\/core\/connector\/php\/connector.php?command=QuickUpload&type=Flash"
    "filebrowserBrowseUrl": "{{ asset('ckfinder/ckfinder.html')}}",
    "filebrowserImageBrowseUrl": "{{ url('ckfinder/ckfinder.html?type=Images') }}",
    "filebrowserFlashBrowseUrl": "{{ url('ckfinder/ckfinder.html?type=Flash') }}",
    "filebrowserUploadUrl": "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
    "filebrowserImageUploadUrl": "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
    "filebrowserFlashUploadUrl": "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}"
  });
</script>

@stop
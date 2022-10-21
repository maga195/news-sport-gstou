@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Все посты <a href="{{ url('all-posts') }}" class="btn btn-sm btn-default">Вернуться</a></h1>
        </div>
        <div class="col-sm-10 title">
            <h1><i class="fa fa-bars"></i> Изменить пост</h1>
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
                <form method="post" action="{{ url('updatepost') }}/{{ $post->pid }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="tbl" value="{{ encrypt('posts') }}" />
                    <input type="hidden" name="pid" value="{{ $post->pid }}" />
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input type="text" name="title" id="post_title" value="{{ $post->title }}" class="form-control" placeholder="Введите название">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="slug" id="slug" value="{{ $post->slug }}" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" rows="25" cols="100">{!!$post->description!!}</textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description_short" rows="5" placeholder="Краткое описание">{{ $post->description_short }}</textarea>
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
                                    <a href="{{ url('article') }}/{{ $post->slug }}"><p>Посмотреть</p></a>
                                    <button class="btn btn-primary pull-right" name="status" value="publish">Публиковать</button>
                                </div>
                            </div>
                        </div>

                        <div class="content cat-content">
                            <h4>Категория <span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
                                @error('category_id')
                                <div class="alert alert-warning alert-dissimable fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>{{ $message }}
                                </div>
                                @enderror
                            <hr>
                            @foreach($categories as $cat)
                            <p><label for="{{ $cat->cid }}">
                                    <input type="checkbox" name="category_id[]" value="{{ $cat->cid }}" @if(in_array($cat->cid, $postcat)) checked @endif/>
                                    {{ $cat->title }}</label></p>

                            @endforeach

                        </div>
                        <div class="content featured-image">
                            <h4>Изображениe<span class="pull-right"><i class="fa fa-chevron-down"></i></span></h4>
                            <hr>
                            @if($post->image != '')
                            <p><img id="output" style="max-width: 100%;" src="{{ asset('uploads/posts')}}/{{ $post->image }}" /></p>
                            <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
                            <p><label for="file" style="cursor: pointer;">Изменить изображение</label></p>
                            @else
                            <p><img id="output" style="max-width: 100%;" /></p>
                            <p><input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" style="display: none;"></p>
                            <p><label for="file" style="cursor: pointer;">Установить изображение</label></p>
                            @endif
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
<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@stop
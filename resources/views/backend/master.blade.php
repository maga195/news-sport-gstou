<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ADMIN DASHBOARD | WEBSITE NAME</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminstyle.css') }}">


    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>


</head>

<body>

    <div class="sidebar">
        <ul class="sidebar-menu">
            <li><a href="{{ url('/news-admin') }}" class="dashboard"><i class="fa fa-tachometer"></i> <span>Админ</span></a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bookmark-o"></i> <span>Посты</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/all-posts' ) }}"><i class="fa fa-eye"></i>Все посты</a></li>
                    <li><a href="{{ url('/add-post') }}"><i class="fa fa-plus-circle"></i>Добавить пост</a></li>
                    <li><a href="{{ url('/viewcategory') }}"><i class="fa fa-plus-circle"></i>Категории</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bookmark-o"></i> <span>Документы</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/all-documents' ) }}"><i class="fa fa-eye"></i>Все документы</a></li>
                    <li><a href="{{ url('/add-document') }}"><i class="fa fa-plus-circle"></i>Добавить документ</a></li>
                    <li><a href="{{ url('/viewdcategory') }}"><i class="fa fa-plus-circle"></i>Категории</a></li>
                </ul>
            </li>



            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i> <span>Страница</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('all-pages') }}"><i class="fa fa-eye"></i>Все страницы</a></li>
                    <li><a href="{{ url('add-page') }}"><i class="fa fa-plus-circle"></i>Добавить Страницу</a></li>
                </ul>
            </li> -->

            <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-tag"></i> <span>Реклама</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('all-advs') }}"><i class="fa fa-eye"></i>Рекламное объяв</a></li>
                    <li><a href="{{ url('add-adv') }}"><i class="fa fa-plus-circle"></i>Добавить рекламу</a></li>
                </ul>
            </li> -->
            <li class="treeview">
                <a href="{{ url('galleries') }}">
                    <i class="fa fa-image"></i> <span>Галерея</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

            </li>
            <li class="treeview">
                <a href="{{ url('viewvideo') }}">
                    <i class="fa fa-camera"></i> <span>Видео</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

            </li>
            <!-- <li class="treeview">
                <a href="{{ url('viewyoutube') }}">
                    <i class="fa fa-youtube"></i> <span>Ютуб</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

            </li> -->
            <!-- <li class="treeview">
                <a href="{{ url('messages') }}">
                    <i class="fa fa-gear"></i> <span>Сообщение</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

            </li> -->
            <li class="treeview">
                <a href="{{ url('settings') }}">
                    <i class="fa fa-gear"></i> <span>Настройка</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-address-book"></i> <span>Пользователь</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i>Выйти</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Header -->
    @yield('content')


</body>

</html>
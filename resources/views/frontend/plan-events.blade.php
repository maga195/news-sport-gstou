@extends('frontend.master')
@section('title')
<title>Видео</title>
@stop
@section('content')

<div class="section">
    <!-- CONTAINER -->
    <div class="container">
        <!-- ROW -->
        <div class="row">
            <!-- Main Column -->
            <div class="col-md-12">
            <table class="table table-striped" >
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">№п\п</th>
                                <th class="text-center" width="15%">Мероприятие</th>
                                <th class="text-center" width="10%">Дата начала</th>
                                <th class="text-center" width="10%">Дата завершения</th>
                                <th class="text-center" width="20%">Ожидаемые итоги</th>
                                <th class="text-center" width="10%">Статус</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td  class="text-center" >1</td>
                                <td class="text-center" >Межрегиональная встреча студенческих команд по боксу Западной конференции</td>
                                <td class="text-center" >25.05.2022 г.</td>
                                <td class="text-center" >29.05.2022 г.</td>
                                <td class="text-center" >
                                    20 участников из Чеченской Республики, Республики Ингушетия, Республики Дагестан, Самарской области, Республики Калмыкия, Ростовской области, Краснодарского края, Республики Крым и Севастополя.
                                </td>
                                <td class="text-center" >
                                    <p>состоялось</p>
                                    <img src="{{ asset('uploads/others/34-512.webp') }}" style="width: 30px !important; height: 30px !important;"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" >2</td>
                                <td class="text-center" >Студенческое спортивное информационное агентство «СпортЭкспрессГГНТУ».</td>
                                <td class="text-center" >01.07.2022 г.</td>
                                <td class="text-center" >20.07.2022 г.</td>
                                <td class="text-center" >
                                    сайт проекта – 1; страницы в соцсетях – не менее 3; количество спортивных рубрик – не менее 5; количество информационных заметок, видеороликов, публикаций в СМИ – не менее 3 в месяц.
                                </td>
                                <td class="text-center" >
                                    <p>создано</p>
                                    <img src="{{ asset('uploads/others/34-512.webp') }}" style="width: 30px !important; height: 30px !important;"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" >3</td>
                                <td class="text-center" >Турнир по настольному теннису</td>
                                <td class="text-center" >05.09.2022 г.</td>
                                <td class="text-center" >07.09.2022 г.</td>
                                <td class="text-center" >
                                        количество регионов, которые представлены на турнире - не менее 3 регионов; количество участников турнира – не менее 30 участников
                                </td>
                                <td class="text-center" >
                                    <p>ожидается</p>
                                    <img src="{{ asset('uploads/others/waiting-icon.jpg') }}" style="width: 30px !important; height: 30px !important;"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td class="text-center">Турнир по гиревому спорту</td>
                                <td class="text-center">26.09.2022 г.</td>
                                <td class="text-center">28.09.2022 г.</td>
                                <td class="text-center">
                                    количество команд участников турнира – не менее 5 команд.
                                </td>
                                <td class="text-center">
                                    <p>ожидается</p>
                                    <img src="{{ asset('uploads/others/waiting-icon.jpg') }}" style="width: 30px !important; height: 30px !important;"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td class="text-center">Межрегиональный турнир по шахматам среди студенческих клубов.</td>
                                <td class="text-center">26.10.2022 г.</td>
                                <td class="text-center">28.10.2022 г.</td>
                                <td class="text-center">
                                количество регионов, которые представлены на турнире - не менее 3 регионов; количество участников турнира – не менее 50 участников.
                                </td>
                                <td class="text-center" >
                                    <p>ожидается</p>
                                    <img src="{{ asset('uploads/others/waiting-icon.jpg') }}" style="width: 30px !important; height: 30px !important;"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td class="text-center">Турнир по шашкам среди студентов с ограниченными возможностями здоровья и инвалидов</td>
                                <td class="text-center">01.11.2022 г.</td>
                                <td class="text-center">03.11.2022 г.</td>
                                <td class="text-center">
                                    количество регионов, которые представлены на турнире - не менее 3 регионов; количество участников турнира – не менее 20 участников
                                </td>
                                <td class="text-center">
                                    <p>ожидается</p>
                                    <img src="{{ asset('uploads/others/waiting-icon.jpg') }}" style="width: 30px !important; height: 30px !important;"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td class="text-center">Республиканский фестиваль ГТО</td>
                                <td class="text-center">21.11.2022 г.</td>
                                <td class="text-center">25.11.2022 г.</td>
                                <td class="text-center">
                                    количество участников фестиваля – не менее 500 участников, доля студентов, сдавших нормативы ГТО – не менее 70 %.
                                </td>
                                <td class="text-center">
                                    <p>ожидается</p>
                                    <img src="{{ asset('uploads/others/waiting-icon.jpg') }}" style="width: 30px !important; height: 30px !important;"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@stop
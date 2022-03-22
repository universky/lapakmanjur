@php

$user = Auth::user();

if($user != null){
$group = Auth::user()->group_id;
}

@endphp
<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
            <div class="nav-wrapper">
                <ul class="left">
                    <li>
                        <h1 class="logo-wrapper"><a class="brand-logo darken-1" style="width: 300px;" href="/homepage"><img src="{{ asset('assets/images/logo/lapakmanjur.png') }}" alt="materialize logo"><span class="logo-text hide-on-med-and-down">LapakManjur</span></a></h1>
                    </li>
                </ul>
                <ul class="navbar-list right">
                    <?php if ($user == null) { ?>
                        <li><a class="waves-effect waves-block waves-light profile-button" href="/lpk/daftar">&ensp;Daftar LPK</a></li>
                        <li><a class="waves-effect waves-block waves-light profile-button" href="/register">&ensp;Daftar</a></li>
                        <li><a class="waves-effect waves-block waves-light profile-button" href="/login">&ensp;Masuk</a></li>
                    <?php } else { ?>
                        <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
                        <?php if ($jumlah_notif == 0) { ?>
                            <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none</i></a></li>
                        <?php } else { ?>
                            <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge orange accent-3">{{$jumlah_notif}}</small></i></a></li>
                        <?php } ?>
                        <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown">&ensp;Selamat Datang, {{ auth()->user()->name }}!</a></li>
                    <?php } ?>
                </ul>

                <!-- notifications-dropdown-->

                <?php if ($user != null) { ?>
                    <ul class="dropdown-content" id="notifications-dropdown">
                        <li>
                            <h6>NOTIFICATIONS<span class="new badge">{{$jumlah_notif}}</span></h6>
                        </li>
                        <li class="divider"></li>
                        <?php if ($jumlah_notif == 0) { ?>
                            <li style="height: 60px;">
                                <a class="black-text" href="#!">Tidak ada pemberitahuan terbaru.</a>
                            </li>
                        <?php } else { ?>

                            <?php if ($user->group_id == 1) { ?>
                                <li>
                                    <a class="black-text" href="/notif_ak1"><span class="new badge blue">{{$notif_ak1}}</span>Pengajuan AK-1 </a>
                                </li>
                                <li>
                                    <a class="black-text" href="/notif_rekom"><span class="new badge blue">{{$notif_rekom}}</span>Pengajuan Rekom Passport </a>
                                </li>
                                <li>
                                    <a class="black-text" href="/notification/update/"><span class="new badge blue">{{$notif_lamaran}}</span>Lamaran Kerja </a>
                                </li>
                                <li>
                                    <a class="black-text" href="/notification/update/"><span class="new badge blue">{{$notif_pelatihan}}</span>Pengajuan Pelatihan </a>
                                </li>
                            <?php } else { ?>

                                <?php foreach ($notifications as $notif) { ?>
                                    <li>
                                        <?php if ($notif->icon == 'report') { ?>
                                            <?php if ($notif->notif_type == "AK1") { ?>
                                                <a class="black-text" href="/notification/{{ $notif->id }}"><span class="material-icons icon-bg-circle red small">{{$notif->icon}}</span>{{$notif->title}}</a>
                                            <?php } else if ($notif->notif_type == "Rekom Passport") { ?>
                                                <a class="black-text" href="/notification"><span class="material-icons icon-bg-circle red small">{{$notif->icon}}</span>{{$notif->title}}</a>
                                            <?php } ?>
                                        <?php } else if ($notif->icon == "info") { ?>
                                            <?php if ($notif->notif_type == "AK1") { ?>
                                                <a class="black-text" href="/notification/{{ $notif->id }}"><span class="material-icons icon-bg-circle green small">{{$notif->icon}}</span>{{$notif->title}}</a>
                                            <?php } else if ($notif->notif_type == "Rekom Passport") { ?>
                                                <a class="black-text" href="/notification"><span class="material-icons icon-bg-circle green small">{{$notif->icon}}</span>{{$notif->title}}</a>
                                            <?php } ?>
                                        <?php } ?>
                                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">{{$notif->message}}</time>
                                    </li>
                                <?php } ?>

                            <?php } ?>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <!-- profile-dropdown-->

                <?php if ($user != null) { ?>
                    <ul class="dropdown-content" id="profile-dropdown">
                        <?php if ($group == 1) { ?>
                            <li><a class="grey-text text-darken-1" href="/user"><i class="material-icons">settings</i>User</a></li>
                        <?php } else { ?>
                            <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
                        <?php } ?>
                        <li class="divider"></li>
                        <li><a class="grey-text text-darken-1" href="/logout"><i class="material-icons">keyboard_tab</i> Logout</a></li>
                    </ul>
                <?php } ?>
            </div>
            <nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form id="navbarForm">
                        <div class="input-field search-input-sm">
                            <input class="search-box-sm" type="search" required="" id="search" placeholder="Search" data-search="template-list">
                            <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                            <ul class="search-list collection search-list-sm display-none"></ul>
                        </div>
                    </form>
                </div>
            </nav>
        </nav>
    </div>
</header>
<!-- END: Header-->
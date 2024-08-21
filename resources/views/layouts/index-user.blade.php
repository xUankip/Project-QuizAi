{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>Laravel</title>--}}
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">--}}
{{--    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">--}}
{{--    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">--}}
{{--    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">--}}
{{--    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">--}}
{{--    <link rel="stylesheet" href="/dist/css/adminlte.min.css">--}}
{{--    <link rel="stylesheet" href="/dist/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="/dist/css/style.css">--}}
{{--    <link rel="stylesheet" href="/dist/css/reponsive.css">--}}
{{--    <link rel="stylesheet" href="/dist/css/mode.css">--}}
{{--    <link rel="stylesheet" href="/dist/css/course.css">--}}
{{--    <link rel="stylesheet" href="/dist/css/login.css">--}}
{{--</head>--}}
{{--<div id="main">--}}
{{--    <div id="header">--}}
{{--        <ul class="nav-pc" id="nav">--}}
{{--            <li><a id="heading-logo" style="font-size: 20px;" href={{route('homeUser')}}>Quiz<span>AI</span></a>--}}
{{--            </li>--}}
{{--            <li><a href=" #about">Giới thiệu</a></li>--}}
{{--            <li>--}}
{{--                <a>Chủ đề--}}
{{--                    <i class="nav-arrow-down ti-angle-down"></i>--}}
{{--                </a>--}}
{{--                <ul class="subnav">--}}
{{--                    <li><a href={{route('topic')}}>Tất cả</a></li>--}}
{{--                    <li><a href={{route('topic')}}>Toán</a></li>--}}
{{--                    <li><a href={{route('topic')}}>Lý</a></li>--}}
{{--                    <li><a href={{route('topic')}}>Hóa</a></li>--}}
{{--                    <li><a href={{route('topic')}}>Anh</a></li>--}}
{{--                    <li><a href={{route('topic')}}>Sử</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li><a href="#contact">Liên hệ</a></li>--}}
{{--            <li><a href="#contribute">Góp ý</a></li>--}}
{{--            <li><a id="reload1" href="#qna">Hỏi đáp</a></li>--}}
{{--            <li ng-if="Student != null">--}}
{{--                <a>Chào,{{old('name',$users->name)}}--}}
{{--                    <i class="nav-arrow-down ti-angle-down"></i>--}}
{{--                </a>--}}
{{--                <ul class="subnav subnav-user">--}}
{{--                    <li><a href={{route('update')}}>Chỉnh sửa thông tin</a></li>--}}
{{--                    <li><a ng-if="Student.role == 1" href="#manager">Quản lí tài khoản</a></li>--}}
{{--                    <li><a href={{route('updatePassword')}}>Đổi mật khẩu</a></li>--}}
{{--                    <li><a href="{{route('home')}}">Đăng xuất</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <div style="margin-right: 0px;" class="search-btn mode">--}}
{{--            <i onclick="changesIcon(this)" class="bx bx-sun bx-moon sun-moon"></i>--}}
{{--        </div>--}}
{{--        <div class="search-btn" data-toggle="modal" data-target="#myModal" id="search">--}}
{{--            <i class="search-icon ti-search"> </i>--}}
{{--        </div>--}}
{{--        <div id="mobile-menu" class="mobile-menu-btn">--}}
{{--            <button id="menu-i" class="hamburger">--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <div class="mobile-menu-btn mode">--}}
{{--            <i onclick="changesIcon(this)" class="bx bx-sun bx-moon sun-moon"></i>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--</html>--}}

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('layout-css/mygame.css') }}">
    <link rel="stylesheet" href="{{ asset('layout-css/generate.css') }}">
    <title>Demo Admin Page-QuizAI</title>
</head>

<body>
<div class="container">
    <!-- Sidebar Section -->
    <aside>
        <div class="toggle">
            <div class="logo">
                <img src="{{asset('images/img3.png')}}">
                <h2>Quiz<span class="danger">AI</span></h2>
            </div>
            <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
            </div>
        </div>

        <div class="sidebar">
            <a href="{{route('homeUser')}}">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                <h3>Home</h3>
            </a>
            <a href="{{route('topic')}}" >
                    <span class="material-icons-sharp">
                        sports_esports
                    </span>
                <h3>My Games</h3>
            </a>
            <a href="{{route('showForm')}}">
                    <span class="material-icons-sharp">
                        add
                    </span>
                <h3>Create</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        search
                    </span>
                <h3>Search</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                <h3>Reports</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                <h3>Settings</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                <h3>Logout</h3>
            </a>
        </div>
    </aside>
    <!-- End of Sidebar Section -->
    @yield('content') <!-- Dùng để chèn nội dung từ file con -->
    <!-- Right Section -->
    <div class="right-section">
        <div class="nav">
            <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
            </button>

            <div class="profile">
                <div class="info">
                    <p>Hey, <b>{{old('name', $users->name ?? 'Guest')}}</b></p>
                    <small class="text-muted">User</small>
                </div>
                <div class="profile-photo">
                    <img src="/images/img6.png">
                </div>
            </div>

        </div>
        <!-- End of Nav -->
    </div>
    <!-- End Right Section -->
</div>
<script src="{{ asset('js/detail.js') }}"></script>
</body>
</html>

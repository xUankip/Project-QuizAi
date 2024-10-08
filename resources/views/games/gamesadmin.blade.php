<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('layout-css/gamesadmin.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Sidebar Section -->
    <aside>
        <div class="toggle">
            <div class="logo">
                <h2>Quiz<span class="danger">AI</span></h2>
            </div>
            <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
            </div>
        </div>

        <div class="sidebar">
            <a href="#">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                <h3>Home</h3>
            </a>
            <a href="#">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                <h3>Users</h3>
            </a>
            <a href="#" class="active">
                    <span class="material-icons-sharp">
                        sports_esports
                    </span>
                <h3>Games</h3>
            </a>
            <a href="#">G
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
                        add
                    </span>
                <h3>New Login</h3>
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


    {{--CONTENT--}}
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>>Quản lý Người Dùng</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="/images/img9.png" alt="">
            </div>
{{--            <div class="export__file">--}}
{{--                <label for="export-file" class="export__file-btn" title="Export File"></label>--}}
{{--                <input type="checkbox" id="export-file">--}}
{{--                <div class="export__file-options">--}}
{{--                    <label>Export As &nbsp; &#10140;</label>--}}
{{--                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>--}}
{{--                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>--}}
{{--                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>--}}
{{--                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>--}}
{{--                </div>--}}
{{--            </div>--}}
        </section>
        <section class="table__body">
            <table>
                <thead>
                <tr>
                    <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Tên <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Tên người dùng <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Trạng thái <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Hành động <span class="icon-arrow"></span></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status ? 'Kích hoạt' : 'Khóa' }}</td>
                        <td>
                            <!-- Form toggle trạng thái người dùng -->
                            <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit">{{ $user->status ? 'Khóa' : 'Mở khóa' }}</button>
                            </form>

                            <!-- Form xóa người dùng -->
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('POST')
                                <button type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </section>
        <div class="pagination">
            @include('layouts.default', ['paginator' => $users])
        </div>

        <section class="table__header">
            <h1>>Quản lý Games</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="/images/img9.png" alt="">
            </div>
{{--            <div class="export__file">--}}
{{--                <label for="export-file" class="export__file-btn" title="Export File"></label>--}}
{{--                <input type="checkbox" id="export-file">--}}
{{--                <div class="export__file-options">--}}
{{--                    <label>Export As &nbsp; &#10140;</label>--}}
{{--                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>--}}
{{--                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>--}}
{{--                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>--}}
{{--                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>--}}
{{--                </div>--}}
{{--            </div>--}}
        </section>
        <section class="table__body">
            <table>
                <thead>
                <tr>
                    <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Tên game<span class="icon-arrow">&UpArrow;</span></th>
                    <th> Mô tả <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Hành động <span class="icon-arrow">&UpArrow;</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->description }}</td>
                        <td>
                            <form action="{{ route('admin.games.delete', $game->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </section>
        <div class="pagination">
            @include('layouts.default', ['paginator' => $users])
        </div>


        <section class="table_header">
            <h1>Báo Cáo Tổng Quan</h1>
            <p>Số lượng người dùng: {{ $overview['users_count'] }}</p>
            <p>Số lượng game: {{ $overview['games_count'] }}</p>
            <p>Số lượng câu hỏi: {{ $overview['questions_count'] }}</p>
        </section>

    </main>
    {{--END CONTENT--}}


    {{--    RIGHT SECTION--}}
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
                    <p>Hey, <b>Tuan Anh</b></p>
                </div>
                <div class="profile-photo">
                    <img src="/images/avt.jpg">
                </div>
            </div>

        </div>
        <!-- End of Nav -->
    </div>

</div>
{{--    END RIGHT SECTION--}}

<script src="{{ asset('js/detail.js') }}"></script>
</body>
</html>

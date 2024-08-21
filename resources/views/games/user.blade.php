<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('layout-css/user.css') }}">
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


    {{--CONTENT--}}
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>All Users</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="/images/img9.png" alt="">
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file">
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                    <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                    <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                <tr>
                    <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                    <th> User Name <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Gmail <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Phone <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                    <th> Action <span class="icon-arrow"></span></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td> 1 </td>
                    <td> <img src="images/Zinzu Chan Lee.jpg" alt="">Zinzu Chan Lee</td>
                    <td> Seoul </td>
                    <td> 17 Dec, 2022 </td>
                    <td>
                        <p class="status delivered">Delivered</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 2 </td>
                    <td><img src="images/Jeet Saru.png" alt=""> Jeet Saru </td>
                    <td> Kathmandu </td>
                    <td> 27 Aug, 2023 </td>
                    <td>
                        <p class="status cancelled">Cancelled</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 3</td>
                    <td><img src="images/Sonal Gharti.jpg" alt=""> Sonal Gharti </td>
                    <td> Tokyo </td>
                    <td> 14 Mar, 2023 </td>
                    <td>
                        <p class="status shipped">Shipped</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 4</td>
                    <td><img src="images/Alson GC.jpg" alt=""> Alson GC </td>
                    <td> New Delhi </td>
                    <td> 25 May, 2023 </td>
                    <td>
                        <p class="status delivered">Delivered</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 5</td>
                    <td><img src="images/Sarita Limbu.jpg" alt=""> Sarita Limbu </td>
                    <td> Paris </td>
                    <td> 23 Apr, 2023 </td>
                    <td>
                        <p class="status pending">Pending</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 6</td>
                    <td><img src="images/Alex Gonley.jpg" alt=""> Alex Gonley </td>
                    <td> London </td>
                    <td> 23 Apr, 2023 </td>
                    <td>
                        <p class="status cancelled">Cancelled</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 7</td>
                    <td><img src="images/Alson GC.jpg" alt=""> Jeet Saru </td>
                    <td> New York </td>
                    <td> 20 May, 2023 </td>
                    <td>
                        <p class="status delivered">Delivered</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 8</td>
                    <td><img src="images/Sarita Limbu.jpg" alt=""> Aayat Ali Khan </td>
                    <td> Islamabad </td>
                    <td> 30 Feb, 2023 </td>
                    <td>
                        <p class="status pending">Pending</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 9</td>
                    <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                    <td> Dhaka </td>
                    <td> 22 Dec, 2023 </td>
                    <td>
                        <p class="status cancelled">Cancelled</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 9</td>
                    <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                    <td> Dhaka </td>
                    <td> 22 Dec, 2023 </td>
                    <td>
                        <p class="status cancelled">Cancelled</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 9</td>
                    <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                    <td> Dhaka </td>
                    <td> 22 Dec, 2023 </td>
                    <td>
                        <p class="status cancelled">Cancelled</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 9</td>
                    <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                    <td> Dhaka </td>
                    <td> 22 Dec, 2023 </td>
                    <td>
                        <p class="status cancelled">Cancelled</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td> 9</td>
                    <td><img src="images/Alex Gonley.jpg" alt=""> Alson GC </td>
                    <td> Dhaka </td>
                    <td> 22 Dec, 2023 </td>
                    <td>
                        <p class="status cancelled">Cancelled</p>
                    </td>
                    <td>
                        <button type="submit">Edit</button>
                        <button type="delete">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
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
                    <img src="/images/img6.png">
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

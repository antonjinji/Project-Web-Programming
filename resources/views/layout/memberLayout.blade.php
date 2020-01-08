<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>@yield('title')</title>

        <style>
            html, body{
                height: 100%;
                margin: 0;
                padding: 0;
            }

            .text-size{
                font-size: 14px;
                margin: 0;
            }

            .header-text{
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                margin-bottom: 10px;
            }

            .form-control-feedback{
                position: absolute;
                line-height: 38px;
                color: #aaa;
                width: 40px;
                text-align: center;
            }

            .logoMenu{
                display: flex;
            }

            .fontFamily{
                font-family: 'Times New Roman', Times, serif;
            }

            .profile_picture{
                width: 55px;
                height: 50px;
            }

            .display{
                display: flex;
                margin-bottom: 10px;
            }

            .display_block{
                display: block;
                margin-right: 10px;
            }

            .username{
                margin: 0 0 0 10px;
                color: red;
            }

            .time{
                margin: 0 0 0 10px;
            }

            .button{
                font-size: 14px;
            }
            
            .content{
                min-height: 78%;
                padding: 0 0;
            }

            .footer{
                width: 100%;
                bottom: 0;
                position: relative;
            }

            .title{
                font-family: Arial, Helvetica, sans-serif;
            }

            .profile_picture_user{
                height: 110px;
                width: 125px;
            }

            .page-item.active .page-link {
                z-index: 3;
                color: #fff;
                background-color: #dc3545;
                border-color: #dc3545;
            }

            .pagination {
                display: -ms-flexbox;
                display: flex;
                padding-left: 0;
                list-style: none;
                border-radius: .25rem;
                justify-content: center;
            }
            
            .pagination a {
                color: #343a40;
                text-decoration: none;
                background-color: transparent;
            }

            .page-link:hover {
                z-index: 2;
                color: #dc3545;
                text-decoration: none;
                background-color: #e9ecef;
                border-color: #dee2e6;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div>
                    <div class="logoMenu">
                        <a class="navbar-brand text-danger" href="/homePage">Bjora</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/homePage/myQuestion">My Question</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="/homePage/inbox">Inbox</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p class="text-white text-size" >
                        @php
                            $dt = new DateTime();
                            $d = \Carbon\Carbon::now('Asia/Jakarta');
                            echo $d
                        @endphp
                    </p>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="navbar-text text-white"><button type="submit" class="btn btn-danger"><a style="text-decoration: none" href="/homePage/addQuestion">Add Question</a></button></li>
                        <li class="navbar-text text-white"><a href="/homePage/profile/{{ Auth::user()->id }}" class="btn">Profile</a></li>
                        <li class="navbar-text text-white"><a href="{{ url('/logout')}}" class="btn">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5 bg-white content">
            @yield('content')
        </main>

        <footer class="page-footer bg-dark footer">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-4 text-white">© 2019 Copyright
                <a href="{{ url('/homePage') }}" class="text-danger"> Bjora.com</a>
            </div>
            <!-- Copyright -->
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    </body>
</html>

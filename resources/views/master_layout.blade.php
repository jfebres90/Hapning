<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href= " ">Hapning</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">


                <li><a href= {{action( 'eventsPageController@index')}} >Explore</a></li>
                <li><a href=  {{action( 'HomeController@index')}} >Connect</a></li>
                <li><a href=  {{action( 'HomeController@index')}} >My Events</a></li>
                <li><a href=  {{action( 'StaticPagesController@about')}} >About Us</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url('register')}} "><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="{{url('login')}} "><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
@yield('content')

</div>
</body>
</html>
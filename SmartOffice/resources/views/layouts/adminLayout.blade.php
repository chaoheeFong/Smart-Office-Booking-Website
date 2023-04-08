<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/sass/admin.scss')
    @vite('resources/js/app.js')
    <title>@yield('title')</title>
</head>

<body>
    
    <div class="flex flex-column flex-md-row  align-items-center p-3 px-md-4 mb-3 border-bottom-1 box-shadow justify-content-between">
        <h1 class="my-0 mr-md-auto font-weight-normal">SMART OFFICE BOOKING</h1>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 " href="/home">Home</a>
            <a class="p-2 " href="/logout">Log Out</a>
        </nav>
    </div>

    @yield('main_content')


    <script src='https://releases.jquery.com/git/jquery-3.x-git.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js'></script>

    <script id="rendered-js" >
        $(function () {
          $('#datepicker1').datepicker();
          $('#datepicker2').datepicker();
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Doctor Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

   <style>
    .myNavbarMenu{
        padding: 15px;
    }
   </style>
</head>



<body>
    <div class="container-fluid">


        <nav>
            <div class="myNavbar">
                
                    <div class="d-flex bd-highlight menu bg-dark text-light myNavbarMenu">
                        <div class="p-2 flex-grow-1 bd-highlight ms-5 text-info">Doctor Appointment</div>
                        <div class="p-2 bd-highlight"><a href="{{route("homePage")}}" class="text-decoration-none text-light">Home</a></div>
                        <div class="p-2 bd-highlight"><a href="{{route("doctorPage")}}" class="text-decoration-none text-light">Doctor</a></div>
                        <div class="p-2 bd-highlight"><a href="{{route("appointmentPage")}}" class="text-decoration-none text-light me-5">Appointment</a></div>
                    </div>
                
            </div>
        </nav>



        @yield("content")







    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    @yield('javaScriptSection')
</body>

</html>

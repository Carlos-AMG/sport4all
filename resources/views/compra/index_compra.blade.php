<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{url('public\startbootstrap-shop-homepage-gh-pages\assets\favicon.ico')}}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{url('public\startbootstrap-shop-homepage-gh-pages\css\styles.css')}}" rel="stylesheet" /> --}}
    <title>Productos</title>
    <style>
        /* Add some styles for the fading effect */
        .fade {
            animation: fadeOut 5s ease-in-out forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; }
        }
    </style>

</head>
<body>
    <x-nav_bar/>
    <div class="container px-4 px-lg-5 mt-5">
        @if(Session::has('success'))
                <div class="alert alert-success fade">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger fade">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif


    </div>
    
</body>
</html>
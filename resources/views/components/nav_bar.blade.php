<div class="nav-bar">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{url('public\startbootstrap-shop-homepage-gh-pages\assets\favicon.ico')}}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{url('public\startbootstrap-shop-homepage-gh-pages\css\styles.css')}}" rel="stylesheet" />

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('assets/sport4AllLogo.png')}}" alt="Logo" height="40" width="40" class="mr-2"> 
            </a>
            <a class="navbar-brand" href="{{url('/')}}">Sport4All</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/informacion">Inicio</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#!">Acerca de nosotros</a></li> --}}
                    @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (auth()->user()->role != 'user')
                                <li><a class="dropdown-item" href="{{route('producto.index')}}">Productos</a></li>    
                            @else
                                <li><a class="dropdown-item" href="/dashboard">Productos</a></li>    
                            @endif
                            
                                @if (auth()->user()->role != 'user')
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="{{route('producto.create')}}">Add Product</a></li>
                                    <li><a class="dropdown-item" href="/deletedProducts">Deleted Products</a></li>
                                    <li><a class="dropdown-item" href="/allProducts">All Products</a></li>
                                @endif      
                        </ul>
                    </li>
                    @endif
                    @if (Auth::check())
                        @if (auth()->user()->role == 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Departament</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('departamento.index')}}">All Departaments</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="{{route('departamento.create')}}">Add Departament</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Marcas</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('departamento.index')}}">Mostrar Marcas</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="{{route('departamento.create')}}">Agregar Marcas</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Employees</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{route('empleado.index')}}">All Employees</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="{{route('empleado.create')}}">Add Employee</a></li>
                                </ul>
                            </li>
                            
                        @endif
                    @endif
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="/aboutUs">About us</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="/contactUs">Contact us</a></li>
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item">{{auth()->user()->name}}</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <!-- <li><a  class="dropdown-item" aria-current="page" href="/profile">Profile</a></li> -->
                                <li><a class="dropdown-item" aria-current="page" href="{{ route('showProfile') }}">Profile</a></li>
                                @if (auth()->user()->role == 'user')
                                <li><a class="dropdown-item" aria-current="page" href="{{ route('factura') }}">Facturas</a></li>
                                @endif
                                <li>
                                    <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Log Out</button>
                                    </form>
                                    <script>
                                        document.getElementById('logoutForm').addEventListener('submit', function() {
                                        });
                                    </script>
                                </li>
                            </ul>
                        </li>
                    @endif
                    
                </ul>
                @guest
                    <a href="http://127.0.0.1:8000/login" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                    <a href="http://127.0.0.1:8000/register" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @else                    
                    
                    @if(auth()->user()->role == 'user')
                        <form class="d-flex" action='/cart'>
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                                Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">{{$cantItems}}</span>
                        </button>
                    @endif
                    
                </form>

                @endguest
                
            </div>
        </div>
    </nav>
</div>
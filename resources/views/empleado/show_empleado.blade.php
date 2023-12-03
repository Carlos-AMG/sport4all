<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
    <title>Show Empleado</title>
</head>
<body>
    <x-nav_bar/>

    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                      <img src={{asset($empleado->profile_photo_path)}} alt="img-avatar" />
                    {{-- <button type="button" class="boton-avatar">
                        <i class="far fa-image"></i>
                    </button> --}}
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo">{{$empleado->name}}</h3>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-briefcase"></i> Id: {{$empleado->id}}</li>
                    <li><i class="icono fas fa-phone-alt"></i> Correo: {{$empleado->email}}</li>
                </ul>
                <ul class="lista-datos">                
                    <li><i class="icono fas fa-briefcase"></i> Departamento: {{$empleado->departamento->nombre}}</li>
                    <li><i class="icono fas fa-briefcase"></i> RFC: {{$empleado->rfc}}</li>
                    {{-- <li><i class="icono fas fa-map-marker-alt"></i> Estatura: {item.Estatura}</li>
                    <li><i class="icono fas fa-calendar-alt"></i> Edad: {item.Edad} </li>
                    <li><i class="icono fas fa-user-check"></i> Peso: {item.Peso} </li>
                    <li><i class="icono fas fa-share-alt"></i> IMC: {item.IMC}</li> --}}
                </ul>
                    <div class="text-center" style="margin-left: 230px"><a class="btn btn-outline-dark mt-auto" href="{{url('empleado/'.$empleado->id.'/edit')}}">Editar</a></div>
                    <div class="text-center">
                        <form action="{{url('empleado/'.$empleado->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-outline-dark mt-auto">Eliminar</button>
                        </form>
                    </div>
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url('empleado/')}}">Regresar</a></div>
                
            </div>
    
            {{-- <div class="redes-sociales">
                <a href="#" class="boton-redes facebook fab fa-facebook-f"><i class="icon-facebook"></i></a>
                <a href="#" class="boton-redes twitter fab fa-twitter"><i class="icon-twitter"></i></a>
                <a href="" class="boton-redes instagram fab fa-instagram"><i class="icon-instagram"></i></a>
            </div>  --}}
    
           
        </div>
        <br/>
        <br/>
    </section>
</body>
</html>



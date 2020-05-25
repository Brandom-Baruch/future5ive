@extends('layouts.admin')

@section('body-class','signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/montanaa.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">

                    <form class="form" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}
                        <div  class="header header-primary text-center" style="opacity: 0.9">
                            <h4>Hola Administrador</h4>                            
                        </div>
                        <p class="text-divider">Ingresa tus datos</p>
                        <div class="content">
                           
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>                            
                                <input id="email" type="email" placeholder="Corre electrónico" class="form-control" name="email" value="{{ old('email') }}" required autofocus>     
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input placeholder="Contraseña" id="password" type="password" class="form-control" name="password" required/>
                            </div>
     
                            <!-- If you want to add a checkbox to this form, uncomment this code-->
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Recordar sesión
                                </label>
                            </div> 
                        </div>

                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@include('includes.footer')   
</div>
@endsection

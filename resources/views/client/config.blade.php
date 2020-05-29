@extends('layouts.app')
@section('title','Configurar cuenta')
@section('body-class','product-page')
@section('content')



<div class="header header-filter" style="background-image: url('{{asset('img/arbol1.jpg')}}');">   
</div>
<div class="main main-raised">
    <div class="container">             
        <div class="section">
            <h2 class="title text-center" style="color:black;">Hola {{$user->name}}</h2>            
           
            @if (session('notification'))              
                <div class="alert alert-success">
                    <div class="container-fluid">
                      <div class="alert-icon">
                        <i class="material-icons">check</i>
                      </div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                      </button>
                      {{ session('notification') }}
                    </div>
                </div>
            @endif

            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li>
                    <a href="/home" role="tab" >
                        <i class="material-icons">dashboard</i>
                        Carrito de compras
                    </a>
                </li>              
                <li class="active">
                    <a href="{{url('/user/'.auth()->user()->id.'/config')}}" role="tab" data-toggle="tab">
                        <i class="material-icons">assignment_ind</i>
                        Configurar Cuenta
                    </a>
                </li>
            </ul>
            

            @if($errors->any())
                <div class="alert alert-danger">
                    <div class="container-fluid">                     
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="material-icons">clear</i></span>
                      </button>
                      <ul>    
                          @foreach($errors->all() as $error)                        
                          <li>{{$error}}</li>
                          @endforeach
                      </ul>
                    </div>
                </div>
            @endif
            <br>
             <form method="post" action="{{url('/user/'.$user->id.'/config')}}" >
                {{ csrf_field() }}

                <div class="row">
                                         
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del Administrador</label>
                            <input type="text" class="form-control" name="name" style="color:black;" value="{{old('name',$user->name)}}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Correo Electronico</label>
                            <input type="email" class="form-control" name="email" style="color:black;" value="{{old('email',$user->email)}}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" style="color:black;" value="{{old('password',$user->password)}}">
                        </div>
                    </div>                                       
                </div>
                                      
                <button class="btn btn-success">Actualizar datos</button>
                <a href="{{url('/home')}}" class="btn btn-danger">Cancelar</a>
             </form>    
        </div>              
    </div>
</div>
@include('includes.footer')   
@endsection



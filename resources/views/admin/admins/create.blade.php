@extends('layouts.admin')
@section('title','Ingresar nueva categoría')
@section('body-class','product-page')
@section('content')

<div class="header header-filter" style="background-image: url('{{asset('img/arbol-rosa.jpg')}}');">   
</div>
<div class="main main-raised">
    <div class="container">             
        <div class="section">
            <h2 class="title text-center" style="color:black;">Registrar nuevo administrador</h2>

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
            
             <form method="post" action="/admin/admins" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                	                	 
                	<div class="col-sm-4">
	                    <div class="form-group label-floating">
	                        <label class="control-label">Nombre del Administrador</label>
	                        <input type="text" class="form-control" name="name" style="color:black;" value="{{old('name')}}">
	                    </div>
	                </div>

	                <div class="col-sm-4">
	                    <div class="form-group label-floating">
	                        <label class="control-label">Correo Electronico</label>
	                        <input type="email" class="form-control" name="email" style="color:black;" value="{{old('email')}}">
	                    </div>
	                </div>

					<div class="col-sm-4">
	                    <div class="form-group label-floating">
	                        <label class="control-label">Contraseña</label>
	                        <input type="password" class="form-control" name="password" style="color:black;" value="{{old('password')}}">
	                    </div>
	                </div>

	                <div class="col-sm-4">	                	                      
	                    <div class="form-group label-floating">	                    	
	                        <label class="control-label">Número teléfonico</label>
	                        <input type="tel" class="form-control" name="phone" style="color:black;" value="{{old('phone')}}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >
	                    </div>	                    
                      <small>Formato: 123-456-789</small>
	                </div>

	                <div class="col-sm-4"> 	                     
	                    <small>Fotografía</small>
	                    <input type="file" name="image" required>                         
                	</div> 	 
                  
                </div>
                                      
                <button class="btn btn-success">Registrar categoría</button>
                <a href="{{url('/admin/admins')}}" class="btn btn-danger">Cancelar</a>

             </form>                  
        </div>              
    </div>
</div>
@include('includes.footer')
@endsection

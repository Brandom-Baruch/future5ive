@extends('layouts.admin')
@section('title','Ingresar nueva categoría')
@section('body-class','product-page')
@section('content')

<div class="header header-filter" style="background-image: url('{{asset('img/arbol-rosa.jpg')}}');">   
</div>
<div class="main main-raised">
    <div class="container">             
        <div class="section">
            <h2 class="title text-center" style="color:black;">Registrar nueva categoría</h2>

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
            
             <form method="post" action="/admin/categories" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">            
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" style="color:black;" value="{{old('name')}}">
                        </div>
                    </div>

                    <div class="col-sm-6">                        
                        <label class="control-label">Imagen de la categoría</label>
                        <input type="file" name="image" required>                        
                    </div>                    
                </div>

                <textarea class="form-control" placeholder="Descripción de la categoria" rows="1" name="description" style="color:black;">{{old('description')}}</textarea>

                <button class="btn btn-success">Registrar categoría</button>
                <a href="{{url('/admin/categories')}}" class="btn btn-danger">Cancelar</a>

             </form>                  
        </div>              
    </div>
</div>
@include('includes.footer')
@endsection

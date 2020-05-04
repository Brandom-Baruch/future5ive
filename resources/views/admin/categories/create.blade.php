@extends('layouts.app')
@section('title','Ingresar producto')
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
            
             <form method="post" action="/admin/categories">
                {{ csrf_field() }}

                <div class="row">            
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" style="color:black;" value="{{old('name')}}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción de la categoría</label>
                            <input type="text" class="form-control" name="description" style="color:black;" value="{{old('description')}}">
                        </div>
                    </div>
                </div>

                <button class="btn btn-success">Registrar categoría</button>
                <a href="{{url('/admin/categories')}}" class="btn btn-danger">Cancelar</a>

             </form>                  
        </div>              
    </div>
</div>
@include('includes.footer')
@endsection

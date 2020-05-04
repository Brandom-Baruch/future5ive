@extends('layouts.app')
@section('title','Ingresar producto')
@section('body-class','product-page')
@section('content')

<div class="header header-filter" style="background-image: url('{{asset('img/arbol-rosa.jpg')}}');">   
</div>
<div class="main main-raised">
    <div class="container">             

        <div class="section">

            <h2 class="title text-center" style="color:black;">Registrar nuevo producto</h2>

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
             <form method="post" action="/admin/products">
                {{ csrf_field() }}

                <div class="row">            
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="name" style="color:black;" value="{{old('name')}}">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio del producto</label>
                            <input type="number" class="form-control" name="price" style="color:black;" value="{{old('price')}}">
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Cantidad del producto</label>
                            <input type="number" class="form-control" name="stock" style="color:black;" value="{{old('stock')}}">
                        </div>
                    </div>                       

                    <div class="col-sm-5">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción corta</label>
                            <input type="text" class="form-control" name="description" style="color:black;" value="{{old('description')}}">
                        </div>
                    </div>

                     <div class="col-sm-5">
                        <div class="form-group label-floating">
                            <label class="control-label">Categoría del producto</label>
                            <select class="form-control" name="category_id">
                                <option value="0">Otros</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>                                                
                <textarea class="form-control" placeholder="Descripción extensa del producto" rows="1" name="long_description" style="color:black;"> {{old('long_description')}}</textarea>
                
                <button class="btn btn-success">Registrar producto</button>
                <a href="{{url('/admin/products')}}" class="btn btn-danger">Cancelar</a> 

             </form>                  
        </div>              
    </div>
</div>
@include('includes.footer')
@endsection

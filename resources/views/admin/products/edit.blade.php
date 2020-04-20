@extends('layouts.app')
@section('title','Editar producto')
@section('body-class','product-page')
@section('content')

@section('style')
    
    <style>        
    </style>

@endsection

<div class="header header-filter" style="background-image: url('{{asset('img/arbol.jpg')}}');">   
</div>
<div class="main main-raised">
    <div class="container">             

        <div class="section">

            <h2 class="title text-center" style="color:black;">Editar producto seleccionado</h2>

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
            
             <form method="post" action="{{url('/admin/products/'.$product->id.'/edit')}}">
                {{ csrf_field() }}

                <div class="row">            
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input type="text" class="form-control" name="name" value="{{old('name',$product->name)}}" style="color:black;">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio del producto</label>
                            <input type="number" class="form-control" name="price" value="{{$product->price}}"style="color:black;">
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Cantidad del producto</label>
                            <input type="number" class="form-control" name="stock" value="{{$product->stock}}"style="color:black;">
                        </div>
                    </div>                       

                    <div class="col-sm-5">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción corta</label>
                            <input type="text" class="form-control" name="description" value="{{$product->description}}" style="color:black;">
                        </div>
                    </div>                                                                    
                </div>                                                
                <textarea class="form-control" placeholder="Descripción extensa del producto" rows="1" name="long_description" style="color:black;">{{$product->long_description}}</textarea>
                
                <button class="btn btn-success">Guardar cambios</button>
                <a href="{{url('admin/products')}}" class="btn btn-danger">Cancelar</a>

             </form>                  
        </div>              
    </div>
</div>
@include('includes.footer')   
@endsection

@extends('layouts.admin')
@section('title','Subir imagen')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/arbol.jpg')}}');"> 
</div>
<div class="main main-raised">
    <div class="container">      
        <div class="section text-center" >                                
               <h2 class="title" style="color:black;">Imágenes del producto "{{$product->name}}"</h2>
            <!-- enctype permite para subir archivos--> 
            <form method="post" action="{{url('/admin/products/'.$product->id.'/images')}}" enctype="multipart/form-data"> 
                {{ csrf_field() }}
                <input type="file" name="photo" required>
                <button type="submit" class="btn btn-success">Subir nueva imagen</button>
                <a href="{{url('/admin/products')}}" class="btn btn-warning">Volver al listado de productos</a>
            </form>                
            <hr style="border-top-color: black;">                
            <div class="row">
              @foreach($images as $image)
                <div class="col-md-4">                   
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <img src="{{$image->url}}" width="250" height="250">
                        <form method="post" action="{{url('/admin/products/'.$product->id.'/images/delete')}}">
                            {{ csrf_field() }}                            
                          <input type="hidden" name="image_id" value="{{ $image->id }}">
                          <button type="submit" class="btn btn-danger btn-rect">Eliminar imagen</button>
                          @if($image->featured)
                            <button type="button" class="btn btn-info btn-just-icon" rel="tooltip" title="Imagen destacada de este producto">
                              <i class="material-icons">favorite</i>
                            </button>
                          @else
                            <a href="{{ url('/admin/products/'.$product->id.'/images/'.$image->id) }}" class="btn btn-primary btn-just-icon">
                              <i class="material-icons">favorite</i>
                            </a>
                          @endif                            
                        </form>                        
                      </div>
                    </div>                                  
                </div>
              @endforeach
            </div>          
        </div>              
    </div>
</div>
@include('includes.footer')
@endsection

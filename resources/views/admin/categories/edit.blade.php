@extends('layouts.admin')
@section('title','Editar categoría ' . $category->name)
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

            <h2 class="title text-center" style="color:black;">Editar categoría seleccionada "{{$category->name}}"</h2>

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
            
             <form method="post" action="{{url('/admin/categories/'.$category->id.'/edit')}}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">            
                    <div class="col-sm-4">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoria </label>
                            <input type="text" class="form-control" name="name" value="{{old('name',$category->name)}}">
                        </div>
                    </div>
                                          
                    <div class="col-sm-6">                        
                        <label class="control-label">Imagen de la categoría</label>
                        <input type="file" name="image">
                        @if($category->image)
                        <p>
                          Subir solo si desea reemplazar la <a href="{{ asset('/images/categories/'.$category->image) }}" target="_blank">imagen actual</a>
                        </p>
                        @endif                        
                    </div>                                                                    
                </div>

                <textarea class="form-control" placeholder="Descripción de la categoria" rows="1" name="description" style="color:black;">{{$category->description}}</textarea>                        
                <button class="btn btn-success">Guardar cambios</button>
                <a href="{{url('admin/categories')}}" class="btn btn-danger">Cancelar</a>

             </form>                  
        </div>              
    </div>
</div>
@include('includes.footer')   
@endsection

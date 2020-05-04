@extends('layouts.app')
@section('title','Listado de categorías')
@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/arbol.jpg')}}');">            
</div>
<div class="main main-raised">
    <div class="container">      
        <div class="section text-center">
            <h2 class="title" style="color:black;">Listado de categorías</h2>                                
                <a href="{{url('/admin/categories/create')}}" class="btn btn-primary btn-rect">
                  Agregar nueva Categoría <i class="material-icons">add_circle</i>
                </a >

            @if (session('notification'))              
                <div class="alert alert-success text-left">
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
            <div class="team">                
                <div class="row">                      
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-3 text-center">Categoria</th>
                                <th class="col-md-5 text-center">Descripcion</th>                           
                                <th class="col-md-3 text-center">Opciones</th>
                            </tr>
                        </thead>                        
                        <tbody>
                            @foreach( $categories as $key => $category)
                            <tr style="color:black;  border-color:black;">
                                <td class="text-center">{{ ($key+1) }}</td>
                                <td>{{$category->name}}</td>
                                <td class="text-left">{{$category->description}}</td>           
                                <td class="td-actions text-center">
                                    <form method="post" action="{{url('admin/categories/'.$category->id.'/delete')}}">
                                        {{ csrf_field() }}                 
                                        <a href="{{url('admin/categories/'.$category->id.'/edit')}}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>                                       
                                        <button type="submit" rel="tooltip" title="Eliminar categoría" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                          </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach                            
                        </tbody>                        
                    </table>                                                         
                </div>
            </div>
             {{$categories-> links()}}   
        </div>              
    </div>
</div>

@include('includes.footer')
@endsection

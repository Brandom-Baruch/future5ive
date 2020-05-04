@extends('layouts.app')
@section('title','Listado de productos')
@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/arbol.jpg')}}');">            
</div>
<div class="main main-raised">
    <div class="container">      
        <div class="section text-center">
            <h2 class="title" style="color:black;">Listado de productos</h2>                                
                <a href="{{url('/admin/products/create')}}" class="btn btn-primary btn-rect">
                  Agregar nuevo producto <i class="material-icons">add_circle</i>
                </a >
            <div class="team">                
                <div class="row">                      
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-4 text-center">Descripcion</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Cantidad</th>
                                <th class="col-md-3 text-center">Opciones</th>
                            </tr>
                        </thead>                        
                        <tbody>
                            @foreach( $products as $product)
                            <tr style="color:black;  border-color:black;">
                                <td class="text-center">{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td class="col-md-4 text-left">{{$product->description}}</td>
                                <td>{{$product->category_name }}</td>
                                <td class="text-center">{{$product->price}}</td>
                                <td class="text-center">{{$product->stock}}</td>
                                <td class="td-actions text-center">
                                    <form method="post" action="{{url('admin/products/'.$product->id.'/delete')}}">
                                        {{ csrf_field() }}
                                        <a href="{{ url('/products/'.$product->id) }}"  type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{url('admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('admin/products/'.$product->id.'/images')}}" rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple btn-xs">
                                            <i class="fa fa-image"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
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
             {{$products-> links()}}   
        </div>              
    </div>
</div>

@include('includes.footer')
@endsection

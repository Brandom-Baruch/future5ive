@extends('layouts.app')
@section('title','Dashboard')
@section('body-class','product-page')
@section('content')



<div class="header header-filter" style="background-image: url('{{asset('img/arbol-rosa.jpg')}}');">   
</div>
<div class="main main-raised">
    <div class="container">             
        <div class="section">
            <h2 class="title text-center" style="color:black;">Dashboard</h2>            
           
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
                <li class="active">
                    <a href="#dashboard" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
                        Carrito de compras
                    </a>
                </li>              
                <li>
                    <a href="#tasks" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Pedidos realizados
                    </a>
                </li>
            </ul>        
             <br>
            <p>Tu carrito de compras cuenta con {{auth()->user()->cart->details->count()}} productos.</p>     
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Imagen</th>
                        <th class="col-md-2 text-center">Nombre</th>                        
                        <th class="text-center">Categoria</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Sub-total</th>
                        <th class="text-center">Opciones</th>                        
                    </tr>
                </thead>                        
                <tbody>
                    @foreach(auth()->user()->cart->details as $detail)
                    <tr style="color:black;  border-color:black;">
                        <td class="text-center"><img src="{{$detail->product->feature}}" height="100"></td>
                        <td class="text-center"><a href="{{ url('/products/'.$detail->product->id) }}" style="color: black">{{$detail->product->name}}</a></td> 
                        <td class="text-center">{{$detail->product->category ? $detail->product->category->name : 'General' }}</td>
                        <td class="text-center">{{$detail->product->price}}</td>
                        <td class="text-center">{{$detail->quantity}}</td>
                        <td class="text-center">{{$detail->quantity * $detail->product->price}}</td>
                        <td class="td-actions text-center">
                            <form method="post" action="{{ url('/cart') }}">
                                
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                                                                
                                <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">

                                <a  href="{{ url('/products/'.$detail->product->id) }}" target="_black" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs">
                                    <i class="fa fa-info"></i>
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
            <p> <strong>Total a pagar: </strong>{{auth()->user()->cart->total}}</p>

           <br>

          <div class="text-right">
            <form method="post" action="{{ url('/order') }}">
                {{ csrf_field() }}                
                <button type="submit" class="btn btn-success btn-rect">
                    <i class="material-icons">done</i> Realizar pedido.
                </button>
            </form>                  
          </div>

        </div>              
    </div>
</div>
@include('includes.footer')   
@endsection



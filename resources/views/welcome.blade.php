@extends('layouts.app')

@section('title','Pagina inicio')

@section('body-class','landing-page')

@section('styles')
    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }
        .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }

    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/arbol.jpg')}}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Bienvenido a ACF Tecnhologies Inc.</h1>
                        <h4>Realiza pedidos en linea y te contactaremos para entregar tu pedido en tiempo y forma.</h4>
                        <br />                       
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="container">
                <div class="section text-center section-landing">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title" style="color:black;">¿Estas interesado en un producto?</h2>
                            <h5 class="description" style="color:black;">Atendemos tus dudas rapidamente. No estás solo sino que siempre estamos atentos a tus inquietudes.</h5>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title" style="color:black;">Atendemos tus dudas</h4>
                                    <p style="color:black;">Atendemos tus dudas rapidamente. No estás solo sino que siempre estamos atentos a tus inquietudes.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title" style="color:black;">Pago seguro</h4>
                                    <p style="color:black;">Todo pedido que realices pagos a traves de Paypal. Si no confias en los pagos en linea, puedes pagar contra entrega.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title" style="color:black;">Información privada</h4>
                                    <p style="color:black;">Los pedidos que realices, solo los conoceras tú a través del panel de usuario, ahi obtendras tu información detallada. Nadie mas tiene acceso a esta información.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section text-center">
                    <h2 class="title" style="color:black;">Productos disponibles</h2>

                    <div class="team">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-md-4">                                
                                <div class="team-player">
                                    <img src="{{$product->feature}}" alt="Thumbnail Image" class="img-raised img-rect" width="250">
                                    <h4 class="title"><a href="{{ url('/products/'.$product->id) }}" style="color:black;">{{$product->name}}</a><br/>
                                        <small class="text-muted" style="color:black;">{{$product->category->name}}</small>
                                    </h4>
                                    <p class="description" style="color:black;">Precio: $ {{$product->price}}</p> 
                                    <p class="description" style="color:black;">{{$product->description}}</p>                              
                                </div>                                
                            </div>    
                            @endforeach                       
                        </div>
                        <div class="text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>              
            </div>
        </div>       
@include('includes.footer')
@endsection

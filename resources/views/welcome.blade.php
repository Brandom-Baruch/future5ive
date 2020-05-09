@extends('layouts.app')

@section('title','Pagina inicio')

@section('body-class','landing-page')

@section('styles')
    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }      
        .tt-query {
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {  
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;
          cursor: pointer;  

        }

        .tt-suggestion p {
          margin: 0;
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
                    <h2 class="title" style="color:black;">Visita nuestras categorías</h2>

                    <form class="form-inline" method="get" action="{{ url('/search') }}">
                        <input type="text"  placeholder="¿Qué producto buscas?" class="form-control text-center" name="searches" id="search">
                        <button class="btn btn-primary btn-just-icon" type="submit">
                            <i class="material-icons">search</i>
                        </button>
                    </form>

                    <div class="team">
                        <div class="row">
                            @foreach($categories as $category)
                            <div class="col-md-4">                                
                                <div class="team-player">
                                    <img src="{{$category->feature}}" alt="Imagen representativa de la categoria {{$category->name}}" class="img-raised img-rect" width="250">
                                    <h4 class="title"><a href="{{ url('/categories/'.$category->id) }}" style="color:black;">{{$category->name}}</a><br/>                    
                                    </h4>
                                    <p class="description" style="color:black;">{{$category->description}}</p>                              
                                </div>                                
                            </div>    
                            @endforeach                       
                        </div>                        
                    </div>
                </div>              
            </div>
        </div>       
 @include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function (){
            //Inicilizar variable products
            var products = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,              
              prefetch: '{{ url("products/json") }}'
            });

            //Inicilizar typeahead sobre nuestro input de busqueda
            $('#search').typeahead({
                //Pasamos el objeto de las propiedades
                  hint: true,
                  highlight: true,
                  minLength: 1
            }, {
                //Pasamos el objeto de datasend
                  name: 'products',
                  source: products
            });
        });
    </script>
@endsection
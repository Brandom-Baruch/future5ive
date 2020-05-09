@extends('layouts.app')

@section('title','Busqueda del product')

@section('body-class','profile-page')

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
<div class="header header-filter" style="background-image: url({{ url('img/examples/city.jpg')}});"></div>
	<div class="main main-raised">
		<div class="profile-content">
        	<div class="container">	            
                <div>
                	<div class="profile">
	                    <div class="avatar">
	                        <img src="{{asset('/img/search.png')}}" alt="Imagen de una lupa representando la busqueda" class="img-circle img-responsive img-raised ">
	                    </div>
	                    <div class="name">
	                      <h3 class="title" style="color:black;">Resultado de la búsqueda</h3>  
	                  	</div>
	                    <div class="description text-center" style="color:black;">
			                <p style="color:black;">Se encontraron {{ $products->count() }} resultados para el término {{ $searches }}</p>
			            </div>
	                </div>	     
                </div>       	            	            	                         					
				<div class="team text-center">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4">                                
                            <div class="team-player">
                                <img src="{{$product->feature}}" alt="Thumbnail Image" class="img-raised img-rect" width="250">
                                <h4 class="title"><a href="{{ url('/products/'.$product->id) }}" style="color:black;">{{$product->name}}</a><br/>
                                    <small class="text-muted" style="color:black;">{{$product->category_name}}</small>
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

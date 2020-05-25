@extends('layouts.app')

@section('title','Mostrar producto ' . $products->name)

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url({{ url('img/examples/city.jpg')}});"></div>
	<div class="main main-raised">
		<div class="profile-content">
        	<div class="container">
	            <div class="row">
	                <div class="profile">
	                    <div class="avatar">
	                        <img src="{{$products->feature}}" alt="Circle Image" class="img-rect img-responsive img-raised">
	                    </div>
	                    <div class="name">
	                        <h3 class="title">{{$products->name}}</h3>
							<h6>{{$products->category->name}}</h6>
	                    </div>
	                </div>
	            </div>
	            <div class="description text-center">
	                <p>{{ $products->long_description }}</p>
	            </div>
	            
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
            	
	            <div class="text-center">
	            	<button class="btn btn-success btn-round" data-toggle="modal" data-target="#modalAddToCart">
						<i class="material-icons">shopping_cart</i> Añadir al carrito de compras		
					</button>
	            </div>	           					
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="profile-tabs">
	                    	<div class="nav-align-center">								
		                    	<div class="tab-content gallery">
									<div class="tab-pane active" id="studio">
                        				<div class="row">                        					
											<div class="col-md-6">
												@foreach ($imageLeft as $image)
												<img src="{{ $image->url }}" class="img-rounded" />
												@endforeach											
											</div>											
											<div class="col-md-6">
												@foreach ($imageRight as $image)
												<img src="{{ $image->url }}" class="img-rounded" />
												@endforeach																			
											</div>
		                            	</div>
		                        	</div>		                        							
	                    		</div>
							</div>
						</div>		
					</div>
        		</div>
    		</div>
		</div>
	</div>
<!-- Modal Core -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel" style="color: black">Seleccione la cantidad que desea agregar</h4>
      </div>
      <form method="post" action="{{ url('/cart') }}">
      	{{ csrf_field() }}
      	<input type="hidden" name="product_id" value="{{$products->id}}">
  		  <div class="modal-body">
	        <input type="number" name="quantity" value="1" class="form-control" style="color: black">
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default btn-simple" data-dismiss="modal" style="color: red">Cancelar</button>
	        <button type="submit" class="btn btn-info btn-simple">Añadir al carrito</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@include('includes.footer')   
@endsection
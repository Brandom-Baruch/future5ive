@extends('layouts.admin')
@section('title','Listado de Administradores')
@section('body-class','product-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{asset('img/arbol.jpg')}}');"></div>
<div class="main main-raised">
    <div class="container">      
        <div class="section text-center">
            <h2 class="title" style="color:black;">Listado de administradores</h2>                                
                <a href="{{url('/admin/admins/create')}}" class="btn btn-primary btn-rect">
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
                                <th class="col-md-2 text-center">Nombre del administrador</th>
                                <th class="col-md-2 text-center">Correo</th>
                                <th class="col-md-2 text-center">Telefono</th>
                                <th class="text-center">Fotografía</th>            
                                <th class="col-md-2 text-center">Opciones</th>
                            </tr>
                        </thead>                        
                        <tbody>
                            @foreach($admins as $admin)                            
                            <tr style="color:black;  border-color:black;">
                                <td class="text-center">{{$admin->id}}</td>                         
                                <td class="text-center">{{ $admin->name }}</td>
                                <td class="text-center">{{ $admin->email }}</td>
                                <td>{{$admin->phone}}</td>
                                <td><img src="{{$admin->image_admin}}" height="100"></td>      
                                <td class="td-actions text-center">
                                    <form method="post" action="">
                                        {{ csrf_field() }}                 
                                        <a href="{{url('admin/admins/'.$admin->id.'/edit')}}" rel="tooltip" title="Editar categoría" class="btn btn-success btn-simple btn-xs">
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
        </div>              
    </div>
</div>

@include('includes.footer')
@endsection
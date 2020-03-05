@extends('layouts.layout')
@section('title','Administrador')

@section('content')
@if(Session::has('success'))
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close closeBtn"><span>&times;</span></button>
        <strong>Éxito: </strong>{{Session::get('success')}}
    </div>
    </div>
</div>
@endif
@if(Session::has('error'))
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close closeBtn" ><span>&times;</span></button>
        <strong>Error: </strong>{{Session::get('error')}}
    </div>
    </div>
</div>
@endif
<div class="container">
    <h1 class="m-4">Panel Usuario</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Descripcion</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($tickets) != 0)
                        @foreach($tickets as $ticket)
                            <tr>
                            @if($ticket->usuario['nombre'] == null)
                                <td>No asignado *</td>
                            @else
                                <td>{{$ticket->usuario['nombre']}}</td>
                            @endif
                                <td>{{$ticket->ticket_pedido}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{ Form::open(['route' => ['usuario_asignarTicket', $ticket->id], 'method'=>'post']) }}
                                                @if($ticket->usuario['nombre'] == null)
                                                    {{Form::hidden('ticket', $ticket->id)}}
                                                    {{ Form::submit('Asignar', ['class' => 'btn btn-primary btn-sm btn-block'])}}
                                                @else
                                                    <a class="btn btn-primary btn-sm btn-block disabled" href="#" >Asignado</a>
                                                @endif
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No hay tickets</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
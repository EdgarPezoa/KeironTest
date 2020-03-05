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
    <h1 class="m-4">Panel Administrador</h1>
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
                                    <div class="col-md-6">
                                        {{ Form::open(['route' => ['ticket.edit', $ticket->id], 'method'=>'get']) }}
                                            {{ Form::submit('Editar', ['class' => 'btn btn-primary btn-sm btn-block'])}}
                                        {{ Form::close() }}
                                    </div>
                                    <div class="col-md-6">
                                        {{ Form::open(['route' => ['ticket.destroy', $ticket->id], 'method'=>'delete']) }}
                                            {{ Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm btn-block'])}}
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row mb-4">
        <div class="col-md-12">
            <h1 class="m-4">Nuevo Ticket</h1>
            {{ Form::open(['route' => 'ticket.store']) }}
                <div class="form-group">
                    {{Form::label('id_user', 'Usuario')}}
                    {{Form::select('id_user', $usuarios, null, ['placeholder' => 'Usuario', 'class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('ticket_pedido', 'Descripción')}}
                    {{Form::textarea('ticket_pedido',null,['class'=>'form-control','required'])}}
                </div>
                <div class="form-group dCenter">
                    {{Form::submit('Crear',['class'=>'btn btn-primary btn-block'])}}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
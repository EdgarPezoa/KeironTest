@extends('layouts.layout')
@section('title','Administrador')

@section('content')
<div class="container mt-4">
    <div class="row dCenter">
        <div class="col-lg-8 col-md-8">
            <h1>Editar ticket</h1>
            <hr>
            {{ Form::model($ticket, ['route' => ['ticket.update', $ticket->id], 'method' => 'put']) }}
                <div class="form-group">
                        {{Form::label('id_user', 'Usuario')}}
                        {{Form::select('id_user', $usuarios, $ticket->id_user, ['placeholder' => 'Usuario', 'class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('ticket_pedido', 'Descripción')}}
                        {{Form::textarea('ticket_pedido', $ticket->ticket_pedido, ['class'=>'form-control','required'])}}
                    </div>
                    <div class="form-group editForm">
                        <a class="btn btn-danger" href="{{route('administrador_index')}}">Volver</a>
                        {{Form::submit('Modificar', ['class' => 'btn btn-primary'])}}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
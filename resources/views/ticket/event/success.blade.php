<!-- resources/views/ticket/event/index.blade.php -->
@extends('layouts.site')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Compra Finalizada
            </div>
            <div class="panel-body">
                <div class="alert alert-success">
                    <p>Parabéns Sr(a) <strong>{{$name}}</strong> portador do CPF <strong>{{$cpf}}</strong>, sua compra foi efetivada com sucesso!</p>
                    <p>Guarde o número do seu ticket para apresentar no evento.</p>
                </div>
                <div class="alert alert-success">
                    <strong>ID TICKET:</strong> {{ $id_ticket }}
                </div>
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <a href="{{ url('/') }}" class="btn btn-default btn-info">
                            <i class="fa fa-list"></i> Outros Eventos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
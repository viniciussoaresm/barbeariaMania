<!-- resources/views/ticket/event/index.blade.php -->
@extends('layouts.site')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Comprar o Ticket
            </div>
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ url('event/pay') }}/{{ $id }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group col-sm-4">
                        <label class="control-label">Nome:</label> {{ $name }}
                    </div>
                    <div class="form-group col-sm-4">
                        <label class="control-label">Data:</label> {{ date('d/m/Y', strtotime($date)) }}
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="lotacao_maxima" class="control-label">Lotação Máxima:</label> {{ $maximum_capacity }}
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="organizador" class="control-label">Organizador:</label> {{ $manager }}
                    </div>
                    <div class="form-group col-sm-8">
                        <label for="tipo_evento" class="control-label">Tipo de Evento:</label> 
                        @if ($type == 'S')
                        Show
                        @elseif ($type == 'B')
                        Balada
                        @elseif ($type == 'T')
                        Teatro
                        @else
                        Esporte
                        @endif 
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="descricao" class="control-label">Descrição: </label> {{ $description }}
                    </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group">
                        <label for="nome" class="control-label col-sm-1">Nome:</label>
                        <div class="col-sm-11">
                            <input type="nome" placeholder="Nome" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
                        </div>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="form-group">
                        <label for="cpf" class="control-label col-sm-1">CPF:</label>
                        <div class="col-sm-11">
                            <input type="cpf" placeholder="000.000.000-00" name="cpf" id="cpf" class="form-control cpf" value="{{ old('cpf') }}">
                        </div>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            @if ($maximum_capacity > $purchased_tickets) 
                                <button type="submit" class="btn btn-success" title="Comprar">
                                    <i class="fa fa-save"></i> Comprar
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
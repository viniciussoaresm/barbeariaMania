<!-- resources/views/ticket/event/index.blade.php -->
@extends('layouts.site')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Detalhe do Evento
            </div>
            <div class="panel-body">
                @include('common.errors')
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
                <div class="form-group">
                    <div class="col-sm-12 text-center">
                        <a href="{{ url('/') }}" class="btn btn-default btn-info">
                            <i class="fa fa-list"></i> Outros Eventos
                        </a>
                        @if ($maximum_capacity > $purchased_tickets) 
                            <a href="{{ url('event/buy') }}/{{ $id }}" class="btn btn-success">
                                <i class="fa fa-cart-arrow-down"></i> Adicionar
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
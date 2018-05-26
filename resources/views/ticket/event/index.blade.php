<!-- resources/views/ticket/event/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <!-- Search Events -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Pesquisa de Eventos
            </div>
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ url('admin/event/search') }}" method="POST" class="form-vertical">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="nome" class="control-label">Nome</label>
                                <input type="text" placeholder="Nome" name="nome" id="nome" class="form-control" value="{{ $nome }}">
                            </div>
                            <div class="col-sm-2">
                                <label for="data" class="control-label">Data</label>
                                <input type="text" placeholder="dd/mm/yyyy" name="data" id="data" class="form-control datepicker date" value="{{ $data }}">
                            </div>
                            <div class="col-sm-2">
                                <label for="lotacao_maxima" class="control-label">Lotação Máxima</label>
                                <input type="text" placeholder="Lotação Máxima" name="lotacao_maxima" id="lotacao_maxima" class="form-control number" value="{{ $lotacao_maxima }}">
                            </div>
                            <div class="col-sm-3">
                                <label for="tipo_evento" class="control-label">Tipo de Evento</label> 
                                <select name="tipo_evento" id="tipo_evento" class="form-control">
                                    <option value="">Selecione o tipo de evento</option>
                                    <option value="S" @if ($tipo_evento == 'S') selected="selected" @endif>Show</option>
                                    <option value="B" @if ($tipo_evento == 'B') selected="selected" @endif>Balada</option>
                                    <option value="T" @if ($tipo_evento == 'T') selected="selected" @endif>Teatro</option>
                                    <option value="E" @if ($tipo_evento == 'E') selected="selected" @endif>Esporte</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <label for="status" class="control-label">Status</label> 
                                <select name="status" id="status" class="form-control">
                                    <option value="">Selecione o status</option>
                                    <option value="P" @if ($status == 'P') selected="selected" @endif>Publicado</option>
                                    <option value="N" @if ($status == 'N') selected="selected" @endif>Não Publicado</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">&nbsp;</div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm" title="Buscar">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
                                    <a href="{{ url('admin/event/create/') }}" class="btn btn-info btn-sm" title="Criar Evento">
                                        <i class="fa fa-plus"></i> Criar Evento
                                    </a>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- Current Events -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Eventos
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th class="col-sm-4">Ações</th>
                    <th class="col-sm-2">Nome</th>
                    <th class="col-sm-1">Data</th>
                    <th class="col-sm-2">Lotação Máxima</th>
                    <th class="col-sm-2">Organizador</th>
                    <th class="col-sm-1">Tipo</th>
                    </thead>
                    <tbody>
                        @if (count($events) > 0)
                            @foreach ($events as $event)
                                <tr>
                                    <td>
                                        <a href="{{ url('admin/event/edit/') }}/{{ $event->id }}" class="btn btn-info btn-sm" title="Editar">
                                            <i class="fa fa-edit"></i> Editar
                                        </a>
                                        <a href="{{ url('admin/event/destroy/') }}/{{ $event->id }}" class="btn btn-danger btn-sm" title="Excluir">
                                            <i class="fa fa-trash"></i> Excluir
                                        </a>
                                        @if ($event->status == 'P' && date('Y-m-d') <= date('Y-m-d', strtotime($event->date)))
                                            <a href="{{ url('admin/event/unpublished/') }}/{{ $event->id }}" class="btn btn-success btn-sm" title="Publicado">
                                                <i class="fa fa-check"></i> Publicado
                                            </a>
                                        @else
                                            <a href="{{ url('admin/event/published/') }}/{{ $event->id }}" class="btn btn-danger btn-sm" title="Não Publicado">
                                                <i class="fa fa-ban"></i> Não Publicado
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ date('d/m/Y', strtotime($event->date)) }}</td>
                                    <td>{{ $event->maximum_capacity }}</td>
                                    <td>{{ $event->manager }}</td>
                                    <td>
                                        @if ($event->type == 'S')
                                            Show
                                        @elseif ($event->type == 'B')
                                            Balada
                                        @elseif ($event->type == 'T')
                                            Teatro
                                        @else
                                            Esporte
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="7">Nenhum evento encontrado.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
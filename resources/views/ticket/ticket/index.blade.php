<!-- resources/views/ticket/event/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <!-- Current Events -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de Eventos
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th class="col-sm-2">Ações</th>
                        <th class="col-sm-2">Evento</th>
                        <th class="col-sm-2">Tickets Vendidos</th>
                        <th class="col-sm-2">Lotação Máxima</th>
                        <th class="col-sm-2">Data</th>
                        <th class="col-sm-2">Status</th>
                    </thead>
                    <tbody>
                        @if (count($tickets) > 0)
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>
                                        <a href="{{ url('admin/event/edit/') }}/{{ $ticket->id }}" class="btn btn-info btn-sm" title="Editar">
                                            <i class="fa fa-edit"></i> Editar Evento
                                        </a>
                                    </td>
                                    <td>{{ $ticket->name }}</td>
                                    <td>{{ $ticket->total }}</td>
                                    <td>{{ $ticket->maximum_capacity }}</td>
                                    <td>{{ date('d/m/Y', strtotime($ticket->date)) }}</td>
                                    <td>
                                        @if ($ticket->status == 'P')
                                            Publicado
                                        @else
                                            Não Publicado
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
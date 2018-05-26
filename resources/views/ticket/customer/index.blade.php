<!-- resources/views/ticket/event/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <!-- Search Events -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Pesquisa de Clientes
            </div>
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ url('admin/customer/search') }}" method="POST" class="form-vertical">
                    {{ csrf_field() }}
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="nome" class="control-label">Nome</label>
                                <input type="text" placeholder="Nome" name="nome" id="nome" class="form-control" value="{{ $nome }}">
                            </div>
                            <div class="col-sm-4">
                                <label for="cpf" class="control-label">CPF</label>
                                <input type="text" placeholder="000.000.000-00" name="cpf" id="cpf" class="form-control cpf" value="{{ $cpf }}">
                            </div>
                        </div>
                        <div class="row">&nbsp;</div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm" title="Buscar">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>
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
                Lista de Clientes
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th class="col-sm-4">Ações</th>
                        <th class="col-sm-4">Nome</th>
                        <th class="col-sm-4">CPF</th>
                    </thead>
                    <tbody>
                        @if (count($customers) > 0)
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>
                                        <a href="{{ url('admin/customer/edit/') }}/{{ $customer->id }}" class="btn btn-info btn-sm" title="Editar">
                                            <i class="fa fa-edit"></i> Visualizar
                                        </a>
                                    </td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->cpf }}</td>
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
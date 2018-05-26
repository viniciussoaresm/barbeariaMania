<!-- resources/views/ticket/event/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Evento
            </div>
            <div class="panel-body">
                @include('common.errors')

                <form action="@if ($id > 0) {{ url('admin/event/update') }}/{{ $id }} @else {{ url('admin/event/store') }} @endif" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nome" class="col-sm-3 control-label">Nome</label>

                        <div class="col-sm-6">
                            <input type="text" autofocus="" placeholder="Nome" name="nome" id="nome" class="form-control" value="{{ old('nome', $name) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="data" class="col-sm-3 control-label">Data</label> 

                        <div class="col-sm-6">
                            <input type="date" placeholder="dd/mm/yyyy" name="data" id="data" class="form-control datepicker date" value="{{ old('data', $date) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lotacao_maxima" class="col-sm-3 control-label">Lotação Máxima</label> 

                        <div class="col-sm-6">
                            <input type="text" placeholder="Lotação Máxima" name="lotacao_maxima" id="lotacao_maxima" class="form-control number" value="{{ old('lotacao_maxima', $maximum_capacity) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="organizador" class="col-sm-3 control-label">Organizador</label> 

                        <div class="col-sm-6">
                            <input type="text" placeholder="Organizador" name="organizador" id="organizador" class="form-control" value="{{ old('organizador', $manager) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tipo_evento" class="col-sm-3 control-label">Tipo de Evento</label> 

                        <div class="col-sm-6">
                            <select name="tipo_evento" id="tipo_evento" class="form-control">
                                <option value="">Selecione o tipo de evento</option>
                                <option value="S" @if (old('tipo_evento', $type) == 'S') selected="selected" @endif>Show</option>
                                <option value="B" @if (old('tipo_evento', $type) == 'B') selected="selected" @endif>Balada</option>
                                <option value="T" @if (old('tipo_evento', $type) == 'T') selected="selected" @endif>Teatro</option>
                                <option value="E" @if (old('tipo_evento', $type) == 'E') selected="selected" @endif>Esporte</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao" class="col-sm-3 control-label">Descrição</label> 

                        <div class="col-sm-6">
                            <textarea name="descricao" id="descricao" placeholder="Descrição do evento" class="form-control">{{ old('descricao', $description) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-3 control-label">Status</label> 

                        <div class="col-sm-6">
                            <select name="status" id="status" class="form-control">
                                <option value="">Selecione o status</option>
                                <option value="P" @if (old('status', $status) == 'P') selected="selected" @endif>Publicado</option>
                                <option value="N" @if (old('status', $status) == 'N') selected="selected" @endif>Não Publicado</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <a href="{{ url('admin/event') }}" class="btn btn-default btn-info">
                                <i class="fa fa-arrow-circle-left"></i> Voltar
                            </a>
                            <button type="submit" class="btn btn-default btn-success">
                                <i class="fa fa-save"></i> Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
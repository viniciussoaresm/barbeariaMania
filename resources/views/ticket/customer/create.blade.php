<!-- resources/views/ticket/event/index.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Cliente
            </div>
            <div class="panel-body">
                @include('common.errors')

                <form action="@if ($id > 0) {{ url('admin/customer/update') }}/{{ $id }} @else {{ url('admin/customer/store') }} @endif" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nome" class="col-sm-3 control-label">Nome</label>

                        <div class="col-sm-6">
                            <input type="text" autofocus="" placeholder="Nome" name="nome" id="nome" class="form-control" value="{{ old('nome', $name) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cpf" class="col-sm-3 control-label">CPF</label> 

                        <div class="col-sm-6">
                            <input type="date" placeholder="dd/mm/yyyy" name="cpf" id="cpf" class="form-control cpf" value="{{ old('cpf', $cpf) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <a href="{{ url('admin/customer') }}" class="btn btn-default btn-info">
                                <i class="fa fa-arrow-circle-left"></i> Voltar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
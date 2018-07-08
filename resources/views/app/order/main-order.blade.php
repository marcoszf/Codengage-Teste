@extends('app.master')

@section('title', 'Pedidos de venda')

@section('content')

    <div class="row">

        <div class="col-md-12">
            <h3>Adicionar Pedidos de Venda</h3>

            {!! Form::open(['url' => 'sellOrder']) !!}

            <div class="col-6">
                {{ Form::label('emission', 'Data da emissão: ') }}
                <input type="text" class="form-control" name="emission" required>
            </div>

            <div class="col-6">
                {{ Form::label('total', 'Valor total:') }}
                <input type="text" class="form-control" name="total" required>
            </div><br>

            <div class="col-12">
                <input type="submit" value="Enviar" class="btn btn-default">
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-12">
            <a href="{{ url('ItemOrder') }}" class="btn btn-default">Gerenciar Items</a>
            <h3>Listagem de Pedidos de Venda</h3>

            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Data da emissão</th>
                    <th>Valor total</th>
                    <th>Ações</th>
                </tr>

                @forelse($sellOrders as $sellOrder)
                    <tr>
                        <td>{{ $sellOrder->getId() }}</td>
                        <td>{{ '$sellOrder->getEmission()' }}</td>
                        <td>{{ $sellOrder->getTotal() }}</td>
                        <td>
                            {!! Form::open(['url' => 'sellOrder/' . $sellOrder->getId(), 'method' => 'delete']) !!}
                            <input type="submit" value="Deletar" class="btn btn-danger">
                            {!! Form::close() !!}
                            <a href="{{ url('sellOrder/' . $sellOrder->getId() . '/edit') }}" class="btn btn-default">Editar</a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhuma pessoa encontrada</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>

@endsection
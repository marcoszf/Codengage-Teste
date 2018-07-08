@extends('app.master')

@section('title', 'Itens de venda')

@section('content')

    <div class="row">

        <div class="col-md-12">
            <h3>Adicionar itens de pedido de Venda</h3>

            {!! Form::open(['url' => 'ItemOrder']) !!}

            <div class="col-6">
                {{ Form::label('product', 'Produtos:') }}
                <select name="product_id" class="form-control" id="">
                    @foreach($products as $product)
                        <option value="{{ $product->getId()  }}">{{ $product->getName()  }}</option>
                    @endforeach()
                </select>
            </div>
            
            <div class="col-6">
                {{ Form::label('quantity', 'Quantidade:') }}
                <input type="text" class="form-control" name="quantity" required>
            </div>

            <div class="col-6">
                {{ Form::label('priceUnity', 'Preço Unitário:') }}
                <input type="text" class="form-control" name="priceUnity" required>
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
            <h3>Listagem de itens de pedido de Venda</h3>

            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Valor total</th>
                    <th>Ações</th>
                </tr>

                @forelse($itemsOrder as $itemOrder)
                    <tr>
                        <td>{{ $itemOrder->getId() }}</td>
                        <td>{{ $itemOrder->getItemOrder()->getName() }}</td>
                        <td>{{ $itemOrder->getQuantity() }}</td>
                        <td>R$ {{ number_format($itemOrder->getPriceUnity(), 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($itemOrder->getTotal(), 2, ',', '.')  }}</td>
                        <td>
                            {!! Form::open(['url' => 'ItemOrder/' . $itemOrder->getId(), 'method' => 'delete']) !!}
                            <input type="submit" value="Deletar" class="btn btn-danger">
                            {!! Form::close() !!}
                            <a href="{{ url('ItemOrder/' . $itemOrder->getId() . '/edit') }}" class="btn btn-default">Editar</a>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhuma item encontrado</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>

@endsection
@extends('app.master')

@section('content')


    <div class="row">

        <div class="col-md-12">
            <h3>Editar item de pedido de Venda</h3>

            {!! Form::open(['url' => 'ItemOrder/' . $itemOrder->getId(), 'method' => 'put']) !!}

                <div class="col-6">
                    {{ Form::label('product', 'Produtos:') }}
                    <select name="product_id" class="form-control" id="">
                        @foreach($products as $product)
                            <option {{ $product->getId() == $itemOrder->getItemOrder()->getId() ? 'selected="selected"' : '' }} value="{{ $product->getId() }}">{{ $product->getName() }}</option>
                        @endforeach()
                    </select>
                </div>

                <div class="col-6">
                    {{ Form::label('quantity', 'Quantidade:') }}
                    <input type="text" value="{{ $itemOrder->getQuantity() }}" class="form-control" name="quantity" required>
                </div>

                <div class="col-6">
                    {{ Form::label('priceUnity', 'Preço Unitário:') }}
                    <input type="text" value="{{ $itemOrder->getPriceUnity() }}" class="form-control" name="priceUnity" required>
                </div>

                <div class="col-6">
                    {{ Form::label('total', 'Valor total:') }}
                    <input type="text" value="{{ $itemOrder->getTotal() }}" class="form-control" name="total" required>
                </div><br>

                <div class="col-12">
                    <input type="submit" value="Enviar" class="btn btn-default">
                </div>

                {!! Form::close() !!}
        </div>

    </div>

@endsection
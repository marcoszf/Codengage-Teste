@extends('app.master')

@section('content')


    <div class="row">

        <div class="col-md-12">
            <h3>Editar Pedido de Venda</h3>

            {!! Form::open(['url' => 'sellOrder/' . $sellOrder->getId(), 'method' => 'put']) !!}

                <div class="col-6">
                    {{ Form::label('items_order_id', 'Clientes:') }}
                    <select name="items_order_id" class="form-control" id="items_order_id" multiple>
                        @foreach($itemsOrder as $item)
                            <option value="{{ $item->getId() }}">Produto: {{ $item->getItemOrder()->getName() }} - Quantidade: {{ $item->getQuantity() }} - Valor Total: R${{ number_format($item->getTotal(), 2, ',', '.') }}</option>
                        @endforeach()
                    </select>
                </div>

                <div class="col-6">
                    {{ Form::label('person_id', 'Clientes:') }}
                    <select name="person_id" class="form-control" id="person_id">
                        @foreach($people as $person)

                            <option {{ $sellOrder->getCustomer()->getId() == $person->getId() ? 'selected="selected"' : ''}}  value="{{ $person->getId()  }}">{{ $person->getName()  }}</option>
                        @endforeach()
                    </select>
                </div>

                <div class="col-6">
                    {{ Form::label('emission', 'Data da emissão: ') }}
                    <input type="text" value="" id="emission" class="form-control" name="emission" required>
                </div>

                <div class="col-6">
                    {{ Form::label('total', 'Valor total:') }}
                    <input type="text" value="{{ $sellOrder->getTotal() }}" id="total" class="form-control" name="total" required>
                </div><br>

                <div class="col-12">
                    <input type="submit" value="Enviar" class="btn btn-default">
                </div>

                {!! Form::close() !!}
        </div>

    </div>

@endsection
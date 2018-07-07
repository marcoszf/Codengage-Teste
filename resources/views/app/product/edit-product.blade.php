@extends('app.master')

@section('content')


    <div class="row">

        <div class="col-md-12">
            <h3>Editar dados Produto</h3>

            {!! Form::open(['url' => 'product/' . $product->getId(), 'method' => 'put']) !!}

                <div class="col-6">
                    {{ Form::label('name', 'Nome: ') }}
                    <input type="text" class="form-control" value="{{ $product->getName() }}" name="name" required>
                </div>

                <div class="col-6">
                    {{ Form::label('code', 'Código:') }}
                    <input type="text" class="form-control" value="{{ $product->getCode() }}" name="code" required>
                </div>

                <div class="col-6">
                    {{ Form::label('price', 'Preço:') }}
                    <input type="text" class="form-control" value="{{ $product->getPrice() }}" name="price" required>
                </div>

                <div class="col-12">
                    <input type="submit" value="Enviar" class="btn btn-default">
                </div>

            {!! Form::close() !!}
        </div>

    </div>

@endsection
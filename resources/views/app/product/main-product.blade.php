@extends('app.master')

@section('title', 'Produtos')

@section('content')

    <div class="row">

        <div class="col-md-12">
            <h3>Adicionar Produto</h3>

            {!! Form::open(['url' => 'product']) !!}

            <div class="col-6">
                {{ Form::label('name', 'Nome:') }}
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="col-6">
                {{ Form::label('code', 'Código:') }}
                <input type="text" class="form-control" name="code" required>
            </div>

            <div class="col-6">
                {{ Form::label('price', 'Preço:') }}
                <input type="text" class="form-control" name="price" required>
            </div>
            <br>

            <div class="col-12">
                <input type="submit" value="Enviar" class="btn btn-default">
            </div>
            {!! Form::close() !!}
        </div>

        <div class="col-md-12">
            <h3>Listagem de pessoas</h3>

            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Código</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>

                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->getId() }}</td>
                        <td>{{ $product->getName() }}</td>
                        <td>{{ $product->getCode() }}</td>
                        <td>R$ {{ number_format($product->getPrice(), 2, ',', '.')  }}</td>
                        <td>
                            {!! Form::open(['url' => 'product/' . $product->getId(), 'method' => 'delete']) !!}
                            <input type="submit" value="Deletar" class="btn btn-danger">
                            {!! Form::close() !!}

                            <a href="{{ url('product/' . $product->getId() . '/edit') }}" class="btn btn-default">Editar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Nenhum produto encontrado</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>

@endsection
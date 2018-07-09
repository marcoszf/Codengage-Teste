@extends('app.master')

@section('title', 'Pessoas')

@section('content')


    <div class="row">

        <div class="col-md-12">
            <h3>Adicionar Pessoa</h3>

            {!! Form::open(['url' => 'people']) !!}

                <div class="col-6">
                    {{ Form::label('name', 'Nome: ') }}
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="col-6">
                    {{ Form::label('birthday', 'Nascimento:') }}
                    <input type="text" class="form-control" name="birthday" required>
                </div><br>

                <p style="color:darkred"> {{$errors->first() }} </p>

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
                    <th>Data Nascimento</th>
                    <th>Ações</th>
                </tr>

                @forelse($people as $person)
                    <tr>
                        <td>{{ $person->getId() }}</td>
                        <td>{{ $person->getName() }}</td>
                        <td>123</td>
                        <td>
                            {!! Form::open(['url' => 'people/' . $person->getId(), 'method' => 'delete']) !!}
                                <input type="submit" value="Deletar" class="btn btn-danger">
                            {!! Form::close() !!}
                            <a href="{{ url('people/' . $person->getId() . '/edit') }}" class="btn btn-default">Editar</a>
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
@extends('app.master')

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
                            <a href="{{ url('people-delete/' . $person->getId()) }}" class="btn btn-danger">Deletar</a>
                            <a href="{{ url('people-edit/' . $person->getId()) }}" class="btn btn-default">Editar</a>
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
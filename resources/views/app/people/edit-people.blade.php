@extends('app.master')

@section('content')


    <div class="row">

        <div class="col-md-12">
            <h3>Editar dados Pessoa</h3>

            {!! Form::open(['url' => 'people/' . $people->getId(), 'method' => 'put']) !!}

                <div class="col-6">
                    {{ Form::label('name', 'Nome: ') }}
                    <input type="text" class="form-control" value="{{ $people->getName() }}" name="name" required>
                </div>

                <div class="col-6">
                    {{ Form::label('birthday', 'Nascimento:') }}
                    <input type="text" class="form-control" name="birthday" value="" required>
                </div><br>

                <div class="col-12">
                    <input type="submit" value="Enviar" class="btn btn-default">
                </div>

                {!! Form::close() !!}
        </div>

    </div>

@endsection
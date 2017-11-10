@extends('../template')

@section('title') 
    Dodawanie nowego miasta
@endsection

@section('buttons')
@endsection

@section('content')
    {!! Form::open( [
        'method' => isset($city) ? "put" : "post",
        'route' => isset($city) ? ['cities.update', $city->id] : ['cities.store'],
        'files' => true
    ]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nazwa') !!}
        {!! Form::text('name', Input::old('name') != null ? Input::old('name') : (isset($city) ? $city->name : null), ['class' => 'form-control']) !!}
    </div>

    <a href="{{ route('cities.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Powrót</a>
    {!! Form::button(isset($city) ? '<i class="fa fa-pencil-square-o"></i> Zapisz' : '<i class="fa fa-plus"></i> Dodaj', ['class' => 'btn btn-success', 'type' => 'submit']) !!}
@endsection


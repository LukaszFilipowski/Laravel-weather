@extends('../template')

@section('title') 
    Zarządzanie miastami
@endsection

@section('buttons')
    <a class="btn btn-success" href="{{ route('cities.create') }}"><i class="fa fa-plus"></i> Dodaj nowe miasto</a>
@endsection

@section('content')
    @if (isset($cities[0]))
        <table id="table" class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city) 
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary btn-margin" href="{{ route('cities.edit', $city->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edytuj</a>
                        <a data-href="{{ route('cities.delete', $city->id) }}" class="btn btn-sm btn-danger btn-margin deletable"><i class="fa fa-trash-o"></i> Usuń</a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    @else
    Aktualnie brak dodanych miast
    @endif
@endsection

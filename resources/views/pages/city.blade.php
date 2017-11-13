@extends('../template')

@section('title') 
    Historia pogody dla {{ $city->name }}
@endsection

@section('content')
    @if (isset($city->weathers[0]))
    
        <table class="table">
            <thead>
                <tr>
                    <th>Temperatura</th>
                    <th>Temperatura odczuwalna</th>
                    <th>Opis</th>
                    <th>Dane szczegółowe</th>
                    <th>Data i godzina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($city->weathers as $weather) 
                    <tr>
                        <td>{{ $weather->temp }}</td>
                        <td>{{ $weather->feel_temp }}</td>
                        <td>{!! $weather->forecast !!} </td>
                        <td>
                            @foreach($weather->params as $param)
                                {!! $param->label.': '.$param->value.'<br/>' !!}
                            @endforeach
                        </td>
                        <td>{{ $weather->created_at }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    @else 
        Aktualnie brak pobranej pogody dla tego miasta.
    @endif
        
@endsection

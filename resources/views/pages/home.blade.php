@extends('../template')

@section('title') 
    Strona główna
@endsection

@section('content')
    
    @foreach ($cities as $city) 
        @if (isset($city->weathers[0]))
            <div class="col-sm-4">
                <div id="card" class="weater">
                    <div class="city-selected">
                        <article>

                            <div class="info">
                                    <div class="city"><span>Miasto:</span> <a href="{{ route('pages.city', $city->id) }}">{{ $city->name }}</a></div>
                                    <div class="night"></div>

                                    <div class="temp">{{ $city->weathers[0]->temp }}</div>

                                    <div class="wind">
                                            Odczuwalna

                                            <span>{{ $city->weathers[0]->feel_temp }}</span>
                                    </div>
                            </div>

                            <div class="icon">
                                {!! $city->weathers[0]->forecast !!}
                            </div>

                        </article>

                            <figure style="background-image: url(http://136.243.1.253/~creolitic/bootsnipp/home.jpg)"></figure>
                    </div>

                    <div class="days">
                        <div class="row row-no-gutter">
                            @foreach ($city->weathers[0]->params as $param) 
                                <div class="col-md-4">
                                        <div class="day">
                                                <h1>{{ $param->label }}</h1>
                                                {{ $param->value }}
                                        </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
        
@endsection

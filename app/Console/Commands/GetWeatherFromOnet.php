<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\City;

class GetWeatherFromOnet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getWeatherFrom:Onet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get weather from pogoda.onet.pl';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $cities = City::all();
        
        foreach ($cities as $city) {
            $city->getWeatherForCity();
        }
    }
}

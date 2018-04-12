<?php

namespace App\Controller;

use App\GoogleApi\WeatherService;
use App\Model\NullWeather;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class WeatherController extends AbstractController
{
    public function index($day)
    {

        try {
            $fromGoogle = new WeatherService();
            $weather = $fromGoogle->getDay(new \DateTime($day));
        } catch (\Exception $exp) {
            $weather = new NullWeather();
        }

        // išprintinti, kad negeras datos formatas. Parašyti datos validaciją. Sukurti servisus.
        // MVC model, controller, ... tutorials.

        return $this->render('weather/index.html.twig', [
            'weatherData'=> [
                'date'      => $weather->getDate()->format('Y-m-d'),
                'dayTemp'   => $weather->getDayTemp(),
                'nightTemp' => $weather->getNightTemp(),
                'sky'       => $weather->getSky()
            ]
        ]);
    }
}

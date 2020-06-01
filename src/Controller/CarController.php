<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarController extends AbstractController
{
    /**
     * @Route("/cars", name="cars_index")
     */
    public function index(CarRepository $repo)
    {
        $cars = $repo->findAll();

        return $this->render('car/cars.html.twig', [
            'cars' => $cars
        ]);
    }

    /**
     * Permet de créer un vehicule
     * @Route("/cars/new", name="cars_create")
     *
     * @return response
     */
    public function create()
    {
        return $this->render('car/newcar.html.twig');
    }

    /**
     * Permet d'afficher un seul véhicule avec detail
     * 
     * @Route("/cars/{slug}", name="car_show")
     * 
     */
    public function show($slug, Car $car)
    {
       return $this->render('car/vehiculedetails.html.twig',[
            'car' => $car
        ]);
    }

    
    
}

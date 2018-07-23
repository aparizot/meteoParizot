<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Meteo;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $cities = $em->getRepository('AppBundle:Meteo')->findAll();

        if(empty($cities))
        {
            $cities = new Meteo();
            $cities->setCity('London');
            $cities->setCountry('uk');
            $em->persist($cities);

            $cities2 = new Meteo();
            $cities2->setCity('Paris');
            $cities2->setCountry('fr');
            $em->persist($cities2);

            $cities2 = new Meteo();
            $cities2->setCity('Cairo');
            $cities2->setCountry('eg');
            $em->persist($cities2);

            $cities3 = new Meteo();
            $cities3->setCity('Cork');
            $cities3->setCountry('ie');
            $em->persist($cities3);

            $cities4 = new Meteo();
            $cities4->setCity('Oxford');
            $cities4->setCountry('us');
            $em->persist($cities4);

            $cities5 = new Meteo();
            $cities5->setCity('Agadir');
            $cities5->setCountry('ma');
            $em->persist($cities5);

            $cities6 = new Meteo();
            $cities6->setCity('Sydney');
            $cities6->setCountry('au');
            $em->persist($cities6);

            $cities7 = new Meteo();
            $cities7->setCity('Oslo');
            $cities7->setCountry('no');
            $em->persist($cities7);
            $em->flush();

            $cities = $em->getRepository('AppBundle:Meteo')->findAll();
        }

        return $this->render('\default\index.html.twig', 
        array ('cities' => $cities));
    }

    /**
     * @Route("/city/{name}", name="meteoCity")
     */
    public function meteoCityAction(Request $request, $name)
    {
        $em = $this->getDoctrine()->getManager();

        $city = $em->getRepository('AppBundle:Meteo')->findOneByCity($name);

        $meteoCity = $city->MeteoCitySelect();

        return $this->render('\default\city.html.twig', 
        array ('meteoCity' => $meteoCity));
    }
}

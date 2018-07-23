<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meteo
 *
 * @ORM\Table(name="meteo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MeteoRepository")
 */
class Meteo
{

    const API_KEY = '90b4d095de9f3e7292269dc40ce3d683';


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Utilise le nom de la ville sélectionnée pour executer une requête à l'API météo
     *
     */
    public function MeteoCitySelect()
    {
         $ch = curl_init(); 

        curl_setopt($ch, CURLOPT_URL, 'api.openweathermap.org/data/2.5/weather?q='.$this->getCity().','.$this->getCountry().'&&units=metric&APPID=90b4d095de9f3e7292269dc40ce3d683'); 

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        $output = curl_exec($ch); 

        curl_close($ch);

        $result = json_decode($output, true);

        return $result;

    }
}


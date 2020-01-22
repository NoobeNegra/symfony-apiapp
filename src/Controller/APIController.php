<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class APIController
{
    private $informationArray = array(
        array(
            'surname' => 'Barnard',
            'name' => 'Shanelle',
            'age' => '17',
            'sex' => 'F',
            'alias' => 'Aesthetical Ardala',
            'favorite_color' => 'bright purple',
        ),
        array(
            'surname' => 'Sparrow',
            'name' => 'Kayden',
            'age' => '09',
            'sex' => 'NonBinary',
            'alias' => 'Nanutria',
            'favorite_color' => 'maroon',
        ),
        array(
            'surname' => 'Chandler',
            'name' => 'Maksymilian',
            'age' => '30',
            'sex' => 'M',
            'alias' => 'Charming Helge',
            'favorite_color' => 'cyan',
        ),
        array(
            'surname' => 'Glass',
            'name' => 'Imogen',
            'age' => '50',
            'sex' => 'F',
            'alias' => 'Weentrat',
            'favorite_color' => 'cyan',
        ),
        array(
            'surname' => 'Kirk',
            'name' => 'Saima',
            'age' => '42',
            'sex' => 'M',
            'alias' => 'Fousteme60',
            'favorite_color' => 'blue',
        ),
        array(
            'surname' => 'Swanson',
            'name' => 'Madina',
            'age' => '21',
            'sex' => 'F',
            'alias' => 'Bearld',
            'favorite_color' => 'green',
        ),
        array(
            'surname' => 'Roche',
            'name' => 'Judah',
            'age' => '23',
            'sex' => 'M',
            'alias' => 'Ireetwent',
            'favorite_color' => 'beige',
        ),
        array(
            'surname' => 'Morley',
            'name' => 'Gregor',
            'age' => '08',
            'sex' => 'M',
            'alias' => 'Ambateractly',
            'favorite_color' => 'violet',
        ),
        array(
            'surname' => 'Mcintosh',
            'name' => 'Pippa',
            'age' => '12',
            'sex' => 'F',
            'alias' => 'Theman',
            'favorite_color' => 'teal',
        ),
        array(
            'surname' => 'Parrish',
            'name' => 'Lilly',
            'age' => '24',
            'sex' => 'M',
            'alias' => 'Sucer1956',
            'favorite_color' => 'deep red',
        ),
    );
    /**
     * @Route("/api/get-info/{count}", methods={"GET"})
     */
    public function getDummyInformation(Request $request)
    {
        $response = new Response('', Response::HTTP_OK, ['content-type' => 'application/json']);
        if(!is_numeric($request->attributes->get('count'))){
            $response->setContent(json_encode([
                'error' => 'Why are you doing this?',
            ]));
            return $response;
        }
        
        $requiredInfo = intval($request->attributes->get('count'));
        if (!$requiredInfo){
            $response->setContent(json_encode([
                'error' => 'Ask for at least 1',
            ]));
            return $response;
        }
        
        if ($requiredInfo > count($this->informationArray)){
            $response->setContent(json_encode([
                'error' => 'Theres just so much in our database, try 5',
            ]));
            return $response;
        }
        
        $allMyData = 0;
        $returnArray = array();
        while ($allMyData < $requiredInfo){
            $randomNumber = rand (0 , count($this->informationArray) -1);
            if (isset ($returnArray[$randomNumber]))
                continue;
            $returnArray[$randomNumber] = $this->informationArray[$randomNumber];
            $allMyData++;
        }
        $response->setContent(json_encode([
            'success' => array_values($returnArray),
        ]));
        return $response;
    }
}


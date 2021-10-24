<?php
namespace App\Controllers;

Use Psr\Http\Message\ServerRequestInterface;
Use Psr\Http\Message\ResponseInterface;
use App\Model\Personnage as Personnage;

class PagesController {

    function home(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        
        $moi = new Personnage();

        
        $data = array(
            'success' => 1, 
        );
    
        return $response->withJson($data);
    }

    function home2(ServerRequestInterface $request, ResponseInterface $response)
    {
        $allPostPutVars = $request->getParsedBody();
        
        $moi = new Personnage();
        $sante = $moi->getsante();
        
        $data = array(
            'success' => 1, 
            'message' => $sante,
        );
    
        return $response->withJson($data);
    }

    
}






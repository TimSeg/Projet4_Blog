<?php


namespace App\config;
use Exception;
use App\src\controller\FrontController;

class Router
{
    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'post'){
                    require '../templates/single.php';
                }
                else{
                    echo 'page inconnue';
                }
            }
            else{
                $frontController = new FrontController();
                $frontController->home();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }
}
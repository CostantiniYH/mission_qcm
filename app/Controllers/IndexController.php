<?php
namespace App\Controllers\Public;
use App\Views\Components\Base;
use App\Views\Components\Carousel;
use App\Views\Components\Form;

class IndexController {
    
    public function index() {
        $car = new Carousel();

        ob_start();
        require_once dirname(dirname(__DIR__)) . '/Views/index.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';

    }

    public function contact() {

        ob_start();
        require_once dirname(__DIR__) . '/Views/contact.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/Views/partials/layout.php';

    }
}
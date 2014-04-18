<?php
/**
 * Simple MVC
 *
 * @licence Mit licence
 * @author Nicola Pietroluongo
 * @version 1.0
 * @copyright Nicola Pietroluongo, 05/04/2012
 **/
require('Classes/Autoloader/Autoloader.php');

use Classes\Controller\Controller;
use Classes\Template\Template;

class MainController extends Controller
{
    private $template; 

    public function __construct($templateName)
    {
        $this->template = new Template($templateName);
    }

    public function index()
    {
        $this->template->render('index');
    }
}

$controller = new MainController('default');
$controller->route();

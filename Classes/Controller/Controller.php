<?php
/**
 * Abstract class for a default controller
 **/

namespace Classes\Controller;

abstract class Controller 
{
    private $command; 
    private $requestUri;
    private $scriptName; 
    
    /**
     * get the uri, explode the content and provide the correct method
     **/
    public function route() 
    {
        $this->getRequestUri();
        $this->setCommand();
        if(!isset($this->command[0]) || $this->command[0] == "") {
            $this->index();
        } else {
            $this->callOnePArameterMethod();
        }
    }
    
    private function getRequestUri() 
    {
        $this->requestUri = explode('/', $_SERVER['REQUEST_URI']);
        $this->scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
    }

    private function setCommand() 
    {
        for($i= 0;$i < sizeof($this->scriptName);$i++) {
            if ($this->requestUri[$i] == $this->scriptName[$i]) {
                unset($this->requestUri[$i]);
            }
        }
        $this->command = array_values($this->requestUri);
    }

    /**
     * this routing system expects only one parameters
     **/
    private function callOneParameterMethod() 
    {
        $method = $this->command[0];
        $parameter = $this->command[1];
        $this->$method($parameter);
    }

    abstract public function index();
}

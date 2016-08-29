<?php
/* 
 * Project: newsletter
 * File: /controllers/basecontroller.php
 * Purpose: abstract class from which controllers extend
 * Author: ThinkPad
 */

abstract class BaseController {
    
    protected $urlValues;
    protected $action;
    
    public function __construct($action, $urlValues) {
        $this->action = $action;
        $this->urlValues = $urlValues;
    }
        
    //executes the requested method
    public function executeAction() {
        return $this->{$this->action}();
    }
}

?>

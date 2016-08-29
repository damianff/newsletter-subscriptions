<?php
/* 
 * Project: newsletter
 * File: /controllers/error.php
 * Purpose: controller for the URL access errors of the app.
 * Author: ThinkPad
 */

class ErrorController extends BaseController
{
    //bad URL request error
    protected function badURL()
    {
        View::render("error/badurl");
    }
}

?>

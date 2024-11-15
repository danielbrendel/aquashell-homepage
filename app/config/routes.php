<?php

/*
    Asatru PHP - routes configuration file

    Add here all your needed routes.

    Schema:
        [<url>, <method>, controller_file@controller_method]
    Example:
        [/my/route, get, mycontroller@index]
        [/my/route/with/{param1}/and/{param2}, get, mycontroller@another]
    Explanation:
        Will call index() in app\controller\mycontroller.php if request is 'get'
        Every route with $ prefix is a special route
*/

return [
    array('/', 'GET', 'index@index'),
    array('/index', 'GET', 'index@index'),
    array('/download', 'GET', 'index@download'),
    array('/examples', 'GET', 'index@examples'),
    array('/plugins', 'GET', 'index@plugins'),
    array('/documentation', 'GET', 'index@documentation'),
    array('/tutorials', 'GET', 'index@tutorials'),
    array('/code/editor', 'GET', 'index@code_editor'),
    array('/code/run/local', 'POST', 'index@code_run_local'),
    array('/code/run/remote', 'POST', 'index@code_run_remote'),
    array('/sitemap', 'GET', 'index@sitemap'),
    array('$404', 'ANY', 'error404@index')
];

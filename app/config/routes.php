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
    array('/snippets', 'GET', 'snippets@index'),
    array('/snippets/category/{name}', 'GET', 'snippets@listing'),
    array('/snippets/show/{id}/{slug}', 'GET', 'snippets@show'),
    array('/plugins', 'GET', 'index@plugins'),
    array('/documentation', 'GET', 'index@documentation'),
    array('/tutorials', 'GET', 'index@tutorials'),
    array('/code/editor', 'GET', 'editor@code_editor'),
    array('/code/run/local', 'POST', 'editor@code_run_local'),
    array('/code/run/remote', 'POST', 'editor@code_run_remote'),
    array('/sitemap', 'GET', 'index@sitemap'),
    array('$404', 'ANY', 'error404@index')
];

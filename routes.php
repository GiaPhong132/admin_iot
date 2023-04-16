<?php
$pages = array(
    'error' => ['errors'],
    'main' => ['layouts', 'about', 'services', 'login', 'register', 'profile'],
    'admin' => ['layouts', 'members', 'products', 'news', 'comments']
);
$controllers = array(
    'errors' => ['index'],
    'layouts' => ['index'],

    'members' => ['index', 'addUser', 'edit', 'getAll'],
    'products' => ['index', 'add', 'edit', 'delete', 'getAll'],
    'news' => ['index', 'add', 'edit', 'delete', 'hide'],
    'comments' => ['index', 'hide', 'add', 'edit', 'delete'],
    'admin' => ['index', 'add', 'edit', 'delete'],
    'user' => ['index', 'add', 'editInfo', 'editPass', 'delete'],
    'company' => ['index', 'add', 'edit', 'delete'],
    'login' => ['index', 'check', 'logout'],

    'about' => ['index'],
    'services' => ['index'],
    'register' => ['index', 'submit', 'editInfo'],
    'profile' => ['index', 'editInfo'],



    'paginate' => ['index'],
    'paginateuser' => ['index']


);



if (!array_key_exists($page, $pages) || !array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $page = 'error';
    $controller = 'errors';
    $action = 'index';
}
if ($page == 'error') {
    $controller = 'errors';
    $action = 'index';
}

require_once('/xampp/htdocs/admin_iot/controllers/' . $page . "/" . $controller . '_controller.php');

$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();

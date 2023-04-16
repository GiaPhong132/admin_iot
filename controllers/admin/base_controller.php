<?php
class BaseController
{
    protected $folder;

    function render($file, $data = array())
    {
        $view_file = 'views/admin/' . $this->folder . '/' . $file . '.php';
        if (is_file($view_file)) {
            extract($data);
            ob_start();
            require_once('views/admin/header.php');
            require_once('views/admin/sidebar.php');
            require_once('views/admin/footer.php');
            require_once($view_file);
            $content = ob_get_clean();
            require_once('/xampp/htdocs/admin_iot/views/admin/basic_layouts.php');
        } else {
            header('Location: index.php?page=admin&controller=layouts&action=error');
        }
    }
}

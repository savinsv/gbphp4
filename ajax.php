<?php
    $rootDir = $_SERVER['DOCUMENT_ROOT'];
    include_once $rootDir ."/lib/lib.php";

    if ($_SERVER['REQUEST_METHOD']=== 'POST' && $_POST['good']){
        $good = (int)$_POST['good'];

        require_once $rootDir."/lib/Twig/Autoloader.php";
        Twig_Autoloader::register();
    
        try {
            $loader = new Twig_Loader_Filesystem("{$rootDir}/lib/templates");
            $twig = new Twig_Environment($loader);

            $goods = getNrecrds($db,$good,$pack);
            $contentTmpl = $twig->loadTemplate('products.tmpl');
            $content = $contentTmpl->render(array(
              'goods'=> $goods,
            ));
            echo $content;
    
        }catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        };
    
    };
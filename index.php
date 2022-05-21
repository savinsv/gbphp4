<?php
    $rootDir = $_SERVER['DOCUMENT_ROOT'];

    
    include_once $rootDir ."/lib/lib.php";



    $query = create_N_records_Sql($sql,100);
    $countInTable = (int)$db->query("SELECT count(*) FROM `goods`")->fetchColumn();
 
    if ($countInTable === 0 ){
        $countInTable = $db->exec($query);
        echo "Количество добавленныйх записей:". $countInTable;
    }


    require_once $rootDir."/lib/Twig/Autoloader.php";
    Twig_Autoloader::register();


    try {
        $loader = new Twig_Loader_Filesystem("{$rootDir}/lib/templates");
        // инициализируем Twig
        $twig = new Twig_Environment($loader);

           $goods = getNrecrds($db,$id,$pack);  

          $contentTmpl = $twig->loadTemplate('catalog.tmpl');
          $content = $contentTmpl->render(array(
            'header' => 'Все картинки...',
            'goods'=> $goods,
          ));

        // подгружаем шаблон
        $template = $twig->loadTemplate('main.tmpl');
         
        // передаём в шаблон переменные и значения
        // выводим сформированное содержание
        
        $mainTmlp = $template->render(array(
          'rootDir' => $rootDir,
          'style' => $style,
          'title' => 'Каталог',
          'content' => $content,
          'files' => $files,
        ));

        echo $mainTmlp;
        
      } catch (Exception $e) {
        die ('ERROR: ' . $e->getMessage());
      }

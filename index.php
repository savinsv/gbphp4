<?php
    $rootDir = $_SERVER['DOCUMENT_ROOT'];

    include_once $rootDir ."/lib/db/db.php";

    $db = conectDB($connect_str,DB_USER,DB_PASSWORD);

    $sql = "INSERT INTO goods (name,price,description) VALUES ";


    $query = create_N_records_Sql($sql,100);
    $countInTable = (int)$db->query("SELECT count(*) FROM `goods`")->fetchColumn();
 //   var_dump($countInTable === 0);
 //   echo "<br>Записей в таблице: ". $countInTable ."<br>";
 //   echo $query ."<br>";
 
    if ($countInTable === 0 ){
 //       echo "<br> Ноль записей";
        $countInTable = $db->exec($query);
//        echo $db->errorCode();
        echo "Количество добавленныйх записей:". $countInTable;
    }
   
    require_once $rootDir."/lib/Twig/Autoloader.php";
    Twig_Autoloader::register();


    try {
        $loader = new Twig_Loader_Filesystem("{$rootDir}/lib/templates");
        // инициализируем Twig
        $twig = new Twig_Environment($loader);
           $id = 0; 
          $sql_get ="SELECT * FROM goods WHERE id > $id LIMIT 10";
          $rows = $db->query($sql_get);
          $goods = $rows->fetchAll();  

       //  var_dump($files1);   

          $contentTmpl = $twig->loadTemplate('catalog.tmpl');
          $content = $contentTmpl->render(array(
            'header' => 'Все картинки...',
            'goods'=> $goods,
//            'images' => $images,
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

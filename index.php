<?php
require_once('./config.php');

if(!isset($_GET['page'])){
  $page_title = 'Strona główna - default';
  $page_description = 'Opis: Strona główna.';
  $page_url = './views/start.php';
} else {
  switch ($_GET['page']) {
    case 'start':
      $page_title = 'Strona główna - start';
      $page_description = 'Strona główna - opis';
      $page_url = './views/start.php';
      break;

    default:
      $page_title = 'Strona główna - default';
      $page_description = 'Opis: Strona główna.';
      $page_url = './views/start.php';
      break;
  }
}


  include_once('./layout/header.php');
  include_once($page_url);
  include_once('./layout/footer.php');

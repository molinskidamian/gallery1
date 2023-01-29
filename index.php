<?php
ob_start();
function autoload($className)
{
  include './class/' . $className . '.class.php';
}

spl_autoload_register('autoload');

require_once('./config.php');

if (!isset($_GET['page'])) {
  $page_title = 'Strona główna - default';
  $page_description = 'Opis: Strona główna.';
  $page_url = './controllers/start.php';
} else {
  switch ($_GET['page']) {
    case 'install':
      $page_title = 'Instalacja';
      $page_description = 'Instalacja - opis';
      $page_url = './install.php';
      break;
    case 'start':
      $page_title = 'Strona główna - start';
      $page_description = 'Strona główna - opis';
      $page_url = './controllers/start.php';
      break;
    case 'login':
      $page_title = 'Logowanie';
      $page_description = 'Logowanie - opis';
      $page_url = './controllers/login.php';
      break;
    case 'logout':
      $page_title = 'Wylogowanie';
      $page_description = 'Wylogowanie - opis';
      $page_url = './controllers/logout.php';
      break;

    default:
      $page_title = 'Strona główna - default';
      $page_description = 'Opis: Strona główna.';
      $page_url = './controllers/start.php';
      break;
  }
}


include_once('./layout/header.php');
include_once($page_url);
include_once('./layout/footer.php');

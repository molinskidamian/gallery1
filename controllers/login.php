<?php
include_once './connect.php';
if (!$_POST['btn_login']) {
  include './views/login_form.php';
} else {
  echo '<p class="success">Formularz logowania został wysłany</p>';

  $user = new User($_POST['login'], $_POST['password']);
  $user->setSession();
  echo '<p>------------TESTY----------------------</p>';

  if (isset($_SESSION['login'])) {
    echo '<p>Użytkownik: ' . $_SESSION['login'] . ' - <a href="index.php?page=logout">wyloguj</a></p>';
  } else {
    echo '<p>Użytkownik nie jest zalogowany.</p>';
  }

  var_dump($_SESSION);
}

<nav class="main-nav">
  <ul class="main-nav__menu">
    <li class="main-nav__item">
      <a href="index.php?page=start" class="main-nav__link">Strona główna</a>
    </li>
    <li class="main-nav__item">
      <a href="index.php?page=gallery" class="main-nav__link">Galerie</a>
    </li>
    <li class="main-nav__item">
      <a href="index.php?page=contact" class="main-nav__link">Kontakt</a>
    </li>
  </ul>
</nav>

<section class="header-search">
  <form action="">
    <input type="text" name="search" placeholder="Wyszukaj" />
  </form>
</section>

<nav class="user-nav">
  <?php
  if ($_SESSION['login']) {
    echo '<p>Login: ' . $_SESSION['login'] . '</p>';
  ?>

    <ul class="user-nav__menu">
      <li class="user-nav__item"><a href="#">link1</a></li>
      <li class="user-nav__item"><a href="#">link2</a></li>
      <li class="user-nav__item"><a href="#">link3</a></li>
      <li class="user-nav__item"><a href="#">link4</a></li>
      <li class="user-nav__item"><a href="#">link5</a></li>
    </ul>

  <?php
  } else {
  ?>
    <ul class="user-nav__menu">
      <li class="user-nav__item"><a href="index.php?page=login">Zaloguj się</a></li>
      <li class="user-nav__item">|</li>
      <li class="user-nav__item"><a href="index.php?page=register">Załóż konto</a></li>
    </ul>
  <?php
  }
  ?>
</nav>
<?php
class User
{
  private $id;
  private $login;
  private $password;
  private $email;
  private $dateRegister;
  protected $isLogin;
  public $pdo;

  private function connectDb()
  {
    try {
      include './config.php';
      $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $pdo->exec('SET NAMES "utf8"');
      $this->pdo = $pdo;
    } catch (PDOException $e) {
      $output = 'Nie można nawiązać połączenia z bazą danych.<br>' . $e->getMessage() . '<br>' . $e->getLine();
      include_once './views/error.html.php';
      exit();
    }
  }

  function setLogin()
  {
    htmlspecialchars($this->login, ENT_QUOTES, 'UTF-8');
  }

  function setPassword()
  {
    htmlspecialchars($this->password, ENT_QUOTES, 'UTF-8');
  }

  function getLogin(): string
  {
    return $this->login;
  }

  function getPassword(): string
  {
    return $this->password;
  }

  function getId(): string
  {
    return $this->id;
  }

  function getEmail(): string
  {
    return $this->email;
  }

  function getDateRegister(): string
  {
    return $this->dateRegister;
  }

  private function getDateFromDb()
  {
    try {
      $this->connectDb();
      $sql = 'SELECT * FROM users WHERE login=:login && password=:password';
      $s = $this->pdo->prepare($sql);
      $s->bindParam(':login', $this->getLogin(), PDO::PARAM_STR);
      $s->bindParam(':password', MD5($this->getPassword()), PDO::PARAM_STR);
      $s->execute();
    } catch (PDOException $e) {
      $output = 'Wystąpił b nłąd w trakcie przetwarzania danych';
      include './views/error.html.php';
      exit();
    }

    while ($user = $s->fetch()) {
      $users[] = [
        'id' => $user['id'],
        'firstName' => $user['firstName'],
        'lastName' => $user['lastName'],
        'password' => $user['password'],
        'email' => $user['email'],
        'login' => $user['login'],
        'dateRegister' => $user['dateRegister'],
      ];
    }

    // echo '<p>Wykonano: getDateFromDb()</p>';
    $this->setFields($users);
  }

  private function setFields(array $users)
  {
    foreach ($users as $user) {
      $this->login = $user['login'];
      $this->password = $user['password'];
      $this->id = $user['id'];
      $this->email = $user['email'];
      $this->dateRegister = $user['dateRegister'];
    }

    // echo '<p>Wykonano: setFields()</p>';
  }

  public function setSession()
  {
    if (!empty($this->login) && !empty($this->password)) {
      echo '<p class="success">Można ustawić sesję.</p>';
      $_SESSION['login'] = $this->getLogin();
      $_SESSION['id'] = $this->getId();
    } else {
      echo '<p class="error">Nie można ustawić sesji</p>';
    }
  }

  public function destroySession()
  {
    $_SESSION = [];
    session_destroy();
    echo '<p>Użytkownik został wylogowany</p>';
  }

  function __construct(string $login, string $password)
  {
    $this->login = $login;
    $this->password = $password;
    $this->getDateFromDb();
  }
}

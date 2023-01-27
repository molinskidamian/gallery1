<?php

// function connectPath(){
//     return './connect.php';
// }

  try {
    require_once connectPath();
    $sql = 'CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        firstName VARCHAR(255),
        lastName VARCHAR(255),
        password VARCHAR(255)NOT NULL,
        email VARCHAR(255) NOT NULL,
        login VARCHAR(255)NOT NULL,
        dateRegister VARCHAR(255)NOT NULL
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ENGINE=InnoDB';
    $pdo->exec($sql);
} catch (PDOException $e) {
    $output = $e->getMessage() . '<br>' . $e->getline();
    include './views/error.html.php';
    exit();
}

echo '<p class="success">Dodano bazę danych: users</p>';

try {
    require_once connectPath();
    $sql = 'INSERT INTO users SET
                firstName = :firstName,
                lastName = :lastName,
                password = :password,
                email = :email,
                login = :login,
                dateRegister = CURDATE()
                ';
        $s = $pdo->prepare($sql);
        $s->bindValue(':firstName', 'Damian');
        $s->bindValue(':lastName', 'Moliński');
        $s->bindValue(':password', MD5('Damianek87'));
        $s->bindValue(':email', 'tedeer@gmail.com');
        $s->bindValue(':login', 'molik');
        $s->execute();

      } catch (PDOException $e) {
        $output = $e->getMessage() . '<br>' . $e->getline();
        include './views/error.html.php';
        exit();
      }
      echo '<p class="success">Dodano użytkownika <strong>"molik"</strong> do bazy danych.</p>';
?>
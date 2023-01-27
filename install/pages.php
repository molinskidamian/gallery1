<?php

function connectPath(){
    return './connect.php';
}

try {
    require_once connectPath();
    $sql = 'CREATE TABLE IF NOT EXISTS pages (
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        description VARCHAR(255),
        path VARCHAR(255)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ENGINE=InnoDB';
    $pdo->exec($sql);
} catch (PDOException $e) {
    $output = $e->getMessage() . '<br>' . $e->getline();
    include './views/error.html.php';
    exit();
}

echo '<p class="success">Dodano bazę danych: pages</p>';

try {
    require_once connectPath();
    $sql = "INSERT INTO pages ( name, description, path) VALUES ('start', 'Opis: z bazy', './controllers/start.php')";
    $pdo->exec($sql);
} catch (PDOException $e) {
    $output = $e->getMessage() . '<br>' . $e->getline();
    include './views/error.html.php';
    exit();
}

echo '<p class="success">Dodano stronę <strong>"start"</strong> do bazy danych.</p>';

try {
    require_once connectPath();
    $sql = "INSERT INTO pages ( name, description, path) VALUES ('login', 'Opis: z bazy', './controllers/login.php')";
    $pdo->exec($sql);
} catch (PDOException $e) {
    $output = $e->getMessage() . '<br>' . $e->getline();
    include './views/error.html.php';
    exit();
}

echo '<p class="success">Dodano stronę <strong>"login"</strong> do bazy danych.</p>';

try {
    require_once connectPath();
    $sql = "INSERT INTO pages ( name, description, path) VALUES ('logout', 'Opis: z bazy', './controllers/logout.php')";
    $pdo->exec($sql);
} catch (PDOException $e) {
    $output = $e->getMessage() . '<br>' . $e->getline();
    include './views/error.html.php';
    exit();
}

echo '<p class="success">Dodano stronę <strong>"logout"</strong> do bazy danych.</p>';

?>
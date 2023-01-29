<?php
  try {
    include_once './connect.php';
    $sql = 'SELECT id, name, path FROM pages';
    $result = $pdo->query($sql);
  } catch(PDOException $e) {
    $output = $e->getMessage() . '<br>' . $e->getLine();
    include 'error.html.php';
    exit();
  }

  while($row = $result->fetch()){
    $items[] = [
      'id' => $row['id'],
      'name' => $row['name'],
      'path' => $row['path']
    ];
  }
  include_once'./views/main-nav.php';
?>
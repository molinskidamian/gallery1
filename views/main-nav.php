
  <ul class="main-nav">
      <?php foreach($items as $item): ?>
      <li class="main-nav--item"><a class="main-nav--link" href="index.php?page=<?php echo $item['name']; ?>"><?php echo $item['name']; ?></a></li>
      <?php endforeach; ?>
  </ul>

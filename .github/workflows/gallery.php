<?php
$files = glob("uploads/*.png");
?>
<!DOCTYPE html>
<html>
<head><title>Galeri</title></head>
<body>
  <h2>Galeri Foto</h2>
  <?php foreach($files as $f): ?>
      <img src="<?= $f ?>" width="200" style="margin:10px;border:2px solid #333;">
  <?php endforeach; ?>
</body>
</html>
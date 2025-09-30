<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Photobooth</title>
  <style>
    body { text-align: center; }
    video, canvas { border: 2px solid #333; border-radius: 10px; }
    .btn { padding: 10px; background: navy; color: white; border-radius: 8px; }
  </style>
</head>
<body>
  <h2>Ambil Foto</h2>
  <video id="video" autoplay playsinline width="400" height="300"></video>
  <br>
  <button class="btn" id="snap">📸 Capture</button>
  <form method="POST" action="save_photo.php">
    <input type="hidden" name="photo" id="photoData">
    <button class="btn" type="submit">💾 Simpan</button>
  </form>
  <canvas id="canvas" width="400" height="300"></canvas>

<script>
  const video = document.getElementById('video');
  const canvas = document.getElementById('canvas');
  const context = canvas.getContext('2d');
  const snap = document.getElementById('snap');
  const photoData = document.getElementById('photoData');

  navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => { video.srcObject = stream; });

  snap.addEventListener("click", () => {
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    photoData.value = canvas.toDataURL('image/png');
  });
</script>
</body>
</html>
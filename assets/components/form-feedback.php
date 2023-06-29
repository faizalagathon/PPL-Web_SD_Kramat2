<?php
$indexTerakhir = array_key_last(explode('/', $_SERVER['REQUEST_URI']));
$dir = '../';
if (array_search('home.php', explode('?', explode('/', $_SERVER['REQUEST_URI'])[$indexTerakhir])) === 0) {
  $dir = '';
}
if (array_search('galeri.php', explode('?', explode('/', $_SERVER['REQUEST_URI'])[$indexTerakhir])) === 0) {
  $dir = '../../';
}

if (isset($_POST['btnFeedback'])) {
  date_default_timezone_set('Asia/Jakarta');
  $timestamp = date("Y-m-d h:i:s");
  $insertFeedback = mysqli_query($link, "INSERT INTO feedback VALUES(NULL, '$_POST[email]', '$_POST[feedback]', '$timestamp')");
  if ($insertFeedback) {
    echo "
    <script>
      alert('Berhasil Mengirim Feedback')
    </script>
    ";
  } else {
    echo "
    <script>
      alert('Gagal Mengirim Feedback')
    </script>
    ";
  }
  // var_dump(date('Y-m-d h:m:s'));
}
?>

<div class="container" id="feedback">
  <div class="py-5">
    <div class="" style="background: url(<?= $dir ?>assets/imgs/bg5.jpg);background-size: cover; border-radius: 2rem;">
      <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6 ms-auto">
          <div class="feedback">
            <form action="" class="m-auto mt-3 p-3" method="POST">
              <h3 class="border-bottom border-2 border-dark mb-5">FeedBack</h3>
              <div class="mb-2">
                <label class="form-label" for="username" style="display: block;">Email :</label>
                <input type="email" class="form-control" name="email" id="username">
              </div>
              <div class="mb-4">
                <label class="form-label" for="password" style="display: block;">Pesan :</label>
                <textarea class="form-control" name="feedback" id="" cols="30" rows="6"></textarea>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary rounded-pill px-5 border-0 fw-bold mb-3" data-bs-target="#pesan" data-bs-toggle="modal" style="background: linear-gradient(120deg,#00ccff,#0036cb);" name="btnFeedback">Kirim</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
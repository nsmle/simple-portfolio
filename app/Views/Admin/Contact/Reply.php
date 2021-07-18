<div class="container bg-bluelight rounded py-3">
  <div class="row bg-content rounded mx-2">
    <div class="col">
      <?= Flasher::flash() ?>
      <h2 class="text-center my-3">Reply Message Contact</h2>
      <form class="my-4 mx-2" method="post" action="<?= BASEURL ?>/admin/contact/replymessage">
        <input type="hidden" name="id" value="<?= $data['contact']['id'] ?>">
        <div class="mb-3">
          <label for="name" class="form-label">To Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?= $data['contact']['name'] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">To Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= $data['contact']['email'] ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="messages" class="form-label">To Message</label>
          <textarea class="form-control" id="messages" name="messages" rows="3" readonly></textarea>
        </div>
        <hr class="my-5">
        <div class="mb-3 text-center">
          <label for="subject" class="form-label">Subject</label>
          <input type="text" class="form-control" id="subject" name="subject" required autocomplete="off" autofocus value="Re: <?= $data['contact']['message'] ?>">
        </div>
        <div class="mb-3 text-center">
          <label for="replyMessage" class="form-label">Reply Message</label>
          <textarea class="form-control" id="replyMessage" name="replyMessage" required rows="7"></textarea>
        </div>
        <a href="<?= BASEURL; ?>/admin/contact/detail/<?= $data['contact']['id'] ?>" class="float-start mb-4 mt-3 btn btn-secondary">Back To Detail Page</a>
        <button type="submit" class="float-end mb-4 mt-3 btn btn-primary">Send</button>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
  document.getElementById('replyMessage').value = "Terima kasih telah menghubungi saya. Apakah ada yang bisa saya bantu?\nDisini saya ingin membalas pesan yang anda kirim dari website nsmle.com.\n";
  document.getElementById('messages').value = "<?= $data['contact']['message'] ?>";
</script>
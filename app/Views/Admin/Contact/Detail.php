<div class="container py-4 rounded bg-bluelight">
  <div class="row mx-1 rounded bg-content">
    <div class="col">
      <?= Flasher::flash() ?>
      <div class="card my-3 bg-bluedark">
        <div class="card-body">
          <h5 class="card-title mt-2 mb-4 text-center"><?= $data['contact']['name'] ?></h5>
          <p class="card-text bg-indie text-center py-2 rounded border-top"><b>Message : </b><?= $data['contact']['message'] ?></p>
          <?php if ( $data['contact']['reply_message'] !== null ) : ?>
          <p class="card-text bg-indie text-center py-2 rounded border-top"><b>Reply Message : </b><?= $data['contact']['reply_message'] ?></p>
          <?php endif; ?>
        </div>
        <ul class="list-group list-group-flush my-3">
          <li class="list-group-item">Email &nbsp;: <b><?= $data['contact']['email'] ?></b></li>
          <li class="list-group-item">Phone : <b><?= $data['contact']['phone'] ?></b></li>
          <li class="list-group-item"><?php $date = strtotime($data['contact']['created_at']); echo date('H:i  -  l, d F Y', $date);  ?></li>
        </ul>
        <div class="card-body text-center">
          <a onclick="VerifyDeleted()" class="card-link btn btn-danger">Delete</a>
          <a href="<?= BASEURL ?>/admin/contact/edit/<?= $data['contact']['id'] ?>" class="card-link btn btn-success">Edit</a>
          <a href="<?= BASEURL ?>/admin/contact/reply/<?= $data['contact']['id'] ?>" class="card-link btn btn-primary">Reply</a>
          <hr>
          <a href="<?= BASEURL ?>/admin/contact" class="card-link btn btn-secondary">Back To Page Contact</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function VerifyDeleted(){
    
    let a = confirm('Anda Yakin Ingin Menghapus Data Contact Dari <?= $data['contact']['name'] ?>?');
    console.log(a);
    if ( a == true) {
      location.href = "<?= BASEURL ?>/admin/contact/deleted/<?= $data['contact']['id'] ?>";
    }
    
  }
</script>
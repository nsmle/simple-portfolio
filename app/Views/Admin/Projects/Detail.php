<div class="container py-4 rounded bg-bluelight">
  <div class="row mx-1 rounded bg-content">
    <div class="col">
      <?= Flasher::flash() ?>
      <div class="card my-3 bg-bluedark">
        <img src="<?= BASEURL ?>/assets/img/project/<?= $data['project']['poster'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $data['project']['name'] ?></h5>
          <p class="card-text"><?= $data['project']['description'] ?>.</p>
          <div class="source-code bg-blue rounded my-2">
            <p class="card-text mt-2"><b>Status : </b><?= $data['project']['status'] ?></p>
          </div>
          <div class="source-code bg-blue rounded my-2">
            <p class="card-text mt-2"><b>Contributor : </b><?= $data['project']['contributor'] ?></p>
          </div>
          <div class="source-code bg-blue rounded my-2">
            <b class="card-text mt-2">Source Code : </b>
            <a href="<?= $data['project']['source_code'] ?>" target="_blank" class="card-text" style="text-decoration:none;"><?= $data['project']['source_code'] ?></a>
          </div>
          <div class="source-code bg-blue rounded my-2">
            <b class="card-text mt-2">Demo : </b>
            <a href="<?= $data['project']['demo'] ?>" target="_blank" class="card-text" style="text-decoration:none;"><?= $data['project']['demo'] ?></a>
          </div>
        </div>
        <div class="card-body text-center">
          <a onclick="VerifyDeleted()" class="card-link btn btn-danger">Delete</a>
          <a href="<?= BASEURL ?>/admin/projects/edit/<?= $data['project']['slug'] ?>" class="card-link btn btn-primary">Edit</a>
          <hr>
          <a href="<?= BASEURL ?>/admin/projects" class="card-link btn btn-secondary">Back To Page Projects</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function VerifyDeleted(){
    
    let a = confirm('Are you sure you want to delete the project with the slug <?= $data['project']['slug'] ?>?');
    console.log(a);
    if ( a == true) {
      location.href = "<?= BASEURL ?>/admin/projects/deleted/<?= $data['project']['slug'] ?>";
    }
    
  }
</script>
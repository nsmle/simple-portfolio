<div class="container bg-bluelight rounded py-3">
  <div class="row bg-content rounded mx-2">
      <?= Flasher::flash() ?>
    <div class="col">
      <h2 class="text-center my-3">Edit Project</h2>
      <form action="<?= BASEURL ?>/admin/projects/editProject" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['project']['id'] ?>">
        <div class="mb-3">
          <label for="name" class="form-label">Name Project</label>
          <input type="text" class="form-control" id="name" name="name" required autocomplete="off" autofocus value="<?= $data['project']['name'] ?>">
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select id="status" class="form-select" name="status" value="<?= $data['project']['status'] ?>">
            <option value="Planning">Planning</option>
            <option value="Development">Development</option>
            <option value="Testing">Testing</option>
            <option value="Production">Production</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="Description" class="form-label">Description</label>
          <textarea class="form-control" id="Description" name="description" required rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="contributor" class="form-label">Contributor</label>
          <input type="text" class="form-control" id="contributor" name="contributor" autocomplete="off" value="<?= $data['project']['contributor'] ?>">
        </div>
        <div class="mb-3">
          <label for="github" class="form-label">Source Code</label>
          <input type="text" class="form-control" id="source_code" name="source_code" autocomplete="off" value="<?= $data['project']['source_code'] ?>">
        </div>
        <div class="mb-3">
          <label for="demo" class="form-label">Demo</label>
          <input type="text" class="form-control" id="demo" name="demo" autocomplete="off" value="<?= $data['project']['demo'] ?>">
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Poster</label>
          <input class="form-control" type="file" id="image" name="poster" value="<?= $data['project']['poster'] ?>">
          <div class="text-center bg-bluedark rounded my-2 preview-img">
            <p class="border-bottom">Preview</p>
            <img src="<?= BASEURL ?>/assets/img/project/<?= $data['project']['poster'] ?>" id="preview" width="100%" alt="<?= $data['project']['name'] ?>">
          </div>
        </div>
        <a class="btn btn-secondary my-3 float-start" href="<?= BASEURL ?>/admin/projects/detail/<?= $data['project']['slug'] ?>">Back To Detail</a>
        <button type="submit" class="btn btn-primary my-3 float-end">Save Change</button>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
  document.getElementById('Description').value = "<?= $data['project']['description'] ?>";
  
  let img = document.getElementById('image');
  img.onchange = function(event) {
     var preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(event.target.files[0]);
      preview.onload = function() {
        URL.revokeObjectURL(preview.src) // free memory
      }
  }
</script>
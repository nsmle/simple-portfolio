<div class="content">
  <div class="container py-3 rounded bg-bluelight justify-content-center">
    <?= Flasher::flash() ?>
    <!-- Start Projcts -->
    <div class="row mx-2 my-4 justify-content-center">
      <button type="button" class="col btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddProject">Add Project</button>
    </div>
    <div class="row bg-content rounded mx-2 mb-5">
      <div class="col">
        <h2 class="text-center my-3">Projects</h2>
      </div>
       <div class="col-10" style="position: relative;width: 100%;overflow: auto;display: block;">
        <table class="table table-responsive table-striped table-bordered border-primary">
          <thead class="bg-bluedark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Thumbnail</th>
              <th style="min-width:150px;" scope="col">Name</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($data['project'] as $project): ?>
            <tr>
              <td style="background-color:rgb(32, 42, 68);"><?= $i++ ?></td>
              <td style="background-color:rgb(32, 42, 68);"><img src="<?= BASEURL ?>/assets/img/project/<?= $project['poster'] ?>" alt="<?= $project['name'] ?>" width="100" /></td>
              <td style="background-color:rgb(32, 42, 68);"><?= $project['name'] ?></td>
              <td style="background-color:rgb(32, 42, 68);"><?= $project['status'] ?></td>
              <td style="background-color:rgb(32, 42, 68);"><a class="btn btn-primary" href="<?= BASEURL ?>/admin/projects/detail/<?= $project['slug'] ?>">Detail</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End Projcts -->
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalAddProject" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-modals">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= BASEURL ?>/admin/projects/addProject" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="mb-3">
          <label for="name" class="form-label">Name Project</label>
          <input type="text" class="form-control" id="name" name="name" required autocomplete="off" autofocus>
        </div>
        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select id="status" class="form-select" name="status">
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
          <label for="contibutor" class="form-label">Contributor</label>
          <input type="text" class="form-control" id="contributor" name="contributor" autocomplete="off" value="Nsmle">
        </div>
        <div class="mb-3">
          <label for="github" class="form-label">Source Code</label>
          <input type="text" class="form-control" id="source_code" name="source_code" autocomplete="off" value="https://github.com/">
        </div>
        <div class="mb-3">
          <label for="demo" class="form-label">Demo</label>
          <input type="text" class="form-control" id="source_code" name="demo" autocomplete="off" value="https://">
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Poster</label>
          <input class="form-control" type="file" id="image" name="poster" required>
          <div class="text-center bg-bluedark rounded my-2 d-none" id="preview-container">
            <p class="border-bottom">Preview</p>
            <img src="<?= BASEURL ?>/assets/img/project/<?= $data['project']['poster'] ?>" id="preview" width="100%" alt="<?= $data['project']['name'] ?>">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
  let prevCon = document.getElementById('preview-container');
  let img = document.getElementById('image');
  img.onchange = function(event) {
      prevCon.classList.remove('d-none');
      prevCon.classList.add('d-block');
      var preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(event.target.files[0]);
      preview.onload = function() {
        URL.revokeObjectURL(preview.src) // free memory
      }
  }
</script>
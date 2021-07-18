<div class="content">
  <div class="container py-3 rounded bg-bluelight justify-content-center">
    <div class="row bg-content rounded mx-2 my-4">
      <div class="col">
        <h2 class="text-center my-3">Contact</h2>
      </div>
      <div class="col-10" style="position: relative;width: 100%;overflow: auto;display: block;">
        <table class="table table-responsive table-striped table-bordered border-primary">
          <thead class="bg-bluedark">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Message</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($data['contact'] as $contact): ?>
            <tr>
              <td style="background-color:rgb(32, 42, 68);"><?= $i++ ?></td>
              <td style="background-color:rgb(32, 42, 68);"><?= $contact['name'] ?></td>
              <td style="background-color:rgb(32, 42, 68);"><?= $contact['message'] ?></td>
              <td style="background-color:rgb(32, 42, 68);"><a href="<?= BASEURL ?>/admin/contact/detail/<?= $contact['id'] ?>" class="btn btn-primary">Detail</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row bg-content rounded mx-2 my-4">
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
  </div>
</div>
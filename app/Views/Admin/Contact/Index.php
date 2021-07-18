<div class="content">
  <div class="container py-3 rounded bg-bluelight justify-content-center">
    <?= Flasher::flash() ?>
    <!-- Start Contact -->
    <div class="row bg-content rounded mx-2 my-5">
      <div class="col">
        <h2 class="text-center my-3">Contact</h2>
        <h6 class="pb-2 mx-2 text-center border-bottom">All Unreplied Contacts</h6>
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
              <td style="background-color:rgb(32, 42, 68);"><a class="btn btn-primary" href="<?= BASEURL ?>/admin/contact/detail/<?= $contact['id'] ?>">Detail</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End Contact -->
    
    <!-- Start Contact All -->
    <div class="row bg-content rounded mx-2 my-5">
      <div class="col">
        <h2 class="text-center my-3">All Contact</h2>
        <h6 class="pb-2 mx-2 text-center border-bottom">All Reply Contacts</h6>
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
            <?php $i=1; foreach ($data['allContact'] as $contact): ?>
            <tr>
              <td style="background-color:rgb(32, 42, 68);"><?= $i++ ?></td>
              <td style="background-color:rgb(32, 42, 68);"><?= $contact['name'] ?></td>
              <td style="background-color:rgb(32, 42, 68);"><?= $contact['message'] ?></td>
              <td style="background-color:rgb(32, 42, 68);"><a class="btn btn-primary" href="<?= BASEURL ?>/admin/contact/detail/<?= $contact['id'] ?>">Detail</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End Contact All -->
  </div>
</div>
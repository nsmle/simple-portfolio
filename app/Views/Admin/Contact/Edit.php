<div class="container bg-bluelight rounded py-3">
  <div class="row bg-content rounded mx-2">
      <?= Flasher::flash() ?>
    <div class="col">
      <h2 class="text-center my-3">Ubah Detail Contact</h2>
      <form class="my-4 mx-2" method="post" action="<?= BASEURL ?>/admin/contact/editContact/<?= $data['contact']['id'] ?>">
        <input type="hidden" name="id" value="<?= $data['contact']['id'] ?>">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?= $data['contact']['name'] ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?= $data['contact']['email'] ?>">
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="number" class="form-control" id="phone" name="phone" value="<?= $data['contact']['phone'] ?>">
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <input type="text" class="form-control" id="message" name="message" rows="3" value="<?= $data['contact']['message'] ?>">
        </div>
        <a href="<?= BASEURL; ?>/admin/contact/detail/<?= $data['contact']['id'] ?>" class="float-start mb-4 mt-3 btn btn-secondary">Back To Detail Page</a>
        <button type="submit" class="float-end mb-4 mt-3 btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
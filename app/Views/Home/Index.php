
<div id="content">

<!-- Jumbotron -->
 <div class="container">
  <section class="jumbotron text-center">
      <img src="<?= BASEURL ?>/assets/img/fikipratama.jpg" alt="Fiki Pratama" width="200" class="rounded-circle img-thumb"/>
      <h1 class="display-4">Fiki Pratama</h1>
      <p class="lead text-muted mt-0">@nsmle</p>
  </section>
</div>
<!-- End Jumbotron -->

<!-- About -->
<section id="about">
  <div class="container">
    <div class="row">
      <div class="col mx-3 bg-bluedark justify-content-center lynn">
        <h2 class="mx-2">About Me</h2>
        <hr>
        <p class="mx-2 my-2">I'm a full stack web developer student, building with native php mvc 8, Bootstrap 5, and Vanilla.js at the moment. Into all projects, and build useful products. All the knowledge and experience that I have is the result of my self-taught learning. I am able to work alone as well as in a team, and I also enjoy learning new things.</p>
        <div class="text-center">
          <a class="btn btn-contact" href="#contact">Contact Me</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End About -->


<!-- Projects -->
<section id="projects">
    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">My Projects</h2>
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 pb-5 pt-3">
            <?php foreach ($data['projects'] as $project): ?>
            <a class="col col-md-6" data-bs-toggle="modal" data-bs-target="#projectModal" onclick="projectModal(<?= $project['id'] ?>)">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('<?= BASEURL ?>/assets/img/project/<?= $project['poster'] ?>');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h2 class="pt-5 mt-5 display-6 lh-1 fw-bold"><?= $project['name'] ?></h2>
                        <?php if ( $project['status'] !== 'Production' ) { ?>
                        <h6 class="mb-4 ">Coming soon</h6>
                        <?php } else { ?>
                        <h6 class="mb-4 ">Ready to try</h6>
                        <?php } ?>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <img src="<?= BASEURL ?>/assets/img/fikipratama.jpg" alt="Fiki Pratama" width="32" height="32" class="rounded-circle border border-white">
                            </li>
                            <li class="d-flex align-items-center">
                                <?php if ($project['status'] == 'Planning') { ?>
                                <i class="bi bi-clipboard-minus me-2"></i>
                                <?php } elseif ($project['status'] == 'Development') {  ?>
                                <i class="bi bi-braces me-2"></i>
                                <?php } elseif ($project['status'] == 'Testing') {  ?>
                                <i class="bi bi-journal-code me-2"></i>
                                <?php } elseif ($project['status'] == 'Production') {  ?>
                                <i class="bi bi-mouse2-fill me-2"></i>
                                <?php } ?>
                                <small><?= $project['status'] ?></small>
                            </li>
                        </ul>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Project -->

<!-- Contact -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col mx-3 bg-bluedark justify-content-center lynn">
        <h2 class="mx-2">Contact Me</h2>
        <hr>
        <div id="form-contact">
         <form class="mx-2">
           <div class="mb-3">
             <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
             <div class="invalid-feedback">
               Please enter your full name.
             </div>
           </div>
           <div class="mb-3">
             <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
             <div class="invalid-feedback">
               Please enter your email address.
             </div>
           </div>
           <div class="mb-3">
             <input type="number" class="form-control" id="phone" name="phone" placeholder="Mobile No" required>
             <div class="invalid-feedback">
               Please enter your mobile phone.
             </div>
           </div>
           <div class="mb-3">
             <textarea class="form-control" id="message" id="message" name="message" placeholder="Message" required rows="3"></textarea>
             <div class="invalid-feedback">
               Please write your message.
             </div>
           </div>
           <button type="button" id="btn-contact" onclick="contactMe()" class="btn float-end btn-contact">Submit</button>
         </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Contact -->

<!-- On The Web -->
<section id="ontheweb">
  <div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom">On The Web</h2>
    <div class="row justify-content-center pb-5 pt-2">
      <a href="https://github.com/nsmle" target="_blank" class="col-11 btn btn-contact"><i class="bi-github" role="img" aria-label="GitHub"></i> Github</a>
      <a href="https://instagram.com/fiki.prtma/" target="_blank" class="col-11 btn btn-contact"><i class="bi-instagram" role="img" aria-label="Instagram"></i> Instagram</a>
      <a href="https://t.me/nsmle" target="_blank "class="col-11 btn btn-contact"><i class="bi-telegram" role="img" aria-label="Telegram"></i> Telegram</a>
    </div>
  </div>
</section>
<!-- End On The Web -->


<!-- Modal Project -->
<div class="modal fade" id="projectModal" tabindex="-1" aria-labelledby="projectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-modals">
      <div class="modal-header">
        <h5 class="modal-title" id="projectModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card bg-bluedark" style="width: 100%;">
          <img src="..." id="poster" class="card-img-top" alt="...">
          <ul class="list-group list-group-flush rounded">
            <li class="list-group-item" id="description"></li>
            <li class="list-group-item" id="status">...</li>
            <li class="list-group-item" id="contributor">...</li>
          </ul>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="#" target="_blank" id="source_code" class="d-none btn btn-success">Source Code</a>
        <a href="#" target="_blank" id="demo" class="d-none btn btn-primary">Demo</a>
      </div>
    </div>
  </div>
</div>

</div>

<script type="text/javascript" charset="utf-8">
function projectModal(id){
    // AJAX FOR SEND DATA ID TO CONTROLLER PROJECT
    $.ajax({
      url: '<?= BASEURL ?>/home/project',
      data: {id : id},
      method: 'post',
      success: function(response){
        jq_json_obj = $.parseJSON(response); //Convert the JSON object to jQuery-compatible
        data = eval(jq_json_obj); 
        document.getElementById('projectModalLabel').innerHTML = data['name'];
        document.getElementById('description').innerHTML = data['description'];
        document.getElementById('poster').src = '<?= BASEURL ?>/assets/img/project/'+data['poster'];
        document.getElementById('status').innerHTML = 'Status : ' + data['status'];
        document.getElementById('contributor').innerHTML = 'Contributor : ' + data['contributor'];
        if ( data['demo'] !== "" ) {
          document.getElementById('demo').classList.remove("d-none");
          document.getElementById('demo').classList.add("d-block");
          document.getElementById('demo').href = data['demo'];
        }
        if ( data['source_code'] !== "" ) {
          document.getElementById('source_code').classList.remove("d-none");
          document.getElementById('source_code').href = data['source_code'];
        }
        console.log(data);
      },
      error: function(msg) {
          console.log(msg);
      }
    });
}
</script>
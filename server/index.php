<?php require_once('includes/header.php'); ?>

<body>
      <?php include('includes/navbarindex.php'); ?>
      <div class="page-header min-vh-75 relative row text-center" style="background-image: url('includes/images/hospital-staff.jpg');">
            <div class="d-flex justify-content-center align-items-center ">     
                  <h1 class="text-center h1-index">Hello ! How can we help you today ?</h1>
            </div>
      </div>

      <div class="container my-4" id="about">
            <br><br><br><br>
            <h2 class="hello mb-2 text-center"><b>Smart Health SH = new Healthcare()</b></h2><br><br>
            <div class="container">
                  <div class="row align-items-center">
                        <div class="col-lg-4 me-auto mb-5 ">
                              <div class="card rounded border-0">
                                    <img class="gif shadow-lg" src="includes/images/director.jpg" alt="GIF" style="height: 80%">
                              </div>
                        </div>
                        <div class="col-lg-7">
                              <h2 style="font-weight: bold">What is Smart Health ?</h2><br>
                              <p class="phack">Smart Health is our solution in combating the bad organisation that romanian hospitals have.</p>
                              <p class="phack">We are two young friends with a big plan. Stay tuned !</p>
                        </div>
                  </div>
            </div>
      </div>

      <div class="teamemb  my-3 py-3" id="team">
            <br><br><br><br>
            <div class="container">
                  <h2 class="mb-5 text-center" style="color:white"><strong>OUR TEAM</strong></h2>
                  <div class="row d-flex justify-content-between g-5 pb-5">
                        <div class="col-12 col-lg-4">
                              <div class="card h-100 border-0 shadow-lg">
                                    <div class="card-header border-0">
                                          <img src="includes/images/mihai.jpg" class="img-fluid shadow-lg" alt="mihnea">
                                    </div>
                                    <div class="card-body border-0">
                                          <h5 class="card-title text-center"><strong>Dr. Andrei Mihai</strong></h5>
                                          <p class="card-text crdtext text-center teammember">Coordonator Centru de Chirurgie Smart Healthcare</p>
                                    </div>
                              </div>
                        </div>
                        <div class="col-12 col-lg-4">
                              <div class="card h-100 border-0 shadow-lg">
                                    <div class="card-header border-0">
                                          <img src="includes/images/arina.jpg" class="img-fluid shadow-lg" alt="dani">
                                    </div>
                                    <div class="card-body border-0">
                                          <h5 class="card-title text-center"><strong>Dr. Arina</strong></h5>
                                          <p class="card-text text-center crdtext teammember">Director Medical Smart Healthcare</p>
                                    </div>
                              </div>
                        </div>
                        <div class="col-12 col-lg-4">
                              <div class="card h-100 border-0 shadow-lg">
                                    <div class="card-header border-0">
                                          <img src="includes/images/mihai.jpg" class="img-fluid shadow-lg" alt="mihnea">
                                    </div>
                                    <div class="card-body border-0">
                                          <h5 class="card-title text-center"><strong>Dr. Mihai Andrei</strong></h5>
                                          <p class="card-text crdtext text-center teammember">Chirurg de Excelenta Smart Healthcare</p>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <div class="faaq my-5 py-5" id="faq">
            <div class="container">
                  <br><br><br>
                  <h2 class="mb-5 text-center"><strong>Frequently Asked Questions</strong></h2>
                  <div class="row text-center">
                        <p class="text-center">
                              <button class="btn btn-dark btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#who" aria-expanded="false" aria-controls="collapseExample">
                                    Who are you ?
                              </button>
                        </p>
                        <div class="collapse" id="who">
                              <div class="card card-body bg-dark border-0 shadow-lg mb-3">
                                    <ul class="list-group border-0">
                                          <li class="list-group-item border-0 teammember">We are two young highschoolers studying at the National College of Computer Science "Grigore Moisil" Brașov !</li>
                                    </ul>
                              </div>
                        </div>

                        <p class="text-center">
                              <button class="btn btn-dark btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#what" aria-expanded="false" aria-controls="collapseExample">
                                    What is Smart Healh?
                              </button>
                        </p>
                        <div class="collapse" id="what">
                              <div class="card card-body bg-dark border-0 shadow-lg mb-3">
                                    <ul class="list-group border-0">
                                          <li class="list-group-item border-0 teammember">Smart Health is our solution in combating the bad organisation that romanian hospitals have.</li>
                                    </ul>
                              </div>
                        </div>

                        <p class="text-center">
                              <button class="btn btn-dark btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#why" aria-expanded="false" aria-controls="collapseExample">
                                    Why Smart Health ?
                              </button>
                        </p>
                        <div class="collapse" id="why">
                              <div class="card card-body bg-dark border-0 shadow-lg mb-3">
                                    <ul class="list-group border-0">
                                          <li class="list-group-item border-0 teammember">Well I started to outline this idea after I have been hospitalized for a few days. I saw with my own eyes how disorganised some of the hospital staff were and this certainly did not inspire me with confidence :(</li>
                                    </ul>
                              </div>
                        </div>

                        <p class="text-center">
                              <button class="btn btn-dark btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#next" aria-expanded="false" aria-controls="collapseExample">
                                    What's next ?
                              </button>
                        </p>
                        <div class="collapse" id="next">
                              <div class="card card-body bg-dark border-0 shadow-lg mb-3">
                                    <ul class="list-group border-0">
                                          <li class="list-group-item border-0 teammember">We will continue this project. We will migrate it to some newwer technologies, implement the assistance and creating appointments functions, implement the smart hospital rooms for the hospitalized patients and more !</li>
                                    </ul>
                              </div>
                        </div>
                  </div>
            </div>
      </div>

      <div class="text-center mt-4 map" style="margin-bottom: -1rem">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d89245.2035118213!2d25.526423254662674!3d45.65257669660959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b35b862aa214f1%3A0x6cf5f2ef54391e0f!2zQnJhyJlvdg!5e0!3m2!1sro!2sro!4v1669492505566!5m2!1sro!2sro" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
     
</body>
<?php require_once('includes/footer.php'); ?>
<nav class="navbar navbar-light shadow-lg fixed-top">
      <div class="container-fluid">
            <a class="navbar-brand text-white justify-content-between" href="index.php">
                  <img src="includes/images/logo.png" class="logo" alt="logo">
                  <strong style="font-size: 3.2vmin">Smart Health</strong>
            </a>
            <button class="navbar-toggler align-self-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" style="filter:invert(1)">
                  <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                  <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dashboard</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1  pe-3">
                              <li class="nav-item ">
                                    <a class="nav-link  color1  active text-white" aria-current="page" href="assistp.php">
                                          <button class="btn text-white border-0 me-2" type="button"><b>Assistance</b></button>
                                    </a>
                              </li>
                              <li class="nav-item ">
                                    <a class="nav-link  color1  active text-white" aria-current="page" href="patient-call.php">
                                          <button class="btn text-white border-0 me-2" type="button"><b>Nurse call</b></button>
                                    </a>
                              </li>
                              <li class="nav-item ">
                                    <a class="nav-link  color1  active text-white" aria-current="page" href="logout.php">
                                          <button class="btn text-white border-0 me-2" type="button"><b>Log out</b></button>
                                    </a>
                              </li>
                        </ul>
                  </div>
            </div>
      </div>
</nav>
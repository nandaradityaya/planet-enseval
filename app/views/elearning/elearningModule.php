<body class="body-elearning">
<!-- E-Learning -->
<section class="section-popular mt-5" id="popular">
  <div class="container">
    <div class="row">
      <div class="col text-center section-popular-heading">
        <h2>Neop General</h2>
      </div>
    </div>
  </div>
</section>

<!-- Floating Button -->
<button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
  <img src="/public/assets/ic-arrow-up.png" alt="" width="24" />
</button>
<!-- Floating Buttonnn -->

<section class="section-popular-neop" id="popularNeop">
  <?php 
    $i=0;
    foreach ($data['elearningModule'] as $module) {
      echo '<div class="container">
              <div class="section-popular-neop row justify-content-center" style="margin-top: 7vh">
                <button class="btn-collapse-neop" type="button" data-bs-toggle="collapse" data-bs-target="#' . $module['elearningModuleId'] . '"
                  aria-expanded="false" aria-controls="collapseGrooming" onclick="toggleCollapse(event)">
                  ' . $module['judul'] . '
                  <i class="fa-chevron-up fa arrow-button"></i>
                </button>
                <div class="collapse show" id="' . $module['elearningModuleId'] . '">';
      if(isset($data['elearningLesson'][$i])) {
        foreach($data['elearningLesson'][$i] as $lesson) {
          echo    '<div class="card card-neop-general mt-5">
                    <div class="row">
                      <div class="col-lg-4 text-center align-self-center">
                        <img src="/public/images/post test.png" alt="" class="py-4 ms-2" width="300" height="200" />
                      </div>
                      <div class="col card-title-neop align-self-lg-center flex-column flex-lg-row mt-4 ms-2">
                        <a href="">
                          <h3>' . $lesson['judul'] . '</h3>
                        </a>
                        <p class="mt-3">' . $_SESSION['user']['nik'] . '</p>
                        <ul class="d-lg-flex list-nilai-test">

                          <li class="percobaan-non-test">
                            <p> My Attempts : 3</p>
                          </li>


                          <a href="' . BASEURL . 'elearning/elearningLesson?elearningLessonId=' . $lesson['elearningLessonId'] . '"><button type="button" class="btn btn-start-resp-non-test">
                              Start
                            </button></a>

                        </ul>
                      </div>
                    </div>
                  </div>';
        }
        if(isset($data['elearningTest'][$i]) && !is_bool($data['elearningTest'][$i])) {
          // echo $data['elearningTest'][$i]['judul'];
          echo '<div class="card card-neop-general mt-5">
                  <div class="row">
                    <div class="col-lg-4 text-center align-self-center">
                      <img src="/public/images/post test.png" alt="" class="py-4 ms-2" width="300" height="200" />
                    </div>
                    <div class="col card-title-neop align-self-lg-center flex-column flex-lg-row mt-4 ms-2">
                      <div class="d-flex align-items-center">
                        <a href="">
                          <h3>Digital Awareness Neop Post Test</h3>
                        </a>
                        <p class="ms-auto mt-2 nik-post-test">'. $_SESSION['user']['nik'] . '</p>
                      </div>
                      <!-- CODINGAN LAMA -->
                      <ul class="d-lg-flex list-nilai-test">
                        <li class="nilai">
                          <p> My Score : 90</p>
                        </li>
                        <li class="percobaan">
                          <p> My Attempts : 3</p>
                        </li>
                      </ul>
                      <!-- Pembatas -->
                      <ul class="d-lg-flex list-nilai-test">
                        <li class="kondisi">
                          <p> My Status : <span>Lulus</span></p>
                        </li>
                        <li class="time">
                          <p>11 January 2022</p>
                        </li>
  
                        <a href="' . BASEURL . 'elearning/elearningTest?elearningModuleId=' . $module['elearningModuleId'] . '&elearningTestId=' . $data['elearningTest'][$i]['elearningTestId'] . '"><button type="button" class="btn btn-start-resp">
                            Start
                          </button></a>
                      </ul>
                      <!-- End Codingan lama -->
                    </div>
                  </div>
                </div>';
        }
          echo'</div>
              </div>
            </div>';
        $i = $i+1;
      }
      
    }
  ?>
  

</section>
</body>
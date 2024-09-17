@extends('layouts.public')

@section('title', 'Professionnels | Geeks')

@section('content')
<section class="bg-light" style="background: linear-gradient(to right top, #0470B8, #023252), no-repeat right; background-size: auto; background-position: right; height: 300px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 text-center">
                <h1 class="display-2 text-white">TROUVEZ UN PROFESSIONEL</h1>
                
           </div>
        </div>
    </div>
</section>
<br>
<div class="container">
<div class="row justify-content-center ">
                    <div class="col-md-12 col-lg-12" style="background:#0470B843; padding: 20px; ">
                        <div class="row g-3">
                        <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Localisation">
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="categorie">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
 

<section class="py-xl-8 py-6">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 mx-auto">
        <div class="d-flex flex-column gap-2 text-left mb-xl-7 mb-5">
          <h2 class="mb-0 h1 text-left">Categories</h2>
          <p class="mb-0 text-left">Choisissez une catégorie pour explorer les professionnels disponibles</p>
          </div>
      </div>
    </div>
    <div class="position-relative">
      <ul class="controls" id="sliderFirstControls" aria-label="Carousel Navigation" tabindex="0">
        <li class="prev" aria-controls="tns1" tabindex="-1" data-controls="prev">
          <i class="fe fe-chevron-left"></i>
        </li>
        <li class="next" aria-controls="tns1" tabindex="-1" data-controls="next">
          <i class="fe fe-chevron-right"></i>
        </li>
      </ul>
      <div class="tns-outer" id="tns1-ow">
        <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">11 to 14</span> of 10</div>
        <div id="tns1-mw" class="tns-ovh">
          <div class="tns-inner" id="tns1-iw">
            <div class="sliderFirst tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns1" style="transform: translate3d(-50%, 0px, 0px);">
              <div class="item tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
                <!-- Remplacez ce code avec le code de la carte -->
                  <!--card-->
                  <div class="card  rounded-4 card-bordered ">
                    <div class="p-3 d-flex flex-column gap-3">
                      <!--img-->
                      <a href="mentor-single.html">
                        <img src="../assets/images/mentor/mentor-img-1.jpg" alt="mentor 1" class="img-fluid w-100 rounded-4">
                      </a>
                      <!--content-->
                      <div class="d-flex flex-column gap-4">
                        <div class="d-flex flex-column gap-2">
                          <div>
                            <div class="d-flex align-items-center gap-2">
                              <h3 class="mb-0">
                                <a href="mentor-single.html" class="text-reset">Akshay Sharma</a>
                              </h3>
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"></path>
                                </svg>
                              </span>
                            </div>
                            <span class="text-gray-800">Plombier</span>
                          </div>
                          <div class="d-flex align-items-center justify-content-between fs-6">
                            <div>
                              <span>Abidjan</span>
                              <div class="vr mx-2 text-gray-200"></div>
                              <span>Cocody</span>
                            </div>
                            <div class="d-flex gap-1 align-items-center lh-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                              </svg>
                              <span class="fw-bold text-dark">5.0</span>
                              <span>(12 avis)</span>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center">
                          <div>
                            <span>A partir de</span>
                            <div class="d-flex flex-row gap-1 align-items-center">
                              <span class="fs-6">30.000 CFA/ mois</span>
                            </div>
                          </div>
                          <div>
                            <a href="#!" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#signupModal">Voir le profil</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Fin du code de la carte -->
              </div>


              <div class="item tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
                <!-- Remplacez ce code avec le code de la carte -->
                  <!--card-->
                  <div class="card  rounded-4 card-bordered ">
                    <div class="p-3 d-flex flex-column gap-3">
                      <!--img-->
                      <a href="mentor-single.html">
                        <img src="../assets/images/mentor/mentor-img-1.jpg" alt="mentor 1" class="img-fluid w-100 rounded-4">
                      </a>
                      <!--content-->
                      <div class="d-flex flex-column gap-4">
                        <div class="d-flex flex-column gap-2">
                          <div>
                            <div class="d-flex align-items-center gap-2">
                              <h3 class="mb-0">
                                <a href="mentor-single.html" class="text-reset">Akshay Sharma</a>
                              </h3>
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check-fill text-success" viewBox="0 0 16 16">
                                  <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"></path>
                                </svg>
                              </span>
                            </div>
                            <span class="text-gray-800">Plombier</span>
                          </div>
                          <div class="d-flex align-items-center justify-content-between fs-6">
                            <div>
                              <span>Abidjan</span>
                              <div class="vr mx-2 text-gray-200"></div>
                              <span>Cocody</span>
                            </div>
                            <div class="d-flex gap-1 align-items-center lh-1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                              </svg>
                              <span class="fw-bold text-dark">5.0</span>
                              <span>(12 avis)</span>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between align-items-center">
                          <div>
                            <span>A partir de</span>
                            <div class="d-flex flex-row gap-1 align-items-center">
                              <span class="fs-6">30.000 CFA/ mois</span>
                            </div>
                          </div>
                          <div>
                            <a href="#!" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#signupModal">Voir le profil</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Fin du code de la carte -->
              </div>
              
              <!-- Autres éléments du carousel peuvent être ajoutés ici -->
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

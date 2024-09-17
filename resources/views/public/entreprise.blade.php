@extends('layouts.public')

@section('title', 'Entrepise | Allo service')



@section('content')
<section class="bg-light"
    style="background: linear-gradient(to right top, #0470B8, #023252), no-repeat right; background-size: auto; background-position: right; height: 300px;">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-xl-12 col-lg-12 text-center">
                <h1 class="display-2 text-white">TROUVEZ UNE ENTREPRISE</h1>

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
    <br><br>
    <div class="card card-bordered mb-3 card-hover cursor-pointer">
        <!-- card body -->
        <div class="card-body">
            <div class="d-xl-flex">
                <div class="mb-3 mb-md-0">
                    <!-- Img -->
                    <img src="../../assets/images/job/job-brand-logo/job-list-logo-1.svg"
                        alt="Pharmacie du Palais Royal" class="icon-shape border rounded-circle">
                </div>
                <!-- text -->
                <div class="ms-xl-3 w-100 mt-3 mt-xl-1">
                    <div>
                        <h3 class="mb-1 fs-4">
                            <a href="pharmacie-single.html" class="text-inherit">Pharmacie du Palais Royal</a>
                        </h3>

                        <div>
                            <span>Notre entreprise, Plomberie Sanitaire (MBHK), offre des services et sommes fiers de
                                fournir des solutions durables et efficaces à nos clients. Un service de haute qualité à
                                chaque client. Nous nous engageons à offrir un service rapide et fiable à un prix
                                compétitif.</span>
                        </div>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bookmark bookmark" viewBox="0 0 16 16">
                            <path
                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z">
                            </path>
                        </svg>
                    </div>
                </div>

                <div class="d-md-flex justify-content-between">
                    <div class="mb-2 mb-md-0">
                        <span class="me-2">
                            <i class="fe fe-map-pin"></i>
                            <span class="ms-1">Abidjan, Treichville</span>
                        </span>
                    </div>
                    <div>
                        <i class="fe fe-phone"></i>
                        <span>Lancez un appel</span>
                    </div>
                    <div>
                        <i class="fe fe-star"></i>
                        <span>Écrire un avis (6 avis disponibles)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


@endsection
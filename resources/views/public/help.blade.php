@extends('layouts.public')

@section('title', 'Comment ça marche')

@section('content')
<section class="py-8 bg-primary">

<div class="container">
    <div class="row align-items-center justify-content-center gy-2">
        <div class="col-md-6 col-12">
            <!-- caption-->
            <div class="d-flex flex-column gap-5">
                <div class="d-flex flex-column gap-1">
                    <h1 class="fw-bold mb-0 display-3 text-white">Comment ça marche ?</h1>
                    <!-- para -->
                    <p class="mb-0 text-white">Vous vous demandez comment utiliser notre plateforme ? Voici une explication simple pour vous aider à démarrer.</p>
                </div>
                <div class="d-flex flex-column gap-2">
                    <span class="d-block text-white">Choisissez une catégorie ci-dessous pour trouver rapidement l'aide dont vous avez besoin ou explorez notre centre d'aide.</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="d-flex align-items-center justify-content-end">
                <!-- img  -->
                <img src="../assets/images/png/3d-girl.png" alt="girlsetting" class="text-center img-fluid">
            </div>
        </div>
    </div>
</div></section>

<section class="py-8">
    <div class="container my-lg-8">
        <div class="row">
            <div class="offset-lg-2 col-lg-6 col-12">
                <div class="mb-8 pe-lg-8">
                    <!-- heading  -->
                    <h2 class="mb-4 h1 fw-semibold">Questions Fréquemment Posées</h2>
                    <p class="lead">Découvrez les réponses aux questions les plus courantes pour vous aider à utiliser AlloService.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="offset-lg-2 col-lg-8 col-12">
                <!-- accordions  -->
                <div class="accordion accordion-flush" id="accordionExample">
                    <div class="border p-3 rounded-3 mb-2" id="headingOne">
                        <h3 class="mb-0 fs-4">
                            <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span class="me-auto">Comment puis-je inscrire mon entreprise sur AlloService ?</span>
                                <span class="collapse-toggle ms-4">
                                    <i class="fe fe-chevron-down"></i>
                                </span>
                            </a>
                        </h3>
                        <!-- collapse  -->
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="pt-2">
                                Pour inscrire votre entreprise sur AlloService, il vous suffit de créer un compte et de remplir les informations requises sur votre entreprise. Vous pourrez ensuite gérer votre fiche directement depuis votre tableau de bord.
                            </div>
                        </div>
                    </div>
                    <!-- Card  -->
                    <!-- Card header  -->
                    <div class="border p-3 rounded-3 mb-2" id="headingTwo">
                        <h3 class="mb-0 fs-4">
                            <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span class="me-auto">Quels sont les avantages d'un abonnement Premium ?</span>
                                <span class="collapse-toggle ms-4">
                                    <i class="fe fe-chevron-down"></i>
                                </span>
                            </a>
                        </h3>
                        <!-- collapse  -->
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="pt-3">
                                L'abonnement Premium vous offre une visibilité accrue avec des options de mise en avant, des statistiques détaillées sur les visites de votre fiche et des outils supplémentaires pour gérer vos avis et publications.
                            </div>
                        </div>
                    </div>
                    <!-- Card  -->
                    <!-- Card header  -->
                    <div class="border p-3 rounded-3 mb-2" id="headingThree">
                        <h3 class="mb-0 fs-4">
                            <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span class="me-auto">Combien de temps faut-il pour remplir une fiche entreprise ?</span>
                                <span class="collapse-toggle ms-4">
                                    <i class="fe fe-chevron-down"></i>
                                </span>
                            </a>
                        </h3>
                        <!-- collapse  -->
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="pt-3">
                                La création de votre fiche entreprise prend généralement entre 15 et 30 minutes, en fonction de la quantité d'informations que vous souhaitez inclure.
                            </div>
                        </div>
                    </div>
                    <!-- Card  -->
                    <!-- Card header  -->
                    <div class="border p-3 rounded-3 mb-2" id="headingFour">
                        <h3 class="mb-0 fs-4">
                            <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <span class="me-auto">Y a-t-il des tutoriels gratuits disponibles ?</span>
                                <span class="collapse-toggle ms-4">
                                    <i class="fe fe-chevron-down"></i>
                                </span>
                            </a>
                        </h3>
                        <!-- collapse  -->
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="pt-3">
                                Oui, nous proposons des tutoriels gratuits pour vous aider à mieux utiliser AlloService. Vous pouvez les consulter directement depuis notre centre d'aide en ligne.
                            </div>
                        </div>
                    </div>
                    <!-- Card  -->
                    <!-- Card header  -->
                    <div class="border p-3 rounded-3 mb-2" id="headingFive">
                        <h3 class="mb-0 fs-4">
                            <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <span class="me-auto">Existe-t-il une option de paiement mensuel ?</span>
                                <span class="collapse-toggle ms-4">
                                    <i class="fe fe-chevron-down"></i>
                                </span>
                            </a>
                        </h3>
                        <!-- collapse  -->
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="pt-3">
                                Oui, nous proposons une option de paiement mensuel pour les abonnements Premium afin de vous offrir plus de flexibilité.
                            </div>
                        </div>
                    </div>
                    <!-- Card  -->
                    <!-- Card header  -->
                    <div class="border p-3 rounded-3 mb-2" id="headingSix">
                        <h3 class="mb-0 fs-4">
                            <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <span class="me-auto">Comment puis-je suivre les performances de ma fiche ?</span>
                                <span class="collapse-toggle ms-4">
                                    <i class="fe fe-chevron-down"></i>
                                </span>
                            </a>
                        </h3>
                        <!-- collapse  -->
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                            <div class="pt-3">
                                Vous pouvez suivre les performances de votre fiche à l'aide des statistiques fournies dans votre tableau de bord. Vous y trouverez des informations sur les vues, les clics et les interactions avec votre fiche.
                            </div>
                        </div>
                    </div>
                    <!-- Card  -->
                    <!-- Card header  -->
                    <div class="border p-3 rounded-3 mb-2" id="headingSeven">
                        <h3 class="mb-0 fs-4">
                            <a href="#" class="d-flex align-items-center text-inherit collapsed" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <span class="me-auto">Comment fonctionne AlloService ?</span>
                                <span class="collapse-toggle ms-4">
                                    <i class="fe fe-chevron-down"></i>
                                </span>
                            </a>
                        </h3>
                        <!-- collapse  -->
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                            <div class="pt-3">
                                AlloService permet aux professionnels de créer et gérer leur fiche entreprise, tandis que les utilisateurs peuvent rechercher et trouver des entreprises en fonction de leurs besoins. Notre plateforme facilite la mise en relation entre clients et prestataires.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

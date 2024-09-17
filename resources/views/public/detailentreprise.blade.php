@extends('layouts.public')

@section('title', 'Welcome | Geeks')

@section('content')
<section class="py-xl-8 py-6">
    <div class="container">
        <!--row-->
        <div class="row gy-4">
            <div class="col-xl-12 col-12">
                <div class="d-flex flex-column gap-4">
                    <!--card-->
                    <div class="card">
                        <!--img-->
                        <div class="rounded-top-3" style="background-image: url(../assets/images/mentor/mentor-single.png); background-position: center; background-size: cover; background-repeat: no-repeat; height: 228px"></div>
                        <div class="card-body p-md-5">
                            <div class="d-flex flex-column gap-5">
                                <!--img-->
                                <div class="mt-n8">
                                    <img src="../assets/images/mentor/mentor-img-single.jpg" alt="mentor 1" class="img-fluid rounded-4 mt-n8">
                                </div>
                                <div class="d-flex flex-column gap-5">
                                    <div class="d-flex flex-column gap-3">
                                        <div class="d-flex flex-md-row flex-column justify-content-between gap-2">
                                            <!--heading-->
                                            <div>
                                                <h1 class="mb-0">JEAN SETONE SERI</h1>
                                                <!--content-->
                                                <div class="d-flex flex-lg-row flex-column gap-2">
                                                    <small class="fw-medium text-gray-800">Profession: Electrician</small>
                                                    <small class="fw-medium text-success">Specializations: Electrical Wiring, Smart Home Solutions, 24/7 Electrical Repair.</small>
                                                </div>
                                            </div>
                                            <!--button-->
                                            <div class="d-flex flex-row gap-3 align-items-center">
                                                <a href="#!" class="btn btn-outline-white">
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill me-1" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"></path>
                                                        </svg>
                                                    </span>
                                                    Save
                                                </a>
                                                <a href="#!" class="btn btn-outline-white">Ask questions</a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-md-row flex-column gap-md-4 gap-2">
                                            <div class="d-flex flex-row gap-2 align-items-center lh-1">
                                                <!--icon-->
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill text-warning align-baseline" viewBox="0 0 16 16">
                                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                    </svg>
                                                </span>
                                                <span>
                                                    <!--text-->
                                                    <span class="text-gray-800 fw-bold">5.0</span>
                                                    (16 Reviews)
                                                </span>
                                            </div>
                                            <div class="d-flex flex-row gap-2 align-items-center lh-1">
                                                <!--icon-->
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-people-fill text-primary align-baseline" viewBox="0 0 16 16">
                                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"></path>
                                                    </svg>
                                                </span>
                                                <!--text-->
                                                <span>
                                                    <span class="text-gray-800 fw-bold">40+</span>
                                                    Mentees
                                                </span>
                                            </div>
                                            <div class="d-flex flex-row gap-2 align-items-center lh-1">
                                                <!--icon-->
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-geo-alt-fill text-danger" viewBox="0 0 16 16">
                                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"></path>
                                                    </svg>
                                                </span>
                                                <!--text-->
                                                <span>320 rue St Honoré, 75001 Paris</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--card-->
                    <div class="card">
                        <!--card body-->
                        <div class="card-body p-md-5 d-flex flex-column gap-3">
                            <!--heading-->
                            <h3 class="mb-0">Presentation</h3>
                            <div class="d-flex flex-column">
                                <!--para-->
                                <p class="mb-1">
                                    JEAN SETONE SERI specializes in a range of electrical services including electrical cabinet wiring, IT cabling, smart home solutions, and emergency electrical repair. With a commitment to high standards and customer satisfaction, we offer comprehensive solutions to meet all your electrical needs.
                                </p>
                                <div class="collapse" id="collapseAbout">
                                    <p class="my-3">
                                        We have served clients across Paris and beyond, providing top-notch electrical services that adhere to the highest safety and quality standards. From smart home installations to emergency repairs, our expertise ensures reliable and efficient solutions for every project.
                                    </p>
                                </div>
                                <div>
                                    <a class="btn-link" data-bs-toggle="collapse" href="#collapseAbout" role="button" aria-expanded="false" aria-controls="collapseAbout">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--card-->
                    <div class="card">
                        <!--card body-->
                        <div class="card-body p-md-5">
                            <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-between gap-2">
                                <!--heading-->
                                <div>
                                    <h3 class="mb-0">Reviews</h3>
                                </div>
                                <div>
                                    <!--form-->
                                    <form>
                                        <div class="d-flex flex-row align-items-center gap-2">
                                            <label for="exampleInputmentees" class="form-label text-nowrap mb-0">Sort by:</label>
                                            <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
                                                <div class="choices__inner">
                                                    <select class="form-select choices__input" data-choices="" aria-label="Default select example" id="exampleInputmentees" name="exampleInputmentees" hidden="" tabindex="-1" data-choice="active">
                                                        <option value="Recommended" data-custom-properties="[object Object]">Recommended</option>
                                                        <option value="Most Recent">Most Recent</option>
                                                    </select>
                                                    <div class="choices__list choices__list--single">
                                                        <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Recommended" data-custom-properties="[object Object]" aria-selected="true">Recommended</div>
                                                        <div class="choices__item choices__item--selectable" data-item="" data-id="2" data-value="Most Recent" aria-selected="false">Most Recent</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-3">
                                <div class="py-4 d-flex flex-column gap-3 border-bottom">
                                    <div class="d-flex flex-row justify-content-between align-items-md-center">
                                        <div class="d-flex flex-row gap-3 align-items-center">
                                            <!--img-->
                                            <div>
                                                <img src="../assets/images/avatar/avatar-1.jpg" alt="avatar 1" class="avatar avatar-lg rounded-circle">
                                            </div>
                                            <div>
                                                <!--heading-->
                                                <h4 class="mb-1">Екатерина Лужецкая</h4>
                                                <div class="d-flex flex-md-row flex-column gap-md-2 align-items-md-center lh-1">
                                                    <!--icons-->
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                                        </svg>
                                                    </span>
                                                    <!--text-->
                                                    <span>
                                                        <small class="fw-medium">September 9, 2024</small>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <small>Plan:</small>
                                            <small class="border-bottom">1 Month</small>
                                        </div>
                                    </div>
                                    <p class="mt-3">"Excellent contact, professionalism rare these days. Thanks again to you!"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Additional Content -->
        </div>
    </div>
</section>
@endsection

<main>
    <div class="container-fluid py-4">
        <h3 class="font-weight-bolder ">WELCOME
            {{ strtoupper($student->surname . ' ' . $student->m_name . ' ' . $student->firstname) }}</h3>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">

                                    <!--p class="mb-1 pt-2 text-bold">National Diploma Screening</p-->
                                    <h5 class="font-weight-bolder">ND Screening Portal</h5>
                                    <div class="alert alert-warning" role="alert">
                                        <p class="mb-1 text-white"><strong>Warning!!!</strong> Make sure you come along
                                            with the original and photocopy of your credentials.</p>
                                        <p class="mb-5 text-white">Failure to do so might result in disqualification.
                                        </p>
                                        <!--a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="#">
                      Read More
                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                    </a-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-default border-radius-lg h-100">
                                    <img src="../assets/img/shapes/waves-white.svg"
                                        class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                    <div
                                        class="position-relative d-flex align-items-center justify-content-center h-100">
                                        <img src="../assets/img/logos/logo.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($hasOffer)
                <div class="col-lg-5">
                    <div class="card h-100 p-3">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                            <span class="mask bg-gradient-success"></span>
                            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-white font-weight-bolder mb-4 pt-2">Print Offer</h5>

                                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                    href="/offer">
                                    <p class="text-white">Click here to print Offer </p>
                                    <i class="fas fa-print fa-10x"></i>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @elseif($shortList)
        <div class="col-lg-5">
            <div class="card h-100 p-3">
                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                        <h5 class="text-white font-weight-bolder mb-4 pt-2">Generate Remita Acceptance</h5>

                        <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" target="_blank"
                            href="{{ route('acceptance') }}">
                            <p class="text-white">Click here to Generate Acceptance Remita </p>
                            <i class="far fa-credit-card fa-10x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif($hasPaid)
    <div class="col-lg-5">
        <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                <span class="mask bg-gradient-success"></span>
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Continue Registration</h5>

                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" target="_blank"
                        href="/profile">
                        <p class="text-white">Continue Registration </p>
                        <i class="far fa-user fa-10x"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
@else
    <div class="col-lg-5">
        <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                <span class="mask bg-gradient-dark"></span>
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Generate Remita</h5>

                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" target="_blank"
                        href="/billing">
                        <p class="text-white">Click here to generate remita </p>
                        <i class="fab fa-cc-visa fa-10x"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif





</main>

@extends('layouts.admin.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>School Information</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">School Information</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section school-info">
        <div class="row">

            <!-- School Details -->
            <div class="col-lg-12">
                <div class="shadow-sm card">
                    <div class="card-body">
                        <div class="mb-4 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 card-title">General Information</h5>
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="info-box d-flex align-items-center">
                                    <i class="bi bi-building fs-4 text-primary me-3"></i>
                                    <div>
                                        <h6 class="mb-0">School Name</h6>
                                        <p class="text-muted small">{{$school['name']}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box d-flex align-items-center">
                                    <i class="bi bi-geo-alt fs-4 text-danger me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Address</h6>
                                        <p class="text-muted small">{{$school['address']}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box d-flex align-items-center">
                                    <i class="bi bi-telephone fs-4 text-success me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Phone</h6>
                                        <p class="text-muted small">{{$school['contact']['phone']}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box d-flex align-items-center">
                                    <i class="bi bi-envelope fs-4 text-warning me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Email</h6>
                                        <p class="text-muted small">{{$school['contact']['email']}}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="info-box d-flex align-items-center">
                                    <i class="bi bi-calendar fs-4 text-info me-3"></i>
                                    <div>
                                        <h6 class="mb-0">Established</h6>
                                        <p class="text-muted small">1998</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div><!-- End School Details -->


        </div>
    </section>

</main>

@endsection

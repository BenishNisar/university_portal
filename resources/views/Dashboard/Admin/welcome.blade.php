@extends("Layout.Dashboard_Layout")
@section("AdminContent")


<section class="section dashboard">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <!-- Student Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Students</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Students Card -->

                    <!-- Course Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Courses</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-book"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Course Card -->


                    <!-- Teacher Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Teachers</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bi bi-mortarboard"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Teacher Card -->


                     <!-- Batch Card -->
                     <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Batches</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                     <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Batch Card -->




                </div>



            </div>
        </div>
</section>


@endsection()
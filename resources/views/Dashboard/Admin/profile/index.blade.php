@extends("Layout.Dashboard_Layout")
<style>
    .card-header {
        color: white;
        background: linear-gradient(135deg, #4e73df 0%, #1cc88a 100%);
        padding: 2rem;
        text-align: center;
    }

    .card-body {
        background-color: #f8f9fc;
    }

    .profile-info-box {
        transition: all 0.3s ease;
    }

    .profile-info-box:hover {
        background-color: #e9ecef;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .font-weight-bold {
        font-size: 1.1rem;
        color: #4e73df;
    }

    .text-primary {
        color: #4e73df !important;
    }

    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }

    .btn-secondary {
        background-color: #858796;
        border-color: #858796;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .rounded-circle {
        border: 3px solid #4e73df;
        padding: 2px;
    }
</style>
@section("AdminContent")

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-lg border-0" style="overflow: hidden;">
                <div class="card-header bg-gradient-primary text-white text-center py-5" style="background: linear-gradient(135deg, #801316 0%, #090c4a 100%);">

                    <h1>Profile Details </h1>
                </div>
                <div class="card-body p-5">
                    <div class="d-flex align-items-center mb-4">
                        <img src="{{ asset(Auth::user()->profile_img) }}" alt="Profile Picture" class="rounded-circle mr-4 border border-primary shadow-sm" style="width: 100px; height: 100px;">
                        <div class="ps-2 ">
                            <h5 class="font-weight-bold text-dark mb-1 text-capitalize">
                                <i class="fas fa-user-circle "></i> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                            </h5>
                            <small class="text-muted d-block">
                                <i class="fas fa-envelope text-secondary mr-1"></i> {{ Auth::user()->email }}
                            </small>
                        </div>
                    </div>

                    <!-- Profile Information -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="profile-info-box p-3 bg-light rounded">
                                <label class="text-muted">Full Name</label>
                                <p class="font-weight-bold text-capitalize mb-0">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-info-box p-3 bg-light rounded">
                                <label class="text-muted">Email</label>
                                <p class="font-weight-bold text-capitalize mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="profile-info-box p-3 bg-light rounded">
                                <label class="text-muted">Country</label>
                                <p class="font-weight-bold text-capitalize mb-0">{{ Auth::user()->country }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-info-box p-3 bg-light rounded">
                                <label class="text-muted">Gender</label>
                                <p class="font-weight-bold text-capitalize mb-0">{{ Auth::user()->gender }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Edit and Settings Buttons -->
                    <div class="text-center mt-4">
                        {{-- <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg px-5 mr-3">
                        <i class="fas fa-edit"></i> Edit Profile
                        </a>
                        <a href="{{ route('profile.settings') }}" class="btn btn-secondary btn-lg px-5">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
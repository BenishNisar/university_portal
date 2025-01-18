<!DOCTYPE html>
<html>

<head>
    <title>Login || Ilma University (FORMERLY INSTITUTE OF BUSINESS & TECHNOLOGY (IBT)) </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<style>


    .container {
        margin-top: 90px;
    }

    #loginForm {
        background-color: white;
        border-radius: 25px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .form-title {
        font-weight: bold;
        text-align: start;
        margin-bottom: 5px;
    }

    .form-control {
        border-radius: 50px;
        height: 39px;
    }

    .form-control:focus {
        box-shadow: none;
    }

    .btn-info {
        background-color: #3178eb;
        width: 85%;
        border-radius: 18px;
        height: 40px;
    }

    .text-danger {
        color: red !important;
    }

    .login-footer {
        margin-top: 20px;
    }

    .forgot-password {
        text-align: end;
        margin-top: 5px;
    }

    .centered-image {
        display: block;
        margin: 0 auto 20px; /* Center the image and add bottom margin */
        width: 300px; /* Adjust width */

        height: auto; /* Maintain aspect ratio */
    }
</style>

<body>
    <div class="container">
        <div class="col-md-4"></div>

        <div class="col-md-4" id="loginForm">
            <!-- Display session messages -->
            @if (session()->has('status'))
                <div class="alert alert-success">
                    <p>{{ session()->get('status') }}</p>
                </div>
            @endif
            @if (session()->has('status1'))
                <div class="alert alert-danger">
                    <p>{{ session()->get('status1') }}</p>
                </div>
            @endif

            <form action="{{ url('/accountlogin/login-store') }}" method="POST">
                @csrf
                <img src="{{ asset('Dashboard_assets/img/Ilama_University.png') }}" alt="University Logo" class="centered-image">

                <div style="text-align: start;">
                <label class="form-title">Email</label>
                <input type="text" name="email" placeholder="Enter Email" required class="form-control">
                @error('email')
                    <label class="text-danger">{{ $message }}</label>
                @enderror

                </div>
                <br>
                <div style="text-align: start;">
                <label class="form-title">Password</label>
                <input type="password" name="password" placeholder="Password" required class="form-control">
                @error('password')
                    <label class="text-danger">{{ $message }}</label>
                @enderror
                </div>

                <div class="forgot-password">
                    <!-- <a href="#">Forgot password?</a> -->
                </div>

<<<<<<< HEAD
                <button style="background-color: #a05052;" type="submit" class="btn btn-info">Login</button>

                <div class="login-footer">
                    <span>Don’t have an account?</span>
                    <a href="{{ url('dashboard/auth/register') }}">Sign up</a>
=======
                <div style="padding-top: 3rem;">
                    <button style="background-color: #a05052;" type="submit" class="btn btn-info">Login</button>
>>>>>>> 68627875e3d8130108a0a57354cbdfa82e89b302
                </div>
                
            </form>
        </div>

        <div class="col-md-4"></div>
    </div>
</body>

</html>

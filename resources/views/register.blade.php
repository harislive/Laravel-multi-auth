<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="card container">
        <div class="card-header text-center">
            <h1>Login</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Enter Your Name" />
                        <div class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                        placeholder="Enter Your Example@gmail" />
                        <div class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="text-danger">
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter Your Password" />
                        <div class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                        placeholder="Enter Your Confirm Password" />
                        <div class="text-danger">
                    @error('confirm_password')
                        {{ $message }}
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>

            </form>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>

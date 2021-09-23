<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <title>IPT APP</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <h1 class="text-light">IPT APP</h1>
      <form class="d-flex">
      </form>
    </div>
  </nav>
  <div class="py-5">
      <h1 class="text-center mt-5" style="font-size: 5em">Welcome to IPT APP</h1>
      <div class="text-center mt-5">
        <a class="btn btn-lg btn-primary ms-2" href="{{ url('/login') }}">Login</a>
        <a class="btn btn-lg btn-outline-primary ms-2" href="{{ url('/register') }}">Create Account</a>
      </div>
  </div>
</body>
</html>
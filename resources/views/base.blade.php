<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BlueCyber</title>
  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
          CLASS ROOM
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('users.index') }}">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('messages') }}">Messages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('assignments.index') }}">Assignments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('challenges.index') }}">Challenges</a>
        </li>
      </ul>
    </div>
  </div>
  <a style="margin: 19px;" href="{{ route('logout') }}" class="btn btn-warning">Logout</a>
</nav>
  <div class="container">
    @yield('main')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
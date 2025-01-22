<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Ticketing</title>

  @include('includes.style')

</head>
<body>

  <nav class="subnavbar">
    <div class="subnavbar-inner">
      <div class="container">
        <ul class="mainnav">
          <li class="nav-item">
            <a class="nav-link active" href="#">
                <i class="icon-home"></i><span>Home</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="icon-user"></i><span>User</span>
            </a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="DataMaster" role="button" data-bs-toggle="dropdown" >
              <i class="icon-book"></i><span>Aduan Masuk</span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="DataMaster">
                <li><a class="dropdown-item" href="{{ route('sasaran.index') }}">Sasaran</a></li>
                <li><a class="dropdown-item" href="{{ route('indikator.index') }}">Indikator</a></li>
            </ul>
        </li> --}}

          <li class="nav-item">
            <a class="nav-link active" href="#">
                <i class="icon-file"></i><span>Aduan Masuk</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="#">
                <i class="icon-list-alt"></i><span>Aduan Diproses</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="#">
                <i class="icon-list-alt"></i><span>Aduan Selesai</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="#">
                <i class="icon-signout"></i><span>Keluar</span>
            </a>
          </li>
          
            
        </ul>
      </div>
      <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
 </nav>
  <!-- /subnavbar -->
  <div class="main" style="min-height: 600px">
    <div class="main-inner">
      <div class="container">
        <div class="row">
          <div class="span12">
            @yield('content')
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /main-inner -->
  </div>
  <!-- /main -->
  <div class="footer">
    <div class="footer-inner">
      <div class="container">
        <div class="row">
          <div class="span12"> &copy; 2024 <a href="#">Diskominfo Barito Kuala</a></div>
          <!-- /span12 -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /footer-inner -->
  </div>
  <!-- /footer -->
<!-- Le javascript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->

  @include('includes.main')

</body>
</html>

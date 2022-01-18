<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 4 Sidebar Menu Responsive with Sub menu  Create Responsive Side Navigation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="{{ asset('novo/style.css') }}" type="text/css">
</head>
<body>
 
<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <img loading="lazy" src="{{ URL::asset("/novo/img/icon.jpg") }}"alt="..." width="80" height="80" class="mr-3 rounded-circle img-thumbnail shadow-sm">
      <div class="media-body">
        <h4 class="m-0">{{$name}}</h4>
        
      </div>
    </div>
  </div>

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

  <ul class="nav flex-column bg-white mb-0">
   
  
    
    
      <li class="nav-item">
        <a href="{{ route('menu') }}" class="nav-link text-dark">
                  <i class="fa fa fa-arrow-left mr-3 text-blue  fa-fw"></i>
                  Natrag na početnu
              </a>
      </li>
    
    <li class="nav-item">
        
      
        <a class=" nav-link text-dark" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                     <i class="fa fa-sign-out mr-3 text-blue  fa-fw"></i>   
                Odjavite se
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
           
      </li>
     

  


   
  </ul>


</div>

<div class="page-content pt-5 " id="content">
  

  <div class="row justify-content-center align-items-center">
    <div class="col-lg-8">
           @yield('content')
        </div>
    </div>
  

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="novo/main.js"></script>

</body>
</html>


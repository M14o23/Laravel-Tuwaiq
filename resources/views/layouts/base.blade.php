    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin-Panel - لوحة القيادة</title>
    <style>
        *{
            font-family: cairo;
            color:white
        }
    </style>
</head>
<body dir="{{(session()->get('locale')=='ar' ? 'rtl' : 'ltr')}}">
    <Header>
          <!-- Navbar -->
          <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="#">Brand</a>

        <!-- Icons -->
        <ul class="navbar-nav d-flex flex-row me-1">
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link text-white" href="#"><i class="fas fa-envelope mx-1"></i> Contact</a>
            </li>
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link text-white" href="#"><i class="fas fa-cog mx-1"></i> Settings</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-user mx-1"></i> Welcome  {{ Auth::user()->name }}! </a>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="#">My account</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{route('logout')}}">Log out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
          <!-- Navbar --> 
    </Header>

    <main>
    
          <div class="row">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="{{route('index')}}" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('product')}}"  class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Product</span> </a>
                          
                        </li>
                        <li>
                            <a href="{{route('product-details')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Product Deatals</span></a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Cards</span></a>
                          
                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-grid"></i> <span class="ms-1 d-none d-sm-inline">Invoice</span> </a>
                               
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">loser</span>
                        </a>
                        
                    </div>
               
                </div>
           
            </div>
            <div class="col-sm-8">
                @yield('content')
            </div>
         </div>
    </main>

   <footer>

   </footer>

</body>
</html>
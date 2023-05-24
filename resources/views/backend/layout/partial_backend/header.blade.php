<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>

  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
     
      

           <form method="POST" action="{{ route('logout') }}">
                    @csrf
                 <button class="btn btn-secondary" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                </form>
    </div>
  </div>
  <button class="navbar-toggler position-absolue d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
</header>
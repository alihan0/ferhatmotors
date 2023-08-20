<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        
        <ul class="navbar-nav">
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid"></i>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p class="mb-0 fw-bold">Yardım Menüsü</p>
                        
                    </div>
    <div class="row g-0 p-1">
      <div class="col-4 text-center">
        <a href="/docs/how-to-use" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="book" class="icon-lg mb-1"></i><p class="tx-12">Kılavuz</p></a>
      </div>
      <div class="col-4 text-center">
        <a href="/docs/support" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="help-circle" class="icon-lg mb-1"></i><p class="tx-12">Yardım</p></a>
      </div>
      <div class="col-4 text-center">
        <a href="https://metatetige.com" target="_blank" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="external-link" class="icon-lg mb-1"></i><p class="tx-12">Metatige</p></a>
      </div>
      
    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="/static/assets/images/profile-user.png" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="/static/assets/images/profile-user.png" alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{Auth::user()->firstname.' '.Auth::user()->lastname}}</p>
                            <p class="tx-12 text-muted">{{Auth::user()->email}}</p>
                        </div>
                    </div>
    <ul class="list-unstyled p-1">
    
      
      
      <li class="dropdown-item py-2">
        <a href="/auth/logout" class="text-body ms-0">
          <i class="me-2 icon-md" data-feather="log-out"></i>
          <span>Çıkış Yap</span>
        </a>
      </li>
    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
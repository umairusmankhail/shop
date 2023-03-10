<style>
  .sidebarwhite{
    background:white;
  }
  #snav ul li a{
    color:#34495e;
  }
  

  </style>
<!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebarwhite">
        <!-- Brand Logo -->
        <a href="#" class="brand-link" style="border:none">
          
        <!--  <span class="brand-text font-weight-light"></span> -->
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) 
          <div class="user-panel mt-2 pb-3 mb-3 d-flex" >
            <div class="image">
              <img src="{{asset('assets/dist/img/user2.JPG')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
             <strong> <a href="#" class="d-block">umair</a></strong>
            </div>
          </div>-->
    
          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control " type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-primary">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
    
          <!-- Sidebar Menu -->
          <nav id="snav" class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item menu-open">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="category" class="nav-link ">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Category</p>
                    </a>
                  </li>
                 
               
              <li class="nav-item">
                <a href="product-index" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                   Products
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
    
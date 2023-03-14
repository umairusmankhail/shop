

<!-- Main Sidebar Container -->
    <aside class="main-sidebar  elevation-4 sidebarwhite">
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
          <!-- Sidebar Menu -->
          <nav id="snav" class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    
            <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa-solid fa-1"></i>
              <p>
                Category & Sub-Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category')}}" class="nav-link">
                <i class="fas fa-angle-right left nav-icon"></i>  
                <p>Main Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fas fa-angle-right left nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('product-index')}}" class="nav-link">
            <i class="fa-solid fa-2"></i>
              <p>
                Indiviual Product & Category Product
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('product-index')}}" class="nav-link">
            <i class="fa-solid fa-3"></i>
              <p>
                Inquiry Cart & Restriction Record
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('product-index')}}" class="nav-link">
            <i class="fa-solid fa-4"></i>
              <p>
                Inquiry Cart & Inquiry/Request A Quote
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('product-index')}}" class="nav-link">
            <i class="fa-solid fa-5"></i>
              <p>
                Registration & Restriction Record
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('product-index')}}" class="nav-link">
            <i class="fa-solid fa-6"></i>
              <p>
               Slider, Privacy, Sitemap & Footer
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="{{route('product-index')}}" class="nav-link">
            <i class="fa-solid fa-7"></i>
              <p>
               Trash Bin
              </p>
            </a>
          </li>

              
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
    
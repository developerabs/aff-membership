<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Boostbo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar"> 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a> 
          </li> 
          <li class="nav-item">
            <a href="{{ route('categories.view') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Categories 
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="{{ route('services.view') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Services 
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="{{ route('customers.view') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Customers 
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="{{ route('orders.view') }}" class="nav-link">
              <i class="nav-icon fas fa-heart"></i>
              <p>
                Orders 
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="{{ route('packagecategory.view') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Packages 
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('blog.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blogs</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('blogcategory.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Website Content
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('homeContentBanner.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home Page Banner</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('homeContentGetWork.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Get Work</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('moneyprotection.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Money Protection</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('findyourtarget.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Find Your Target</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('aboutus.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('howItWork.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>How It's Work Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('faqPage.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Faq Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('privacyPolicy.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Privacy Policy Page</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ route('servicesPageSideIcon.view') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Servece Page Side Icon</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('paymentMethods.view') }}" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Payment Icons
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="{{ route('paymentGetway.view') }}" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Payment Methods
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="{{ route('sitesettings.view') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Site Settings 
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a href="{{ route('smtp.view') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                SMTP Settings 
              </p>
            </a> 
          </li>
          <li class="nav-item d-flex">
            
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn text-white"><i class="nav-icon fas fa-power-off text-white"></i>Logout</button>
             </form> 
          </li>
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
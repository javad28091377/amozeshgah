  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="adminpanel" class="brand-link">
      <img src="{{ asset('admin/') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            
          </div>
          <div class="info">
            <a href="#" class="d-block"></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
           
                 <li class="nav-item">
                  <a href="dashboard" class="nav-link">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>
                      داشبورد  
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/adminpanel/terms" class="nav-link">
                    <i class="nav-icon fa fa-list"></i>
                    <p>
                      مدیریت دوره ها  
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/adminpanel/masters" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                    <p>
                       مدیریت اساتید  
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/adminpanel/students" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                     مدیریت دانشجویان  
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/adminpanel/calender" class="nav-link">
                    <i class="nav-icon fa fa-calendar"></i>
                    <p>
                     مدیریت تقویم اموزشی 
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/adminpanel/slider" class="nav-link">
                    <i class="nav-icon fa fa-sliders"></i>
                    <p>
                       مدیریت اسلایدر 
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/adminpanel/sigins" class="nav-link">
                    <i class="nav-icon fa fa-list"></i>
                    <p>
                      لیست ثبت نامی ها
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="index.html" class="nav-link">
                    <i class="nav-icon fa fa-power-off"></i>
                    <p>
                      خروج
                    </p>
                  </a>
                </li>
            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
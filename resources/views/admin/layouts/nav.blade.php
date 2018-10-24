<div class="slim-navbar">
      <div class="container">
        <ul class="nav">
          <li class="nav-item with-sub active">
            <a class="nav-link" href="{{url('/')}}/admin">
              <i class="icon ion-ios-home-outline"></i>
              <span>Dashboard</span>
            </a>
        
          </li>
         
          <li class="nav-item with-sub">
            <a class="nav-link" href="#">
              <span>Orders</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="/admin/orders">All Orders</a></li>
                <li><a href="/admin/orders?assigned=1">Assigned Orders</a></li>
                <li><a href="/admin/orders?completed=1">Completed Orders</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </li>

          <li class="nav-item with-sub">
            <a class="nav-link" href="/admin/settings" data-toggle="dropdown">
              <span>Settings</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="/admin/email-setting">Email Settings</a></li>
                <li><a href="/admin/settings">All Settings</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </li>
      
        
          <li class="nav-item with-sub">
            <a class="nav-link" href="/admin/pages" data-toggle="dropdown">
              <span>Pages</span>
            </a>
            <div class="sub-item">
              <ul>
                <li><a href="/admin/create-page">Create Page</a></li>
                <li><a href="/admin/all-pages">All Pages</a></li>
                <li><a href="/admin/users">Users</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </li>
          
             <li class="nav-item ">
            <a class="nav-link" href="{{url('/')}}/admin/reviews">
              <i class="icon ion-ios-home-outline"></i>
              <span>Reviews</span>
            </a>
        
          </li>
          
      
        </ul>
      </div><!-- container -->
    </div><!-- slim-navbar -->
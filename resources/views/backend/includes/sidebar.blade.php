<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('backend.dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Crispy Kitchen</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('backend.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-utensils"></i>
            <span>Menu</span>
        </a>
        <div id="menu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('backend.menu.add')}}">Add Menu</a>
                <a class="collapse-item" href="{{route('backend.menu.manage')}}">Manage Menu</a>
            </div>
        </div>
    </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#news"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-newspaper"></i>
            <span>News</span>
        </a>
        <div id="news" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               <a class="collapse-item" href="{{route('backend.news.add')}}">Add News </a>
                <a class="collapse-item" href="{{route('backend.news.manage')}}">Manage News</a> 
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#member"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-newspaper"></i>
            <span>Members</span>
        </a>
        <div id="member" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
               <a class="collapse-item" href="{{route('backend.member.create')}}">Add Members </a>
                <a class="collapse-item" href="{{route('backend.member.manage')}}">Manage Members</a> 
            </div>
        </div>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Contact Form</span></a>
    </li>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="fas fa-fw fa-table"></i>
                <span>Reservation</span></a>
        </li>
            <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Newsletter</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
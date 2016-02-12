<section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ url('images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{auth()->user()->name}}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <li class="{{ set_active('admin') }}"><a href="{{ url('admin') }}"><i class="fa fa-desktop"></i> <span>DashBoard</span></a></li>
        <li class="header">Truck Owner</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Owner Operations</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="{{ set_active('admin/truck-owner/create') }}"><a href="{{ url('admin/truck-owner/create') }}"><i class="fa fa-user"></i> <span>Create Truck Owner</span></a></li>
                <li class="{{ set_active('admin/truck-owner/list') }}"><a href="{{ url('admin/truck-owner/list') }}"><i class="fa fa-users"></i> <span>View Truck Owners</span></a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-truck"></i>
                <span>Truck Operations</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="{{ set_active('admin/truck/list') }}"><a href="{{ url('admin/truck/list') }}"><i class="fa fa-users"></i> <span>View Trucks </span></a></li>
            </ul>
        </li>
    </ul>
    <!-- /.sidebar-menu -->
</section>
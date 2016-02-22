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
        <li class="header">MENU</li>
        <li class="{{ set_active('/transporter') }}"><a href="{{ url('/transporter/') }}"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></li>
        <li class="header">REQUIREMENTS</li>
        <li class="{{ set_active('transporter/requirement/create') }}"><a href="{{ url('transporter/requirement/create') }}"><i class="fa fa-edit"></i><span>Create Requirement</span></a></li>
        <li class="{{ set_active('transporter/requirement/list') }}"><a href="{{ url('transporter/requirement/list') }}"><i class="fa fa-bar-chart"></i><span>List Open Requirement</span></a></li>


    </ul>
    <!-- /.sidebar-menu -->
</section>
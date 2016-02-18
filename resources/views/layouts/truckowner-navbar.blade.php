<section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ url('images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><a href="/truck-owner/profile/{{auth()->user()->id}}">{{auth()->user()->name}}</a></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li class="{{ set_active('truck-owner') }}"><a href="{{ url('/truck-owner/') }}"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></li>
        <li class="header">TRUCK INFORMATION</li>
        <li class="{{ set_active('truck-owner/trucks') }}"><a href="{{ url('/truck-owner/trucks') }}"><i class="fa fa-truck"></i> <span>Your Trucks</span></a></li>
        <li class="{{ set_active('truck-owner/track-trucks') }}"><a href="{{ url('/truck-owner/track-trucks') }}"><i class="fa fa-map-marker"></i> <span>Track your Truck</span></a></li>
        <li class="header">SEARCH LOADS</li>
        <li class="{{ set_active('truck-owner/live-bids') }}"><a href="{{ url('/truck-owner/live-bids') }}"><i class="fa fa-line-chart"></i> <span>Live Bids</span></a></li>
        <li class="{{ set_active('truck-owner/search-loads') }}"><a href="{{ url('/truck-owner/search-loads') }}"><i class="fa fa-search"></i> <span>Search for loads</span></a></li>
        <li class="{{ set_active('truck-owner/view-participation') }}"><a href="{{ url('/truck-owner/view-participation') }}"><i class="fa fa-eye"></i> <span>List Participation</span></a></li>
        <li class="header">TRANSACTIONS</li>
        <li class="{{ set_active('truck-owner/current-transactions') }}"><a href="{{ url('/truck-owner/current-transactions') }}"><i class="fa fa-briefcase"></i> <span>Current Transactions</span></a></li>
        <li class="{{ set_active('truck-owner/transaction-history') }}"><a href="{{ url('/truck-owner/transaction-history') }}"><i class="fa fa-archive"></i> <span>Transaction History</span></a></li>

    </ul>
    <!-- /.sidebar-menu -->
</section>
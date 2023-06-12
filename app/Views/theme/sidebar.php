<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center">
    <div class="sidebar-brand-icon">
        <i class="fas fa-film"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Film Manager</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?=site_url('admin');?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Setting
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Katalog</span>
    </a>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=site_url('admin/film')?>">Film</a>
            <a class="collapse-item" href="<?=site_url('admin/dompetku')?>">My Wallet</a>
            <a class="collapse-item" href="<?=site_url('admin/transaksi')?>">Transaksi</a>
        </div>
    </div>
</li>


<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStok"
        aria-expanded="true" aria-controls="collapseStok">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Chart</span>
    </a>
    <div id="collapseStok" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=site_url('/admin/chart/pie')?>">Pie</a>
            <a class="collapse-item" href="<?=site_url('/admin/chart/line')?>">Line</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.html">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->

     <!-- Nav Item - Pages Collapse Menu -->

     <!-- Divider -->

     <!-- Heading -->
     <div class="sidebar-heading">
         Menu
     </div>

     <!-- Nav Item - Pages Collapse Menu -->

     <?php
        $current_url = $_SERVER['REQUEST_URI'];

        function is_active($url)
        {
            global $current_url;
            return ($current_url == $url) ? 'active' : '';
        }
        ?>
     <!-- Nav Item - Charts -->
     <li class="nav-item <?php echo is_active('/barang.php'); ?>">
         <a class="nav-link" href="barang.php">
             <i class="fas fa-fw fa-box"></i>
             <span>Barang</span></a>
     </li>

     <!-- Nav Item - Tables -->
     <li class="nav-item <?php echo is_active('/peminjam.php'); ?>">
         <a class="nav-link" href="peminjam.php">
             <i class="fas fa-fw fa-users"></i>
             <span>Peminjam</span></a>
     </li>
     <li class="nav-item <?php echo is_active('/pengguna.php'); ?>">
         <a class="nav-link" href="pengguna.php">
             <i class="fas fa-fw fa-user"></i>
             <span>Pengguna</span></a>
     </li>
     <li class="nav-item <?php echo is_active('/kategori.php'); ?>">
         <a class="nav-link" href="kategori.php">
             <i class="fas fa-fw fa-user"></i>
             <span>Kategori</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->

 </ul>
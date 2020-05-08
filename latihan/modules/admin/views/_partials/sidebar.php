<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="far fa-smile-beam"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo ucfirst($this->session->userdata('username')); ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Account
      </div>

      <!-- Nav Item -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/aktifitas'); ?>">
        <i class="fas fa-fw fa-user"></i>
          <span>Aktifitas Account</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Product Management
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/products'); ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Produk</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/kategori'); ?>">
          <i class="fa fa-inbox"></i>
          <span>Kategori</span></a>
      </li>

  <div class="sidebar-heading">
        Transaksi Management
      </div>

      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fa fa-suitcase"></i>
          <span>Orderan Masuk</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MAIN MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Home</span>
        </a>
      </li>      

      <li <?php if ($page == 'product') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Product'); ?>">
          <i class="fa fa-cutlery"></i>
          <span>Product Menu</span>
        </a>
      </li>

      <li <?php if ($page == 'category') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Category'); ?>">
          <i class="fa fa-glass"></i>
          <span>Category Menu</span>
        </a>
      </li>

      <li <?php if ($page == 'vip') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Vip'); ?>">
          <i class="fa fa-users"></i>
          <span>VIP Menu</span>
        </a>
      </li>
 
      <li <?php if ($page == 'debit') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Debit'); ?>">
          <i class="fa fa-credit-card"></i>
          <span>Debit Card</span>
        </a>
      </li>

     <li <?php if ($page == 'credit') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Credit'); ?>">
          <i class="fa fa-cc-visa"></i>
          <span>Credit Card</span>
        </a>
      </li>

    <li <?php if ($page == 'transaction') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Transaction'); ?>">
          <i class="fa fa-dollar"></i>
          <span>Transaction</span>
        </a>
      </li>

    <li <?php if ($page == 'report') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Report'); ?>">
          <i class="fa fa-files-o"></i>
          <span>Report</span>
        </a>
      </li>
 
      
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
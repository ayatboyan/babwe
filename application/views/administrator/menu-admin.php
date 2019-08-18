        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>/asset/admin/dist/img/family.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>RBS Hidayat</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU ADMIN</li>
            <li><a href="<?php echo base_url(); ?>administrator/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Menu Utama</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>administrator/identitaswebsite"><i class="fa fa-circle-o"></i> Identitas Website</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/menuwebsite"><i class="fa fa-circle-o"></i> Menu Website</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/halamanbaru"><i class="fa fa-circle-o"></i> Halaman Baru</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-pencil"></i> <span>Modul Berita</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>administrator/listberita"><i class="fa fa-circle-o"></i> List Berita</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/kategoriberita"><i class="fa fa-circle-o"></i> Kategori Berita</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/tagberita"><i class="fa fa-circle-o"></i> Tag Berita</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-blackboard"></i> <span>Modul Iklan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>administrator/iklanhome"><i class="fa fa-circle-o"></i> Iklan Tengah</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/iklansidebar"><i class="fa fa-circle-o"></i> Iklan Sidebar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-object-align-left"></i> <span>Modul Web</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>administrator/logowebsite"><i class="fa fa-circle-o"></i> Logo Website</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/agenda"><i class="fa fa-circle-o"></i> Agenda</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/ym"><i class="fa fa-circle-o"></i> Yahoo Messanger</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/pesanmasuk"><i class="fa fa-circle-o"></i> Pesan Masuk</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-cog"></i> <span>Modul Users</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>administrator/manajemenuser/user"><i class="fa fa-circle-o"></i> Manajemen User</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/manajemenuser/penulis"><i class="fa fa-circle-o"></i> Manajemen Penulis</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/manajemenuser/admin"><i class="fa fa-circle-o"></i> Manajemen Admin</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>administrator/edit_manajemenuser/<?php echo $this->session->username; ?>"><i class="fa fa-user"></i> <span>Edit Profile</span></a></li>
            <li><a href="<?php echo base_url(); ?>administrator/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
          </ul>
        </section>
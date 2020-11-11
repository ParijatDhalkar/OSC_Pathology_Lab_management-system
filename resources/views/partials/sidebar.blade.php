  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

          <li class="treeview {{ Request::segment(1) == 'tests' || Request::segment(1) == 'slots' || Request::segment(1) == 'fields' ? 'active' : '' }}">
            
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Tests</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="{{ route('tests.create') }}"><i class="fa fa-circle-o"></i> Add New</a></li>
              <li><a href="{{ route('tests.index') }}"><i class="fa fa-circle-o"></i> View All</a></li>
              <li><a href="{{ route('slots.index') }}"><i class="fa fa-circle-o"></i> Slots</a></li>
              <li><a href="{{ route('fields.index') }}"><i class="fa fa-circle-o"></i> Fields</a></li>
            </ul>

          </li>

          <li class="treeview {{ Request::segment(1) == 'patients' ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Patients</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> View All</a></li>
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'appointments' ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Appointments</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Add New</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> View All</a></li>
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'samples' ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Samples</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Add New</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> View All</a></li>
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'reports' ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i> Add New</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> View All</a></li>
            </ul>
          </li>

          <li class="treeview {{ Request::segment(1) == 'invoices' || Request::segment(1) == 'payments' ? 'active' : '' }}">
            <a href="#">
              <i class="fa fa-pie-chart"></i>
              <span>Accounts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#"><i class="fa fa-circle-o"></i>Invoices</a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i>Payments</a></li>
            </ul>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

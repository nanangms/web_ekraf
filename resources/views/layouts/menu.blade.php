<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

    <li class="nav-header">Menu</li>

@foreach(menu() as $list)
        
  @if(jml_submenu($list->id) == 0)
    <li class="nav-item">
      <a href="/{{$list->url}}" class="nav-link {{setActive($list->url)}}">
        <i class="nav-icon {{$list->icon}}"></i>
        <p>{{$list->nama_menu}}</p>
      </a>
    </li>
  @else
  <li class="nav-item {{openMenu($list->url)}}">
    <a href="{{$list->url}}" class="nav-link {{setActive($list->url)}}">
      <i class="nav-icon {{$list->icon}}"></i>
      <p>
        {{$list->nama_menu}}
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      @foreach(submenu($list->id) as $lsub)
      <li class="nav-item">
        <a href="/{{$lsub->url}}" class="nav-link {{setActive($lsub->url)}}">
          <i class="far fa-circle nav-icon"></i>
          <p>{{$lsub->nama_menu}} </p>
        </a>
      </li>
      @endforeach
    </ul>
  </li>
  @endif

@endforeach
    
    <!-- <li class="nav-item">
      <a href="/home" class="nav-link @if(Request::segment(1)== 'home') active @endif">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>

    <li class="nav-header">Setting</li>
    <li class="nav-item">
      <a href="/user" class="nav-link @if(Request::segment(1)== 'user') active @endif">
        <i class="nav-icon fas fa-users"></i>
        <p>
          Manajemen User
        </p>
      </a>
    </li>
    <li class="nav-item @if(Request::segment(1)== 'data-master') menu-open @endif">
      <a href="#" class="nav-link @if(Request::segment(1)== 'data-master') active @endif">
        <i class="nav-icon fa fa-database"></i>
        <p>
          Master Data
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/data-master/sektor" class="nav-link @if(Request::segment(2)== 'jenis_pelanggaran') active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Sektor </p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item @if(Request::segment(1)== 'setting') menu-open @endif">
      <a href="#" class="nav-link @if(Request::segment(1)== 'setting') active @endif">
        <i class="nav-icon fa fa-cog"></i>
        <p>
          Setting
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/setting/menu" class="nav-link @if(Request::segment(2)== 'menu') active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Menu </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/setting/role" class="nav-link @if(Request::segment(2)== 'role') active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Role </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/setting/role-menu" class="nav-link @if(Request::segment(2)== 'role-menu') active @endif">
            <i class="far fa-circle nav-icon"></i>
            <p>Role Menu</p>
          </a>
        </li>
      </ul>
    </li>
    
    <li class="nav-item">
      <a href="/logout" class="nav-link">
        <i class="nav-icon fa fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
    </li> -->

  </ul>
</nav>
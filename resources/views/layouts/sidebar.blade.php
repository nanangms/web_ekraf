<!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="/profil/{{encrypt(auth()->user()->id)}}">
          <img src="{{auth()->user()->getAvatarProfil()}}" class="img-circle elevation-2" alt="User Image" style="object-fit: cover; position: relative; width: 40px; height: 40px; overflow: hidden;">
              </a>
          
        </div>
        <div class="info">
          <a href="/profil/{{encrypt(auth()->user()->id)}}" class="d-block">{{auth()->user()->name}} <br>{{auth()->user()->email}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->
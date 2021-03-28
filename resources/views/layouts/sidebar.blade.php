<!-- Sidebar user (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <a href="/profil/{{auth()->user()->uuid}}">
    <img src="{{auth()->user()->getAvatarProfil()}}" class="img-circle elevation-2" alt="User Image" style="object-fit: cover; position: relative; width: 40px; height: 40px; overflow: hidden;">
        </a>
    
  </div>
  <div class="info">
    <a href="/profil/{{auth()->user()->uuid}}" class="d-block">{{auth()->user()->name}}</a>
  </div>
</div>
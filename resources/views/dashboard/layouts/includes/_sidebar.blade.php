<aside>
      <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none;">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion" style="display: block;">
          <p class="centered"><a href="profile.html"><img src="{{asset('asset/img/admin.png')}}" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{auth()->user()->name}}</h5>
          <li class="sub-menu dcjq-parent-li">
          </li>
          <li class="mt">
            <a class="" href="/dashboard">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>

          @if(auth()->user()->role == 'osis')
          <li class="sub-menu dcjq-parent-li">
            <a href="/siswa-telat" class="dcjq-parent">
              <i class="fa fa-users"></i>
              <span>Siswa Telat Hari Ini</span>
              <span class="dcjq-icon"></span></a>
          </li>
          <li class="sub-menu dcjq-parent-li">
            <a href="/data-siswa" class="dcjq-parent">
              <i class="fa fa-users"></i>
              <span>Seluruh Data Siswa Telat</span>
              <span class="dcjq-icon"></span></a>
          </li>
          @endif

          @if(auth()->user()->role == 'wakasek')
          <li class="sub-menu dcjq-parent-li">
            <a href="/siswa-telat" class="dcjq-parent">
              <i class="fa fa-users"></i>
              <span>Siswa Telat Hari Ini</span>
              <span class="dcjq-icon"></span></a>
          </li>
          <li class="sub-menu dcjq-parent-li">
            <a href="/data-siswa" class="dcjq-parent">
              <i class="fa fa-users"></i>
              <span>Seluruh Data Siswa Telat</span>
              <span class="dcjq-icon"></span></a>
          </li>
          @endif

          @if(auth()->user()->role == 'admin')
          <li class="sub-menu dcjq-parent-li">
            <a href="/data-siswa-smkn2" class="dcjq-parent">
              <i class="fa fa-users"></i>
              <span>Data Siswa SMKN 2</span>
              <span class="dcjq-icon"></span></a>
          </li>
          <li class="sub-menu dcjq-parent-li">
            <a href="/data-seksi" class="dcjq-parent">
              <i class="fa fa-users"></i>
              <span>Data Seksi OSIS</span>
              <span class="dcjq-icon"></span></a>
          </li>
          <li class="sub-menu dcjq-parent-li">
            <a href="/data-kelas" class="dcjq-parent">
              <i class="fa fa-home"></i>
              <span>Data Kelas</span>
              <span class="dcjq-icon"></span></a>
          </li>
          <li class="sub-menu dcjq-parent-li">
            <a href="/siswa-telat" class="dcjq-parent">
              <i class="fa fa-users"></i>
              <span>Siswa Telat Hari Ini</span>
              <span class="dcjq-icon"></span></a>
          </li>
          @endif

          @if(auth()->user()->role == 'admin' or 'osis')
          <li class="sub-menu dcjq-parent-li">
            <a href="/logout" class="dcjq-parent">
              <i class="fa fa-sign-out"></i>
              <span>Logout</span>
              <span class="dcjq-icon"></span></a>
          </li>
          @endif
          
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>



<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>


		  </ul>
	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  <!-- full Screen -->
	      <li class="search-bar">
			  <div class="lookup lookup-circle lookup-right">
			     <input type="text" name="s">
			  </div>
		  </li>

          {{-- @php
          $user = DB::table('users')->where('id',Auth::user()->id)->first();
         @endphp --}}
	      <!-- User Account-->
          <li class="dropdown user user-menu">
			<a style="border-radius: 50%; background-color:aliceblue; margin-right:20px;" href="#" class="waves-effect waves-light dropdown-toggle p-0" data-toggle="dropdown">
                <img style="width: auto;" src="{{ asset('upload/logo_new_circle.png') }}" alt="">
			</a>
			<ul class="dropdown-menu animated flipInX">
			  <li class="user-body">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a type="submit" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                </a>
                </form>

                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> --}}
                {{-- <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="ti-lock text-muted mr-2"></i> Logout</a> --}}
			  </li>
			</ul>
          </li>


        </ul>
      </div>
    </nav>
  </header>

@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<aside style="font-size: 22px;" class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
                <a href="{{ route('web.dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
					 <div class="d-block align-items-center justify-content-center">
						  <img style="width: 70px;" src="{{ asset('upload/logo_new_circle.png') }}" alt="">
                           @if(Auth::check())

                          <h4> {{ Auth::user()->name }}</h4>
              @endif					 </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{ ($route == 'web.dashboard')?'active':'' }}" >
            <a href="{{ route('web.dashboard') }}">
              <i data-feather="pie-chart"></i>
              <span> الصفحة الرئيسية</span>
            </a>
          </li>

        {{-- <li class="treeview { {{ ($prefix == '/users')?'active':'' }}" >
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>ادارة المستخدمين</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>عرض المستخدمين</a></li>
            <li><a href="{{ route('users.add') }}"><i class="ti-more"></i>اضافة مستخدم</a></li>
          </ul>
        </li> --}}

        {{-- <li class="treeview  {{ ($prefix == '/profile')?'active':'' }} ">
            <a href="#">
              <i data-feather="grid"></i> <span>ادارة بياناتك</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
          <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>عرض بياناتك الشخصية</a></li>
          <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>تغيير رمز حسابك</a></li>

            </ul>
          </li> --}}



          <li class="treeview {{ ($prefix == '/receipts_user')?'active':'' }}">
            <a href="#">
              <i data-feather="credit-card"></i> <span>ادارة الوصولات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

           <li><a style="font-size: 20px" href="{{ route('receipts_user.receipt.view') }}"><i class="ti-more"></i>عرض الوصولات</a></li>
           <li><a style="font-size: 20px"  href="{{ route('receipts_user.receipt.add') }}"><i class="ti-more"></i>اضافة وصل</a></li>


            </ul>
          </li>

      </ul>
    </section>

	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>



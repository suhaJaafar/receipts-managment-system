@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp


<aside  style="font-size: 22px;"  class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('admin.dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-block align-items-center justify-content-center">
						  <img style="width: 70px;" src="{{ asset('upload/logo_new_circle.png') }}" alt="">
                          @if (isset($currentAdmin))
                          <p>{{ $currentAdmin->name }}</p>
                      @endif
                     </div>
				</a>
			</div>
        </div>

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">

		<li class="{{ ($route == 'admin.dashboard')?'active':'' }}" >
            <a href="{{ route('admin.dashboard') }}">
              <i data-feather="pie-chart"></i>
              <span> الصفحة الرئيسية</span>
            </a>
          </li>

          <li class="treeview {{ ($prefix == '/receipts_admin')?'active':'' }}">
            <a href="#">
              <i data-feather="credit-card"></i> <span>ادارة الوصولات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

           <li><a  style="font-size: 20px;"  href="{{ route('receipts_admin.receipt.view') }}"><i class="ti-more"></i>عرض الوصولات</a></li>
           <li><a  style="font-size: 20px;"  href="{{ route('receipts_admin.receipt.add') }}"><i class="ti-more"></i>اضافة وصل</a></li>


            </ul>
          </li>

          <li class="treeview {{ ($prefix == '/accounts')?'active':'' }}">
            <a href="#">
              <i data-feather="credit-card"></i> <span>ادارة الحسابات</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
                <li><a  style="font-size: 20px;"  href="{{ route('accounts.create') }}"><i class="ti-more"></i>اضافة حساب</a></li>
                <li><a  style="font-size: 20px;"  href="{{ route('accounts.show') }}"><i class="ti-more"></i>عرض حساب</a></li>
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



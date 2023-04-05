@extends('user.user_master')

@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">



			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title"> تفاصيل الوصل </h3>
                  <a href="{{ route('receipts_user.print', $receipts->first()->name) }}" target="_blank" class="btn btn-primary float-right">طباعة الوصل</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <div class="row">

                        <h4 class="col-6"><strong>التاريخ : </strong>{{ $receipts->first()->created_at->format('Y-m-d') }} </h4>
                        <h4 class="col-6"><strong>الكود : </strong>{{ $receipts->first()->code}} </h4>

<h4 class="col-6"><strong>أسم الزبون : </strong>{{ $receipts->first()->name }} </h4>
<h4 class="col-6"><strong>العنوان : </strong>{{ $receipts->first()->address}} </h4>
</div>

{{-- @if ($receipts->first()->user)
        <p>Created by: {{ $receipts->first()->user->name }}</p>
    @elseif ($receipts->first()->admin)
        <p>تم انشاءه بواسطة: {{ $receipts->first()->admin->name }}</p>
    @endif --}}
<div class="col-md-4">

</div>

					<div class="table-responsive">
					  <table class="table table-bordered table-striped">
						<thead class="thead-light">
			<tr>
				{{-- <th width="5%">SL</th> --}}
				<th> التفاصيل</th>
                <th width="25%">العدد</th>
				<th width="25%">سعر المفرد</th>
				<th width="25%"> المبلغ الكلي</th>

			</tr>
		</thead>
		<tbody>
                        @foreach($receipts as $receipt)
                                        <tr>
                                            <td>{{$receipt->item}}</td>
                                            <td>{{$receipt->count}}</td>
                                            <td>{{$receipt->single_price}}  <span>د.ع</span></td>
                                            <td>{{$receipt->amount}}  <span>د.ع</span></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" align="right"><strong>المجموع :</strong></td>
                                            <td>{{ $total_amount }} <span>د.ع</span></td>
                                        </tr>
                                    </tfoot>
					  </table>
                      <div style="padding-right: 10px;" align="right">
                        @if ($receipts->first()->user)
                            <p>تم انشاءه بواسطة: {{ $receipts->first()->user->name }}</p>
                        @elseif ($receipts->first()->admin)
                            <p>تم انشاءه بواسطة: {{ $receipts->first()->admin->name }}</p>
                        @endif
                        </div>


{{-- align="left" --}}
                        @if(Auth::check())
                        <div style="text-align: center; padding-left:30px;" >
                            <div style="">
                          <h5>اسم المستخدم</h5>
                          <h4 >{{ Auth::user()->name }}</h4></div>
                        </div>
                    @endif
                        </div>
                            {{-- <h4 style="padding-left: 15px;">{{ Auth::guard('admin')->name }}</h4> --}}


                </div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->


			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->

	  </div>
  </div>




<script>
    function printData()
    {
        window.print();
    }
</script>

@endsection

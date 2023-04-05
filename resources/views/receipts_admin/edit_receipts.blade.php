@extends('admin.admin_master')
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

				</div>
				<!-- /.box-header -->
				<div class="box-body">
                    <div class="row">

                    </div>

                    <div class="col-md-4">

                    </div>
                    <div class="table-responsive">
                        <form method="POST" action="{{ route('receipts_admin.receipt.update', $data->name) }}">
                            @csrf
                            @method('PUT')

                            <label  style="font-size:20px;" for="name">  أسم الزبون : </label>
                            <input type="text" name="name" value="{{ $data->name }}">

                            <label  style="font-size:20px;" for="address">  العنوان : </label>
                            <input type="text" name="address" value="{{ $data->address }}">

                            <table class="table">
                            <thead>
                                <tr style="font-size:22px;">
                                <th>التفاصيل</th>
                                <th>العدد</th>
                                <th>سعر المفرد</th>
                                <th>المبلغ الكلي</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data->items as $key => $item)
                                <tr>
                                    <td>
                                    <input type="text" class="form-control" name="item[]" value="{{ $item->item }}">
                                    </td>
                                    <td>
                                    <input type="text" class="form-control" name="count[]" value="{{ $item->count }}">
                                    </td>
                                    <td>
                                    <input type="text" class="form-control" name="single_price[]" value="{{ $item->single_price }}">
                                    </td>
                                    <td>
                                    <input type="text" class="form-control" name="amount[]" value="{{ $item->amount }}">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                                <input  style="font-size:22px;" type="submit"  class="btn btn-primary" value="تعديل الوصل">
                            {{-- <button type="submit" class="btn btn-primary">Update Receipt</button> --}}
                        </form>
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


@endsection


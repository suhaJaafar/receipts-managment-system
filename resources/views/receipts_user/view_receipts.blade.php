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
				    <h3 class="box-title">الوصولات </h3>
	                <a href="{{ route('receipts_user.receipt.add') }}" style="float: left; background-color: #609966; color:white" class="btn mb-5">أضافة وصل</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					    <table id="example1" class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>
                <th>الكود</th>
				<th>اسم الزبون</th>
                <th>التاريخ</th>
				<th width="50%">Action</th>
				{{-- <th width="25%">Action</th> --}}

			</tr>
		</thead>
		<tbody>

            @foreach($alldata as $key => $receipt)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $receipt->code }}</td>
                <td>{{ $receipt->name }}</td>
                <td>{{ $receipt->created_at->format('Y-m-d')  }}</td>

                <td style="display: flex;">
                    <a style="margin-left: 10px; background-color: #609966" href=" {{ route('receipts_user.receipt.details', ['name' => $receipt->name]) }}" class=" btn btn-success">عرض التفاصيل</a>
                    <a  style="margin-left: 10px;" class=" btn btn-secondary" href="{{ route('receipts_user.receipt.edit', ['name' => $receipt->name]) }}">تعديل الوصل</a>
                    {{-- <form action="{{ route('receipts_admin.receipt.delete', ['name' => $receipt->name]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a   href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-danger delete-receipt">حذف الوصل</a>
                    </form> --}}


                    </td>
                        </tr>
                    @endforeach

						</tbody>
						<tfoot>

						</tfoot>
					  </table>
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



  {{-- <script>
    $(document).on('click', '.delete-receipt', function(event) {
  event.preventDefault();
  var receiptId = $(this).data('receipt-id');
  var confirmation = confirm('Are you sure you want to delete this receipt?');
  if (confirmation) {
    $.ajax({
      url: $(this).attr('href'),
      type: 'DELETE',
      data: {
        _token: "{{ csrf_token() }}",
        id: receiptId
      },
      success: function(response) {
        // remove the row from the HTML table
        $('#row_' + receiptId).remove();
      },
      error: function(error) {
        console.log(error);
      }
    });
  }
});

</script> --}}
@endsection

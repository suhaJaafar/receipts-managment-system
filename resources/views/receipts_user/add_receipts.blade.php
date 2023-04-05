@extends('user.user_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">اضافة وصل </h4>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('user_store.receipts.receipt') }}">
	 	@csrf
					  <div class="row">
						<div class="col-12">
                            <div class="add_item">


<div class="row">
<div class="col-6">

		<div class="form-group">
		<h5> اسم الزبون <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control" >
	 @error('name')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>

	</div>
</div>
    <div class="col-6">

    <div class="form-group">
		<h5> العنوان<span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="address" class="form-control" >
	 @error('address')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>

	</div>
</div>
</div>

<div class="row">
    <div class="col-md-4">

    <div class="form-group">
		<h5> التفاصيل <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="item[]" class="form-control" >
	 @error('item')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
    </div>
    </div>
      <div class="col-md-4">

        <div class="form-group">
            <h5> العدد <span class="text-danger">*</span></h5>
            <div class="controls">
         <input type="text" name="count[]" class="form-control" >
         @error('count')
         <span class="text-danger">{{ $message }}</span>
         @enderror
          </div>


	</div>
    </div>
    <div class="col-md-4">

        <div class="form-group">
            <h5> سعر المفرد <span class="text-danger">*</span></h5>
            <div class="controls">
         <input type="text" name="single_price[]" class="form-control" >
         @error('single_price')
         <span class="text-danger">{{ $message }}</span>
         @enderror
          </div>

        </div>
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

    <div class="col-md-2 mb-28" style="padding-top: 25px;">
        <span class="btn btn-success addeventmore" style="margin-bottom: 30px;"><i class="fa fa-plus-circle"></i> </span>
        </div><!-- End col-md-2 -->
    {{-- </div> --}}




                        </div>

                            </div>
                        </div>
                      </div><br>
    <div class="text-xs-right">
        <input type="submit" class="btn btn-secondary mb-5" value="Submit">
    </div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>





	  </div>
  </div>






  <div style="visibility: hidden;">
    <div class="whole_extra_item_add w-full " id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add w-full" id="delete_whole_extra_item_add">




                <div class="row">
                    <div class="col-3">

                        <div class="form-group">
                            <h5> التفاصيل <span class="text-danger">*</span></h5>
                            <div class="controls">
                        <input type="text" name="item[]" class="form-control" >
                        @error('item')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        </div>
                    </div>


                        <div class="col-3">

                            <div class="form-group">
                                <h5> العدد <span class="text-danger">*</span></h5>
                                <div class="controls">
                            <input type="text" name="count[]" class="form-control" >
                            @error('count')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            </div>
                        </div>

                        <div class="col-3">

                            <div class="form-group">
                                <h5> سعر المفرد <span class="text-danger">*</span></h5>
                                <div class="controls">
                            <input type="text" name="single_price[]" class="form-control" >
                            @error('single_price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            </div>
                        </div>


                    <div class="col-3" style="padding-top: 25px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> </span>

                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>

                    </div><!-- End col-md-2 -->
                </div>





        </div>
    </div>
  </div>



  <script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",'.removeeventmore',function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1
        });

    });
</script>



@endsection

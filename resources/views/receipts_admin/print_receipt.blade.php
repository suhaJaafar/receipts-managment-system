<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Print Receipt</title>
    <style>
        body{
            direction: rtl;
        }

@media print {
.qrcode{
    /* width: 50px;
    height: 50px; */
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    text-align: right;
    margin-right: 50px;
    padding-right: 50px;

}
    .print-footer {
    margin-left: 50px;
    /* align="left" */
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    text-align: left;
    font-size: 12px;
    padding: 10px;
  }
  /* .print-footer-right {
    margin-right: 50px;
    /* align="left"
    position: fixed;
    bottom: 0;
    left: 0;
    /* width: 100%;
    text-align: right;
    /* font-size: 12px;
    /* padding: 10px;
  } */
    a[href]:after {
      content: none !important;
   }
   @page {
      margin: 0;
      padding: 0;
      content: "";
   }
}
        img{
            width: 140px;

        }
        .divwatermark{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #watermark
            {
            margin-top: 90%;

            position:fixed;
            /* bottom:5px;
            right:5px; */
            opacity:0.1;
            z-index:99;
            color:white;
            }
    </style>
</head>
<body>
    <div style=""  class="">
        <header class="  border-bottom" >
            {{--  --}}
<div style="display: flex; justify-content: center;" class=" align-items-center justify-content-center justify-content-md-between mb-0">
            <div  style="display: block; text-align: center; " class=" nav col-4 col-md-auto mb-2 justify-content-center mb-md-0">
                <h5>شركة طريق اضواء دجلة</h5>
                <h6>للتجارة و المقاولات العامة </h6>
                <h6> و تقنيات المعلومات </h6>
            </div>
          {{-- <ul class="nav col-6 col-md-auto mb-2 justify-content-center mb-md-0">
            <li>شركة طريق اضواء دجلة للتجارة و المقاولات العامة و تقنيات المعلومات  </li>

          </ul> --}}
            <a style=" text-align: center; width:200px; " href="" class="nav mb-2 mt-2 col-6 justify-content-center">
                <img src="{{ asset('upload/logo_new_circle.png') }}" alt="Logo">
            </a>
            <div  style="display: block; text-align: center; padding-left:-30px;" class=" nav col-5 col-md-auto mb-2 justify-content-center mb-md-0">
                <h5>.Dijla Lights Road Co</h5>
                <h6>For General Trading, Contracting</h6>
                <h6>Information Technologies & </h6>
            </div>

          {{-- <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
          </div> --}}
          {{-- <ul >
            <li> </li>

          </ul> --}}
        </div>
        <div style="    line-height: 0.5; display: flex; justify-content: center; padding-left:80px; padding-right:30px;" class=" pt-0 mt-0 align-items-center justify-content-center justify-content-md-between mb-1">
            <div  style="display: block;" class=" col-5 col-md-auto mb-2 justify-content-center mb-md-0">
                <p style="font-size: 12px" class=""><small>  الفرع الاول/بغداد-الكرادة-عرصات الهندية-مقابل شركة زين </small></p>
                <p style="font-size: 12px"><small> الفرع الثاني/بغداد-الكرادة-مقابل مصرف التنمية الدولي </small>  </p>
                <p style="font-size: 12px"><small> الفرع الثالث/البصرة-شارع الجزائر </small></p>


            </div>
          {{-- <ul class="nav col-6 col-md-auto mb-2 justify-content-center mb-md-0">
            <li>شركة طريق اضواء دجلة للتجارة و المقاولات العامة و تقنيات المعلومات  </li>

          </ul> --}}
            <div style=" text-align: right; width:60px; " class=" mb-3 mt-2 col-1 justify-content-center">
<h6>www.dlr.iq
   </h6>
    <h6> info@dlr.iq</h6>
</div>
            <div  style="display: block; text-align: left;   line-height: 0.4 " class=" col-6 col-md-auto mb-2 justify-content-center mb-md-0">
                <p style="font-size: 17px;"> 9647906699333+</p>
                <p style="font-size: 17px">9647726699333+</p>
                <p style="font-size: 17px">9647826699333+</p>
                <p style="font-size: 17px">9647709714443+</p>

            </div>


            </div>
        </header>

      </div>


    <div class="">
        <div class="divwatermark">
        <a  id="watermark" style=" text-align: center; " href="" class="">
            <img style="width: 450px;" src="{{ asset('upload/logo_new_circle.png') }}" alt="Logo">
        </a></div>
        <div style="margin-top:10px;" class="row">
        <h6 style="margin-right:30px; "  class="col-6"><strong>التاريخ : </strong>{{ $receipts->first()->updated_at}} </h6>
    <h6 style="padding-right: 45px;" class="col-5"><strong>الكود : </strong>{{ $receipts->first()->code}} </h6>

        <h4 style="margin-right:30px; " class="col-7 "><strong>حضرة السيد : </strong>{{ $receipts->first()->name }}  <span>المحترم</span></h4>
    <h6 class="col-4"><strong>العنوان : </strong>{{ $receipts->first()->address}} </h6></div>

    <div class="container mt-3">
       <table class="table table-striped table-bordered">
    <thead>
        <tr style="background-color: #AB2B2C;  color:white;">
            {{-- <th width="5%">SL</th> --}}
            <th s> التفاصيل</th>
            <th width="25%">العدد</th>
            <th width="25%">سعر المفرد</th>
            <th width="25%">المبلغ الكلي </th>

        </tr>
      </thead>
      <tbody>
        @foreach($receipts as $receipt)
        <tr>
            <td>{{$receipt->item}}</td>
            <td>{{$receipt->count}}</td>
            <td>{{$receipt->single_price}} <span>د.ع</span></td>
            <td>{{$receipt->amount}}  <span>د.ع</span></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" align="right"><strong>المجموع : </strong></td>
            <td>{{ $total_amount }} <span>د.ع</span></td>
        </tr>
    </tfoot>
    </table>

  </div>
    <div class="qrcode">

    <p>{{ $qrCode }}</p>

    </div>


  {{-- @if(Auth::check())
            <div class="print-footer">
            <h5>اسم المستخدم</h5>
            <h4 style="padding-left: 20px;">{{ Auth::user()->name }}</h4></div>
@endif --}}
</div>
    <script type="text/javascript">
        // Open print dialog
        window.print();
    </script>
</body>


</html>

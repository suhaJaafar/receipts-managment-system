@extends('user.user_master')
@section('admin')



<div style=" " class="content-wrapper">
    <div style=" text-align: center; padding-top:20px;" class="container">
        @if (Session::has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ session::get('error') }}</strong>
            <a href="" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </a>
        </div>
        @endif
        
        <div class="box box-outline-success">
            <div class="box-header">
            <h4 class="box-title"><strong>
                <a style="border-radius: 50%;" href="#" class=" p-0" data-toggle="dropdown" title="User">
                    <img style="width: 150px;" src="{{ asset('upload/logo_new_circle.png') }}" alt="">
                </a>
                <h3 >شركة طريق اضواء دجلة</h3>
                <h3>للتجارة و المقاولات العامة و تقنيات المعلومات</h3>
        </strong></h4>
            <div class="box-tools pull-right">
            </div>
            </div>

            <div class="box-body">
                <h2 style="padding-bottom:20px;" class=" ">نظام أدارة الوصولات</h2>
                <h3> اسم المستخدم: {{ Auth::user()->name }}</h3>
                <h3> الايميل :  {{ Auth::user()->email }}</h3>
            </div>
        </div>
        </div>
    </div>

@endsection

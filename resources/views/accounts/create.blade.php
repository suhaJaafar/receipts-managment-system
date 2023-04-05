@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->



    <div class="container">
        <h1>أنشاء حساب</h1>

            <form style="width: 60%; " class=" " method="POST" action="{{ route('accounts.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label for="email">الايميل</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="password">الرمز</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">تأكيد الرمز</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password">
                    </div>

                    <div class="form-group">
                        <label for="role">الصلاحية</label>
                        <select class="form-control" id="role" name="role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="text-xs-right">
                        <input style="font-size:22px" type="submit" class=" btn btn-secondary mb-5" value="أنشاء">
                    </div>
                </form>
    </div>
    </div>
</div>
@endsection


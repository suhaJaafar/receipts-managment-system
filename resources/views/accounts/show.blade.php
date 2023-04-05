@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->


    <div class="container">
        <div class="row p-20">
            <div class=" col-9"><h2 class="">الحسابات</h2></div>
            <div class=" col-3"><a style="background-color: #609966; color:white" href="{{ route('accounts.create') }}" class="btn btn-lg p-3 ">اضافة حساب جديد</a>
    </div>
        </div>

        <table class="table">
            <thead>
                <tr style="font-size:19px;" class="">
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th>الحالة</th>
                    <th>تاريخ الانشاء</th>
                    <th> حذف الحساب</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $account)
                <tr id="row_{{ $account->id }}">
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->email }}</td>
                    <td>{{ ucfirst($account->role) }}</td>
                    <td>{{ $account->created_at ? $account->created_at->format('d/m/Y') : '' }}</td>
                    <td>
                        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a style="padding:10px;" href="#" class="btn btn-danger btn-sm delete-account">
                                <i style="font-size:15px;" class="fa fa-trash"></i>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    </div>
</div>
<script>
    // Add a click event listener to all delete-account links
    document.querySelectorAll('.delete-account').forEach(link => {
        link.addEventListener('click', event => {
            // Prevent the default click event
            event.preventDefault();

            // Disable the delete button to prevent multiple clicks
            link.disabled = true;

            // Show a confirmation dialog using SweetAlert
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this account!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the delete form
                    link.parentElement.submit();
                } else {
                    // Re-enable the delete button if the user cancels
                    link.disabled = false;
                }
            });
        });
    });
</script>


@endsection

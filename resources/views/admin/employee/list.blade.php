@extends('layouts.app')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card m-3">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Employee</b></div>
			<div class="col col-md-6">
				<a href="{{ route('employee.create') }}" class="btn btn-success btn-sm float-end">Add</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered data-table">
			<thead>
				<tr>
					<th>First name</th>
					<th>Last name</th>
					<th>Company</th>
					<th>Email</th>
					<th>Phone</th>
					<th >Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		
	</div>
</div>

<script>
	$(function () {
        
		var table = $('.data-table').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('employee.list') }}",
			columns: [
				{data: 'first_name', name: 'first_name'},
				{data: 'last_name', name: 'last_name'},
				{data: 'company_details.name', name: 'company_details.name'},
				{data: 'email', name: 'email'},
				{data: 'phone', name: 'phone'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
			]
		});
		$('.dataTables_filter').addClass('pull-right');
	});
    function deleted(id){
                Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, delete it!"
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.replace("{{ route('employee.destroy')}}?id="+id);
                            }
        });
    }

</script>
@endsection


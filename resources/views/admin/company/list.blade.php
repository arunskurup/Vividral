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
			<div class="col col-md-6"><b>Company</b></div>
			<div class="col col-md-6">
				<a href="{{ route('company.create') }}" class="btn btn-success btn-sm float-end">Add</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table class="table table-bordered mb-5">
			<tr>
				<th>Logo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Website</th>
				<th>Action</th>
			</tr>
			@if(count($Company) > 0)

				@foreach($Company as $row)

					<tr>
						<td>
                            @if ($row->logo)
                            <img src="{{ asset($row->logo) }}" width="75" />
                            @endif
                        </td>
						<td>{{ $row->name }}</td>
						<td>{{ $row->email }}</td>
						<td>{{ $row->website }}</td>
						<td>
								<a href="{{ route('company.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
								<a href="{{ route('company.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a onclick="deleted({{$row->id}})" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>

				@endforeach

			@else
				<tr>
					<td colspan="5" class="text-center">No Data Found</td>
				</tr>
			@endif
		</table>
        <div class="d-flex justify-content-center">
            {!! $Company->links('pagination::bootstrap-5') !!}
        </div>
		
	</div>
</div>

<script>
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
                                window.location.replace("{{ route('company.destroy')}}?id="+id);
                            }
        });
    }

</script>
@endsection


@extends('layouts.app')

@section('content')
@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>

@endif

<div class="card m-5">
	<div class="card-header">Add Employee</div>
	<div class="card-body">
		<form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">First Name</label>
				<div class="col-sm-10">
					<input type="text" name="first_name" required class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Last Name</label>
				<div class="col-sm-10">
					<input type="text" name="last_name" required class="form-control" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Company</label>
				<div class="col-sm-10">	
					<select name="company" class="form-control">
						@foreach ($Company as $item)
						     <option value="{{$item->id}}">{{$item->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Email</label>
				<div class="col-sm-10">
					<input type="email" name="email" class="form-control" />
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Phone</label>
				<div class="col-sm-10">
					<input type="text" name="phone" class="form-control" pattern="/^+91(7\d|8\d|9\d)\d{9}$/" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>	
		</form>
	</div>
</div>
@endsection
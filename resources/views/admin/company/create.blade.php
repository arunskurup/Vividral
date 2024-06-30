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
	<div class="card-header">Add Company</div>
	<div class="card-body">
		<form method="post" action="{{ route('company.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" required class="form-control" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Email</label>
				<div class="col-sm-10">
					<input type="email" name="email" class="form-control" />
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Website</label>
				<div class="col-sm-10">
					<input type="text" name="website" class="form-control" />
				</div>
			</div>
			
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Logo</label>
				<div class="col-sm-10">
					<input type="file" name="logo" />
				</div>
			</div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			</div>	
		</form>
	</div>
</div>
@endsection
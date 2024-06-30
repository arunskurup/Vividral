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
	<div class="card-header">Edit Company</div>
	<div class="card-body">
		<form method="post" action="{{ route('company.update') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" required value="{{ $Company->name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" value="{{ $Company->email }}" />
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Website</label>
				<div class="col-sm-10">
					<input type="text" name="website" class="form-control" value="{{ $Company->website }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Logo</label>
				<div class="col-sm-10">
					<input type="file" name="logo" />
					<br />
					<img src="{{ asset($Company->logo) }}" width="100" class="img-thumbnail" />
					{{-- <input type="hidden" name="logo" value="{{ $Company->logo }}" /> --}}
				</div>
			</div>
			<div class="text-center">
				<input type="hidden" name="id" value="{{ $Company->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>


@endsection


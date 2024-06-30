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
		<form method="post" action="{{ route('employee.update') }}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">First Name</label>
				<div class="col-sm-10">
					<input type="text" name="first_name" class="form-control" required value="{{ optional($Employee)->first_name }}" />
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Last Name</label>
				<div class="col-sm-10">
					<input type="text" name="last_name" class="form-control" required value="{{ optional($Employee)->last_name }}" />
				</div>
			</div>
			<div class="row mb-4">
				<label class="col-sm-2 col-label-form">Company</label>
				<div class="col-sm-10">	
					<select name="company" class="form-control">
						@foreach ($Company as $item)
						     <option value="{{$item->id}}" {{optional($Employee)->company == $item->id ? 'selected':''}}>{{$item->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Email</label>
				<div class="col-sm-10">
					<input type="text" name="email" class="form-control" value="{{ optional($Employee)->email }}" />
				</div>
			</div>
            <div class="row mb-3">
				<label class="col-sm-2 col-label-form">Phone</label>
				<div class="col-sm-10">
					<input type="text" name="phone" class="form-control" value="{{ optional($Employee)->phone }}" />
				</div>
			</div>
		
			<div class="text-center">
				<input type="hidden" name="id" value="{{ optional($Employee)->id }}" />
				<input type="submit" class="btn btn-primary" value="Edit" />
			</div>	
		</form>
	</div>
</div>


@endsection


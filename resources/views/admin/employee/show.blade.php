@extends('layouts.app')

@section('content')
<div class="card m-5">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Employee Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('employee.list') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>First Name</b></label>
			<div class="col-sm-10">
				{{ optional($Employee)->first_name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Last Name</b></label>
			<div class="col-sm-10">
				{{ optional($Employee)->first_name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Company</b></label>
			<div class="col-sm-10">
				{{ optional($Employee->company_details)->name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Email</b></label>
			<div class="col-sm-10">
				{{ optional($Employee)->email }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Phone</b></label>
			<div class="col-sm-10">
				{{ optional($Employee)->phone }}
			</div>
		</div>
		
	</div>
</div>


@endsection


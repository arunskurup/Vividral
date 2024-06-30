@extends('layouts.app')

@section('content')
<div class="card m-5">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Company Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('company.list') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Name</b></label>
			<div class="col-sm-10">
				{{ optional($Company)->name }}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Email</b></label>
			<div class="col-sm-10">
				{{ optional($Company)->email }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Web Site</b></label>
			<div class="col-sm-10">
				{{ optional($Company)->website }}
			</div>
		</div>
		<div class="row mb-4">
			<label class="col-sm-2 col-label-form"><b>Logo</b></label>
			<div class="col-sm-10">
				<img src="{{ asset(optional($Company)->logo) }}" width="200" class="img-thumbnail" />
			</div>
		</div>
	</div>
</div>


@endsection


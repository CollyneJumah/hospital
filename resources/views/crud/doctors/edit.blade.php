@extends('layouts.main')
@section('content')
    <div class="content">
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<h4 class="page-title">Edit Doctor:<span class="pull-right" title="back to doctors"><a class="btn btn-info btn-sm" href="{{ route('doctors.index')}}"><i class="fa fa-step-backward"></i></a></span></h4>
				@include('pages.message')
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<form action="{{ route('doctors.update', $editDoctor->id)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
					@csrf
					@method('PATCH')
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Full Name <span class="text-danger">*</span></label>
								<input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $editDoctor->name }}" name="name" id="name" type="text">
								@error('name')
									<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						
						<div class="col-sm-4">
							<div class="form-group">
								<label>Email <span class="text-danger">*</span></label>
								<input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email') ?? $editDoctor->email }}">
							@error('email')
								<span class="invalid-feedback">
								<strong>{{ $message }}</strong>
								</span>
							@enderror
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Phone <span class="text-danger">*</span> </label>
								<input class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $editDoctor->phone }}" type="tel">
								@error('phone')
									<span class="invalid-feedback">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Gender<span class="text-danger">*</span></label>
								<select class="form-control @error('gender') is-invalid @enderror" name="gender">
									<option>{{$editDoctor->gender}}</option>
									<option>Male</option>
									<option>Female</option>
								</select>
								@error('county')
									<span class="invalid-feedback">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
						<div class="col-sm-12"><hr>
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>County<span class="text-danger">*</span></label>
										<select class="form-control @error('county') is-invalid @enderror" name="county">
											<option>{{$editDoctor->county->name}}</option>
											@foreach ($county as $count)
											<option>{{$count->name}}-</option>
											@endforeach
										</select>
										@error('county')
											<span class="invalid-feedback">
											<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Address<span class="text-danger">*</span></label>
										<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') ?? $editDoctor->address}}">
										@error('address')
											<span class="invalid-feedback">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="col-sm-4 col-md-4 col-lg-4">
									<div class="form-group">
										<label>Postal Code</label>
										<input type="text" name="postalcode" class="form-control @error('postalcode') is-invalid @enderror" value="{{ old('postalcode') ?? $editDoctor->postalcode }}">
										@error('postalcode')
											<span class="invalid-feedback">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Avatar/Profile picture</label>
								<div class="form-group">
									<input type="file" name="profile" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Department/Role<span class="text-danger">*</span></label>
								<select class="form-control @error('department') is-invalid @enderror" name="department">
									<option>{{$editDoctor->departments->name }}</option>
									<option value="">--Select Department--</option>
									@foreach ($department as $depart)
								    	<option value="{{ $depart->id }}">{{$depart->name }}</option>
									@endforeach
								</select>
								@error('department')
									<span class="invalid-feedback">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="text-center m-t-20">
						<button type="submit" class="btn btn-primary submit-btn">Update Doctor</button>
					</div>
				</form>
			</div>
		</div>
    </div>    
@endsection
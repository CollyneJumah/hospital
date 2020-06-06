@extends('layouts.main')
@section('content')
    <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Edit Doctor</h4>
                    </div>
                </div>
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
								<div class="col-sm-6">
									<div class="form-group">
										<label>Doctor Id <span class="text-danger">*</span></label>
										<input class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id" type="number" id="doctor_id" value="{{ old('doctor_id') ?? $editDoctor->phone}}"> 
									@error('doctor_id')
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
											<option value="">{{old('gender') ?? $editDoctor->gender}}</option>
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
													<option value="">{{ old('county') ?? $editDoctor->county}}-</option>
													<option>Nairobi</option>
													<option>Kisumu</option>
													<option>Nakuru</option>
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
										<div class="profile-upload">
											<div class="upload-img">
												<img alt="" src="assets/img/user.jpg">
											</div>
											<div class="upload-input">
												<input type="file" name="profile" class="form-control">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Department/Role<span class="text-danger">*</span></label>
										<select class="form-control @error('department') is-invalid @enderror" name="department">
											<option value="">{{ old('department') ?? $editDoctor->department }}</option>
											<option>Dentist</option>
											<option>Neurology</option>
											<option>Opthalmology</option>
											<option>Orthopedics	</option>
											<option>Cancer Department</option>
											<option>ENT Department</option>
										</select>
										@error('department')
											<span class="invalid-feedback">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="m-t-20 text-center">
								<button type="submit" class="btn btn-primary submit-btn">Create Doctor</button>
							</div>
                		</form>
                    </div>
                </div>
            </div>    
@endsection
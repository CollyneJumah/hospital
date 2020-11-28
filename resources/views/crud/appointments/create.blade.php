@extends('layouts.main')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Appointment</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{route('appointments.store')}}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Patient Name</label>
                                <select class="select form-control @error('patient_id') is-invalid @enderror" id="selectPatient" name="patient_id">
                                    <option value="">Select</option>
                                   @forelse ($arrayAll['showPatients'] as $patients)
                                       <option value="{{ $patients->id}}">{{ $patients->first_name }} {{ $patients->last_name }}</option>
                                   @empty
                                       <option value="">No patient found</option>
                                   @endforelse
                                </select>
                                @error('patient_id')
                                    <span class="invalid-feedback">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department</label>
                                <select class="select form-control @error('department_id') is-invalid @enderror" name="department_id">
                                    <option value="">--Select--</option>
                                    @forelse ($arrayAll['showDepartments'] as $department)
                                        <option value="{{ $department->id}}">{{ $department->name }}</option>
                                    @empty
                                        <option value="">No department found</option>
                                    @endforelse
                                </select>
                                @error('department_id')
                                <span class="invalid-feedback">{{ $message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Doctor</label>
                                <select class="select form-control @error('doctor_id') is-invalid @enderror" name="doctor_id">
                                    <option value="">--Select--</option>
                                    @forelse ($arrayAll['showDoctors'] as $doctor)
                                        <option value="{{ $doctor->id}}">{{ $doctor->name }}</option>
                                    @empty
                                        <option value="">No doctor found</option>
                                    @endforelse
                                </select>
                                @error('doctor_id')
                                    <span class="invalid-feedback">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="cal-icon">
                                    <input type="date" class="form-control datetimepicker @error('appointment_date') is-invalid @enderror" name="appointment_date" value="{{ old('appointment_date')}}">
                                    @error('appointment_date')
                                        <span class="invalid-feedback">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Time</label>
                                <div class="time-icon">
                                    <input type="time" class="form-control  @error('appointment_time') is-invalid @enderror" id="datetimepicker3" name="appointment_time"value="{{ old('appointment_time')}}">
                                    @error('appoimtment_time')
                                        <span class="invalid-feedback">{{ $message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Patient Email</label>
                                <input class="form-control  @error('email') is-invalid @enderror" readonly  type="email" id="patientEmail" name="email" value="{{ old('email')}}">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Patient Phone Number</label>
                                <input class="form-control @error('phone') is-invalid @enderror" readonly type="text" id="patientPhone" name="phone" value="{{ old('phone')}}">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea cols="30" rows="4" class="form-control  @error('remark') is-invalid @enderror" name="remark">{{ value('remark')}}</textarea>
                        @error('remark')
                            <span class="invalid-feedback">{{ $message}}</span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label class="display-block">Appointment Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input  @error('status') is-invalid @enderror" type="radio" name="status" id="product_active" value="option1" checked>
                            <label class="form-check-label" for="product_active">
                            Active
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="product_inactive" value="option2">
                            <label class="form-check-label" for="product_inactive">
                            Inactive
                            </label>
                        </div>
                    </div> --}}
                    <div class="text-center m-t-20">
                        <button type="submit" class="btn btn-primary submit-btn">Create Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
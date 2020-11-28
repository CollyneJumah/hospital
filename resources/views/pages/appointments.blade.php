@extends('layouts.main')
@section('content')
     <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Appointments</h4>
            </div>
            <div class="text-right col-sm-8 col-9 m-b-20">
                <a href="{{route('appointments.create')}}" class="float-right btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Appointment</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                {{-- <th>Appointment ID</th> --}}
                                <th>Patient Name</th>
                                <th>Birth</th>
                                <th>Doctor Name</th>
                                <th>Department</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($arrayAppointment['showAppointments'] as $appointment)
                                <tr>
                                    {{-- <td>APT0001</td> --}}
                                   <td><img width="28" height="28" src="{{URL::to('assets/img/user.jpg')}}" class="rounded-circle m-r-5" alt="">
                                       {{$appointment->patients->first_name }}
                                    
                                    </td>
                                
                                    <td>{{$appointment->patients->date_of_birth}}</td>
                                    <td>{{$appointment->doctors->name}}</td>
                                    <td>{{$appointment->departments->name}}</td> 
                               
                                    <td>{{$appointment->appointment_date}}</td>
                                    <td>{{$appointment->appointment_time}}</td>
                                    <td>
                                        @if ($appointment->status == 1)
                                            <span class="custom-badge status-green">Active</span>
                                        @else
                                            <span class="custom-badge status-red">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            no appointments
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
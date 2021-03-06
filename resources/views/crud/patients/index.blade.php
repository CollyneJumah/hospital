@extends('layouts.main')
@section('content')
     <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Patients</h4>
                @include('pages.message')
            </div>
            <div class="text-right col-sm-8 col-9 m-b-20">
                <a href="{{ route('patients.create')}}" class="float-right btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Patient</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table mb-0 table-border table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Contacts Details</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($showPatients as $patients)
                                <tr>
                                    <td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> {{$patients->first_name}} {{$patients->last_name }}</td>
                                    <td>{{ $patients->address}}, {{$patients->county}}, {{$patients->postal_code}}</td>
                                    <td>{{ $patients->phone}}</td>
                                    <td>{{ $patients->email}}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('patients.show', $patients)}} {{ $patients->first_name}} {{ rand()}}"><i class="fa fa-user m-r-5"></i>Profile</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
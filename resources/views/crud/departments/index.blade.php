@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-5">
            <h4 class="page-title">Departments <sup><span class="badge badge-info badge-pilled">{{ $countDepartment}}</span></sup> </h4>
            </div>
            <div class="text-right col-sm-7 col-7 m-b-30">
                <a href="{{ route('departments.create')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i>Add Department</a>
                {{-- @include('crud.departments.create') --}}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table mb-0 table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department Name</th>
                                <th>Description</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $key=>$depart)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $depart->name }}</td>
                                    <td>{{ $depart->description }}</td>
                                    <td>{{ $depart->created_by }}</td>
                                    <td>{{ $depart->created_at->diffForHumans()}}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('departments.edit', $depart->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" onclick="confirm('You\'re about to delete {{ $depart->name}}') ? document.getElementById('delete-department-{{$depart->id}}').submit(): '' " ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                <form action="{{ route('departments.destroy',$depart->id)}}" method="post" id="delete-department-{{$depart->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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
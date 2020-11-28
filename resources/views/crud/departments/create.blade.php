@extends('layouts.main')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Department</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{route('departments.store')}}" autocomplete="off">
                    @csrf
                    <div class="form-group input-group-sm">
                        <label for="department-name">Department Name</label>
                        <input class="form-control form-control-sm @error('name') is-invalid @enderror" id="department-name" name="name" type="text" value="{{ old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea cols="30" rows="4" name="description" class="form-control @error('description') is-invalid @enderror">
                            {{old('description')}}
                        </textarea>
                        @error('description')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn">Create Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
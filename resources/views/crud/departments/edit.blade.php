@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <span class="pull-right" title="Back to department list"> <a href="{{ route('departments.index') }}" class="btn btn-info btn-sm"> <i class="fa fa-backward"></i> </a>  </span>
                <h4 class="page-title">Update Department</h4>
                <hr>
            </div>
            @include('pages.error')

        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{route('departments.update', $editDepartment->id )}}" autocomplete="off">
                    @csrf
					@method('PATCH')
                    <div class="form-group">
                        <label>Department Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name') ?? $editDepartment->name }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea cols="30" rows="4" name="description" class="form-control @error('description') is-invalid @enderror">
                            {{ old('description') ?? $editDepartment->description }}
                        </textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
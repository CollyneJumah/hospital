{{-- @if($errors->any())
  @foreach ($errors->all() as $error)
  <div class="alert alert-danger alert-dismissible fade show" id="error" role="alert">
            <strong>Error!</strong> {{ $error }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
      
  @endforeach
@endif --}}

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" id="error" role="alert">
      <strong>Success!</strong> {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
@endif

{{--====================deleting data=============== --}}
 @if(session('danger'))
<div class="alert alert-danger alert-dismissable fade show">
  {{ session('danger')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 

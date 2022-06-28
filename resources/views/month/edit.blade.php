{{-- @extends('layouts.app')

@section('content') --}}

<style>
    .adj {
        padding: 10px;
    }
</style>
<div class="adj">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center font-weight-bolder">
                <h4 class="font-weight-bold">Edit Month</h4>
            </div>
       
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('monthupdate', $month->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" value="{{ $month->month }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a href="{{route('getmonth')}}" class="btn btn-danger">close</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
</div>
{{-- @endsection --}}
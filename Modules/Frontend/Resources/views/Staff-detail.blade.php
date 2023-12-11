@extends('frontend::layouts.master')
{{-- call from layouts --}}

@section('content')
    <h1>{{ $staff->name }}</h1>
            <a href="{{ route('stafflist') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px; width:150px; border-radius: 25px;">
                <i class="fa fa-rotate-left"></i> {{ trans('frontend::tamplete.menu.return') }}
            </a>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            @if ($staff->image !=='')
                        <img src="@thumbnail($staff->image->path,'mediumThumb')" class="card-img-top" alt="..."  width="100" height="120" style="object-fit: cover">
                    @else
                        <img src="{{ Module::asset('StaffMgt:image/null.jpg') }}" alt="" width="100" height="120" style="object-fit: cover"> 
            @endif
          </div>
          <div class="col-md-8">
            <div class="card-body">
                {{-- <label>Full Name :</label> --}}
                <span class="card-title">{{ $staff->name }}</span><br>
                {{-- <label>Gender :</label> --}}
                <span class="">{{ $staff->present()->gender }}</span><br>
                {{-- <label>Date of Birth :</label> --}}
                <span class="">{{ $staff->dob }}</span><br>
                {{-- <label>Department Name :</label> --}}
                <span class="">{{ $staff->department->name}}</span><br>
                {{-- <label>Description :</label> --}}
                <span class="">{!! $staff->description !!}</span><br>
                <label>Hire Date :</label>
                <strong class="text-danger">{{ $staff->hire_date }}</strong>
            </div>
          </div>
        </div>
      </div>
@endsection
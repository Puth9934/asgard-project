@extends('frontend::layouts.master')
{{-- call from layouts --}}

@section('content')
    <h1 class="text-center">{{ trans('frontend::tamplete.menu.staff-list') }}</h1>
    {{-- {{ $staff }} --}}
    <div class="row"  style="padding-top:20px;  justify-content: center; margin-top:30px;">
        @foreach ($staffs as $staff )
            <div class="col-md-3">
                <div class="card" style="">
                    @if ($staff->image !=='')
                        <img src="@thumbnail($staff->image->path,'mediumThumb')" class="card-img-top" alt="..."  width="100" height="160" style="object-fit: cover">
                    @else
                        <img src="{{ Module::asset('StaffMgt:image/null.jpg') }}" alt="" width="100" height="160" style="object-fit: cover"> 
                    @endif
                    <div class="card-body">
                      <h2 class="card-title"> {{ $staff->name }}</h2>
                      <div >{{ $staff->present()->gender }}</div>
                      <div>{!! $staff->description !!}</div>
                      <div class="text-danger">{{ $staff->hire_date }}</div>
                      <a href="{{ route('staffDetail', ['id'=> $staff->id]) }}" class="btn btn-primary mt-4">{{ trans('frontend::tamplete.menu.view-detail') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
   
@endsection
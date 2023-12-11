@extends('frontend::layouts.master')
{{-- call from layouts --}}

@section('content')
    <h1 class="text-center">{{ trans('frontend::tamplete.menu.department') }}</h1>
    {{-- {{ $staff }} --}}
        
    <div class="row text-center  table-borderless table-dark"  style="padding-top:20px;  justify-content: center; margin-top:30px; width:400px; margin-left:500px; ">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">{{ trans('frontend::tamplete.menu.id') }}</th>
                <th scope="col">{{ trans('frontend::tamplete.menu.department') }}</th>
                <th scope="col">{{ trans('frontend::tamplete.menu.create_at') }}</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($departments as $dep)
                    <tr>
                        <th>{{ $dep->id }}</th>
                        <th>{{ $dep->name }}</th>
                        <th>{{ $dep->created_at }}</th>
                    </tr>
                @endforeach

            </tbody>
          </table>
    </div>
   
@endsection
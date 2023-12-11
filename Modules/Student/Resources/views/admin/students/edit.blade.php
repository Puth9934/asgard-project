@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('student::students.title.edit student') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.student.student.index') }}">{{ trans('student::students.title.students') }}</a></li>
        <li class="active">{{ trans('student::students.title.edit student') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.student.student.update', $student->id], 'method' => 'put']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('student::admin.students.partials.edit-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label("department_id", 'Department') !!}
                            <select name="department_id" id="department_id" class="form-control">
                                @foreach ($departments as $dep)
                                    <option value="{{ $dep->id }}" {{ $student->department_id == $dep->id ? 'selected' : '' }}> {{ $dep->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {!! Form::label("group_id", 'Group') !!}
                            <select name="group_id" id="group_id" class="form-control">
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" {{ $student->group_id == $group->id ? 'selected' : '' }}> {{ $group->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        

                        <div class="form-group{{ $errors->has("dob") ? ' has-error' : '' }}">
                            {!! Form::label("dob", 'Date of Birth:') !!}
                            <div class='input-group date' id='dob'>
                                <input name="dob" value="{{ old('dob', $student->dob) }}" type='date' class="form-control" />
                            </div>
                            {!! $errors->first("dob", '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class='form-group{{ $errors->has("phone") ? ' has-error' : '' }}'>
                            {!! Form::label("phone", 'Phone') !!}
                            {!! Form::text("phone", old("phone", $student->phone), ['class' => 'form-control', 'placeholder' => 'Phone Number']) !!}
                            {!! $errors->first("phone", '<span class="help-block">:message</span>') !!}
                        </div>

                        <div class='form-group{{ $errors->has("email") ? ' has-error' : '' }}'>
                            {!! Form::label("email", 'email') !!}
                            {!! Form::text("email", old("email", $student->email), ['class' => 'form-control', 'placeholder' => 'email Number']) !!}
                            {!! $errors->first("email", '<span class="help-block">:message</span>') !!}
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.student.student.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.student.student.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        }); 
    </script>
        <script>
            $(document).ready(function () {
                // When the Department select changes
                $('#department_id').change(function () {
                    // Get the selected Department ID
                    var departmentId = $(this).val();
                    
                    // AJAX request to get Subject based on the selected Department
                    $.ajax({
                        url: '{{ route("getGroup", ":departmentId") }}'.replace(':departmentId', departmentId),
                        type: 'GET',
                        success: function (data) {
                            console.log(data);
                            
                            // Clear existing options
                            $('#group_id').empty();
    
                            $('#group_id').append('<option disabled="true" selected>Select Group</option>')
                            
                            // Populate the subject select with new options
                            $.each(data, function (key, value) {
                                $('#group_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                });
            });
        </script> 
        
@endpush

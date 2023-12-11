@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('teachermgt::teachers.title.create teacher') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.teachermgt.teacher.index') }}">{{ trans('teachermgt::teachers.title.teachers') }}</a></li>
        <li class="active">{{ trans('teachermgt::teachers.title.create teacher') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.teachermgt.teacher.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('teachermgt::admin.teachers.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach
                    <div class="box-body">
                    @mediaSingle('image')
                            <div class="form-group">
                                    {!! Form::label("gender_id", 'Gender:') !!}
                                    <select name="gender_id" id="gender_id" class="form-control">
                                        <option disabled="true" selected>Select Gender</option>
                                        @foreach ($genders as $id => $gender)
                                            <option value="{{ $id }}" >{{ $gender }}</option>
                                        @endforeach
                                    </select>
                                    {{-- get from controller, status.php and Presenter  --}}
                        
            
                            <div class="form-group{{ $errors->has("dob") ? ' has-error' : '' }}">
                                {!! Form::label("dob", 'Date of Birth:') !!}
                                <div class='input-group date' id='dob'>
                                    <input name="dob" type='date' class="form-control" />
                                </div>
                                {!! $errors->first("dob", '<span class="help-block">:message</span>') !!}
                            </div>
                            
                            <div class='form-group{{ $errors->has("phone") ? ' has-error' : '' }}'>
                                {!! Form::label("phone", 'Phone') !!}
                                {!! Form::text("phone", old("phone"), ['class' => 'form-control', 'placeholder' => 'Phone Number']) !!}
                                {!! $errors->first("phone", '<span class="help-block">:message</span>') !!}
                            </div>
                            
                            <div class='form-group{{ $errors->has("email") ? ' has-error' : '' }}'>
                                {!! Form::label("email", 'email') !!}
                                {!! Form::text("email", old("email"), ['class' => 'form-control', 'placeholder' => 'Your Email']) !!}
                                {!! $errors->first("email", '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group{{ $errors->has("hire_date") ? ' has-error' : '' }}">
                                {!! Form::label("hire_date", 'Hire_date:') !!}
                                <div class='input-group date' id='hire_date'>
                                    <input name="hire_date" type='date' class="form-control" />
                                </div>
                                {!! $errors->first("hire_date", '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label("department_id", 'Department') !!}
                                <select name="department_id" id="department_id" class="form-control">
                                    {{-- <option value="1" > Department A </option>
                                    <option value="2" > Department B </option>
                                    <option value="3" > Department C </option> --}}
                                    <option disabled="true" selected>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" > {{ $department->name }} </option>
                                    @endforeach
                                    {{-- when undefine goto check controller and check create and edit --}}
                                </select>
                            </div>
                            <div class="form-group">
                                {!! Form::label("subjects_id", 'subjects') !!}
                                <select name="subjects_id" id="subjects_id" disabled="true"  class="form-control">
                                    <option disabled="true" selected>Select Subjects</option>
                                    @foreach ( $subjects as $id => $sub)
                                        <option value="{{ $sub->id }}" > {{ $sub->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.teachermgt.teacher.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
                    { key: 'b', route: "<?= route('admin.teachermgt.teacher.index') ?>" }
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
                url: '{{ route("getSubject", ":departmentId") }}'.replace(':departmentId', departmentId),
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    // Enable the Subject select
                    $('#subjects_id').prop('disabled', false);
                    
                    // Clear existing options
                    $('#subjects_id').empty();
                    
                    // Populate the subject select with new options
                    $.each(data, function (key, value) {
                        $('#subjects_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script> 

@endpush

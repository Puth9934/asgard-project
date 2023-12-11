@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('staffmgt::staff.title.create staff') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.staffmgt.staff.index') }}">{{ trans('staffmgt::staff.title.staff') }}</a></li>
        <li class="active">{{ trans('staffmgt::staff.title.create staff') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.staffmgt.staff.store'], 'method' => 'post']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('staffmgt::admin.staff.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach
                    <div class="box-body">
                        @mediaSingle('image') 
                        @mediaMultiple('images')
                        <div style="display: flex">
                            <div class="form-group{{ $errors->has("gender_id") ? ' has-error' : '' }}" >
                                {!! Form::label("gender_id", 'Gender:') !!}
                                <select name="gender_id" id="gender_id" class="form-control" style="width: 150px;">
                                    <option disabled="true" selected>Select Gender</option>
                                    @foreach ($genders as $id => $gender)
                                        <option value="{{ $id }}" {{ old('gender_id',3) == $id ? 'selected' : '' }}>{{ $gender }}</option>
                                    @endforeach
                                    {{-- <option value="0">Male</option>
                                    <option value="1">Female</option> --}}
                                </select>
                                {!! $errors->first("gender_id", '<span class="help-block">:message</span>') !!}
                            </div>    
                            <div class="form-group{{ $errors->has("dob") ? ' has-error' : '' }}" style="margin-left: 50px;border-radius: 50px;">
                                {!! Form::label("dob", 'Date of Birth:') !!}
                                <div class='input-group date' id='dob'>
                                    <input name="dob" value="{{ old('dob') }}" type='date' class="form-control" />
                                </div>
                                {!! $errors->first("dob", '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group{{ $errors->has("hire_date") ? ' has-error' : '' }}" style="margin-left: 50px">
                                {!! Form::label("hire_date", 'Hire Date:') !!}
                                <div class='input-group date' id='hire_date'>
                                    <input name="hire_date" value="{{ old('hire_date') }}" type='date' class="form-control" />
                                </div>
                                {!! $errors->first("hire_date", '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has("department_id") ? ' has-error' : '' }}"  style="width: 160px">
                            {!! Form::label("department_id", 'Department') !!}
                            <select name="department_id" id="department_id" class="form-control">
                                {{-- <option value="1" > Department A </option>
                                <option value="2" > Department B </option>
                                <option value="3" > Department C </option> --}}
                                <option disabled="true" selected>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id', 0) == $department->id ? 'selected' : '' }} > {{ $department->name }} </option>
                                @endforeach
                                {{-- when undefine goto check controller and check create and edit, function department in staff.php --}}
                            </select>
                            {!! $errors->first("department_id", '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.staffmgt.staff.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
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
                    { key: 'b', route: "<?= route('admin.staffmgt.staff.index') ?>" }
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
@endpush

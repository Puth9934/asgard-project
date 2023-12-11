<div class="box-body">
    
    <div class='form-group{{ $errors->has("name") ? ' has-error' : '' }}'>
        {!! Form::label("name", 'Name') !!}
        {!! Form::text("name", old("name"), ['class' => 'form-control', 'placeholder' => 'Group Name']) !!}
        {!! $errors->first("name", '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label("department_id", 'Department') !!}
        <select name="department_id" id="department_id" class="form-control">
            <option disabled="true" selected>Select Department</option>
            @foreach ($departments as $dep)
                <option value="{{ $dep->id }}" > {{ $dep->name }} </option>
            @endforeach
        </select>
    </div>

</div>

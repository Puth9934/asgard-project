<div class="box-body">
    
    <div class='form-group{{ $errors->has("name") ? ' has-error' : '' }}'>
        {!! Form::label("name", 'Name') !!}
        {!! Form::text("name", old("name",$subjects->name), ['class' => 'form-control', 'placeholder' => 'Group Name']) !!}
        {!! $errors->first("name", '<span class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label("department_id", 'Department') !!}
        <select name="department_id" id="department_id" class="form-control">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}"{{ $subjects->department_id == $department->id ? 'selected' : '' }}  > {{ $department->name }} </option>
            @endforeach
            {{-- <option value="1" >D1</option>
            <option value="2" >D2</option>
            <option value="3" >D3</option> --}}
        </select>
    </div>

</div>



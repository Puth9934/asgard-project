<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.first_name") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[first_name]", 'First Name:') !!}
        {!! Form::text("{$lang}[first_name]", old("$lang.first_name", $student->first_name), ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
        {!! $errors->first("$lang.first_name", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("$lang.last_name") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[last_name]", 'Last Name:') !!}
        {!! Form::text("{$lang}[last_name]", old("$lang.last_name", $student->last_name), ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
        {!! $errors->first("$lang.last_name", '<span class="help-block">:message</span>') !!}
    </div>
    <div class='form-group{{ $errors->has("$lang.address") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[address]", 'Address:') !!}
        {!! Form::text("{$lang}[address]", old("$lang.address", $student->address), ['class' => 'form-control', 'placeholder' => 'Address']) !!}
        {!! $errors->first("$lang.address", '<span class="help-block">:message</span>') !!}
    </div>
</div>

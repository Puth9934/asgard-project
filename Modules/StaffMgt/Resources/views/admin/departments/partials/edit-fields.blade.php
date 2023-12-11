<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.name") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[name]", 'Full Name:') !!}
        {!! Form::text("{$lang}[name]", old("$lang.name", $department->name), ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
        {!! $errors->first("$lang.first_name", '<span class="help-block">:message</span>') !!}
    </div>
</div>

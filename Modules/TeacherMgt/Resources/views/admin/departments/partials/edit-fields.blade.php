<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.name") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[name]", 'Label Text') !!}
        {!! Form::text("{$lang}[name]", old("$lang.title",$department->name), ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
        {!! $errors->first("$lang.name", '<span class="help-block">:message</span>') !!}
    </div>
</div>

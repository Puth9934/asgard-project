<div class="box-body">
    <div class='form-group{{ $errors->has("$lang.name") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[name]", 'Full Name:') !!}
        {!! Form::text("{$lang}[name]", old("$lang.name",$staff->name), ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
        {!! $errors->first("$lang.first_name", '<span class="help-block">:message</span>') !!}
    </div>
    {{-- <div class='form-group{{ $errors->has("$lang.description") ? ' has-error' : '' }}'>
        {!! Form::label("{$lang}[description]", 'Description:') !!}
        {!! Form::text("{$lang}[description]", old("$lang.description",$staff->description), ['class' => 'form-control', 'placeholder' => 'Description']) !!}
        {!! $errors->first("$lang.description", '<span class="help-block">:message</span>') !!}
    </div> --}}
    @editor('description', trans('description'), old("{$lang}.description",$staff->description), $lang)
</div>

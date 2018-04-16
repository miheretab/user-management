<div class="form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
    {!! Form::label('first_name', trans('forms.label_first_name'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::text('first_name', old('first_name'), array('id' => 'first_name', 'class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="form-group has-feedback row {{ $errors->has('surname') ? ' has-error ' : '' }}">
    {!! Form::label('surname', trans('forms.label_surname'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::text('surname', old('surname'), array('id' => 'surname', 'class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="form-group has-feedback row {{ $errors->has('south_african_id_number') ? ' has-error ' : '' }}">
    {!! Form::label('sidn', trans('forms.label_sidn'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::text('south_african_id_number', old('south_african_id_number'), array('id' => 'sidn', 'class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="form-group has-feedback row {{ $errors->has('mobile_number') ? ' has-error ' : '' }}">
    {!! Form::label('mobile_number', trans('forms.label_mobile_number'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::text('mobile_number', old('mobile_number'), array('id' => 'mobile_number', 'class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
    {!! Form::label('email', trans('forms.label_email'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::email('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'required')) !!}
        </div>
        @if ($errors->has('email'))
        <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
        </div>
    </div>
</div>
<div class="form-group has-feedback row {{ $errors->has('birth_date') ? ' has-error ' : '' }}">
    {!! Form::label('birth_date', trans('forms.label_birth_date'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::text('birth_date', old('birth_date'), array('id' => 'birth_date', 'class' => 'form-control date', 'data-provide' => "datepicker")) !!}
        </div>
        @if ($errors->has('birth_date'))
        <span class="help-block">{{ $errors->first('birth_date') }}</span>
        @endif
    </div>
</div>
<!--<div class="form-group has-feedback row {{ $errors->has('password') ? ' has-error ' : '' }}">
    {!! Form::label('password', trans('forms.label_password'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ')) !!}
        </div>
        @if ($errors->has('password'))
        <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
    </div>
</div>
<div class="form-group has-feedback row {{ $errors->has('password_confirmation') ? ' has-error ' : '' }}">
    {!! Form::label('password_confirmation', trans('forms.label_password_confirmation'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control ')) !!}
        </div>
    </div>
</div>-->
<div class="form-group has-feedback row {{ $errors->has('language') ? ' has-error ' : '' }}">
    {!! Form::label('language', trans('forms.label_language'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        <div class="input-group">
            {!! Form::select('language_id', $languages, old('language_id'), array('id' => 'language', 'class' => 'form-control')) !!}
        </div>
    </div>
</div>
<div class="form-group has-feedback row {{ $errors->has('interests') ? ' has-error ' : '' }}">
    {!! Form::label('interests', trans('forms.label_interests'), array('class' => 'col-md-3 control-label')); !!}
    <div class="col-md-9">
        @foreach ($interests as $value => $name)
            <div class="form-check">
            {!! Form::checkbox('interests[]', $value, isset($user) ? array_key_exists($value, $user->interests->pluck('interest_id', 'id')->toArray()) : false, ['id' => 'interest' . $value, 'class' => 'form-check-input']); !!}
            {!! Form::label('interest' . $value, $name, ['class' => 'form-check-label']) !!}
            </div>
        @endforeach
    </div>
</div>
{!! Form::button('<i class="fa fa-fw fa-save" aria-hidden="true"></i> Save', array('class' => 'btn btn-info btn-lg margin-bottom-1 btn-save','type' => 'submit')) !!}

@extends('layouts.app')

@section('content')
<header>
   <h1>{{ __('Company') }}</h1>
</header>

<form method="post" action="/company/save" class="form" enctype="multipart/form-data">
    <div class="row">
        <div class="col">
            <label class="label-control">{{ __('Name') }} <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" value="{{ $company->name }}" maxlength="80" required="required" class="form-control">
        </div>
        <div class="col">
            <label class="label-control">{{ __('Country') }} <span class="text-danger">*</span></label>
            <select name="country_id" id="country_id" required class="form-control">
                <option value=""></option>
                @foreach ($countries as $country)
                <option value="{{ $country->code_2 }}" @if($company->country_id == $country->code_2) selected="selected" @endif>{{ $country->name }} {{ $country->flag }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <div class="col">
            <label class="label-control">{{ __('Tax identification') }} <span class="text-danger">*</span></label>
            <input type="text" name="tax_identification" id="tax_identification" maxlength="20" class="form-control">
        </div>
        <div class="col">

        </div>
    </div>
    <div class="row">
        <div class="col form-group">
            <label class="label-control">{{ __('Phone') }}</label>
            <input type="tel" name="phone" id="phone" value="{{ $company->phone }}" maxlength="15" class="form-control">
        </div>

        <div class="col form-group">
            <label class="label-control">E-mail <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" value="{{ $company->email }}" maxlength="254" required="required" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col form-group">
            <label class="label-control">{{ __('Website') }}</label>
            <input type="url" name="website" id="website" value="{{ $company->website }}" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col form-group">
            <label class="label-control">Logo</label>
            <input type="file" name="logo" id="logo" accept="image/png, image/gif, image/jpeg, image/svg" class="form-control">
        </div>
    </div>
    <div class="form-group mt-2">
        <a class="btn btn-secondary" href="{{ url('/company')}}">{{ __('Cancel') }}</a>
        <button type="submit" class="btn btn-primary"><span class=""></span> {{ __('Save') }}</button>
    </div>
    <input type="hidden" name="id" id="id" value="{{ $company->id }}">
    {{ csrf_field() }}
</form>

@endsection

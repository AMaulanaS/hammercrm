@extends('layouts.app')

@section('content')
<header>
   <h1>{{ __('Leads') }}</h1>
</header>

<div class="row">
    <div class="col">
        <a href="/lead/create" class="btn btn-primary">{{ __('New') }}</a>
    </div>
    <div class="col">
        <a href="/lead/import" class="btn btn-success">{{ __('Import') }} <i class="las la-file-csv"></i></a>
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <form method="post" class="form-inline mb-2">
            @csrf
            <div class="input-group">
                <input type="search" name="search" placeholder="{{ __('Search') }}" value="{{ !empty($search) ? $search : '' }}" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="btn-search"><i class="las la-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive mt-2">
    <table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th>#ID</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Business name') }}</th>
        <th>{{ __('Phone') }}</th>
        <th>E-mail</th>
        <th>Website</th>
        <th>{{ __('Country') }}</th>
        <th>{{ __('Seller') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Created at') }}</th>
        <th>{{ __('Updated at') }}</th>
        <th>{{ __('Actions') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($leads as $lead)
    <tr>
        <td>{{ $lead->id }}</td>
        <td>
            <a href="/lead/update/{{ $lead->id }}">{{ $lead->first_name }}</a>
        </td>
        <td>{{ $lead->last_name }}</td>
        <td>
            @if($lead->phone)
                <a href="https://api.whatsapp.com/send/?phone={{ $lead->phone }}&text={{ __('Hello') }}" target="_blank">{{ $lead->phone }}</a>
            @endif
        </td>
        <td>
            @if($lead->email)
            <a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
            @endif
        </td>
        <td>
            <a href="{{ $lead->website }}" target="_blank">{{ $lead->website }}</a>
        </td>
        <td>{{ $lead->country_id }}</td>
        <td>{{ $lead->seller->first_name }}</td>
        <td>{{ $lead->status }}</td>
        <td>{{ $lead->created_at->format('d/m/Y H:i') }}</td>
        <td>{{ $lead->updated_at->format('d/m/Y H:i') }}</td>
        <td>
            <a href="/lead/update/{{ $lead->id }}" class="btn btn-xs btn-warning text-white">
                <i class="las la-pen"></i>
            </a>
            <a onclick="Lead.delete({{ $lead->id }}, '{{ $lead->first_name }} {{ $lead->last_name }}');" class="btn btn-xs btn-danger">
                <i class="las la-trash-alt"></i>
            </a>
        </td>
    </tr>
    @endforeach
    </tbody>
    </table>

    <div>
        {{ $leads->links() }}
    </div>
</div>
@endsection

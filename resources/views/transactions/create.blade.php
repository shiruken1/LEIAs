@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Transactions / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('transactions.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('date')) has-error @endif">
                       <label for="date-field">Date</label>
                    <input type="text" id="date-field" name="date" class="form-control" value="{{ old("date") }}"/>
                       @if($errors->has("date"))
                        <span class="help-block">{{ $errors->first("date") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('category_id')) has-error @endif">
                       <label for="category_id-field">Category_id</label>
                    <input type="text" id="category_id-field" name="category_id" class="form-control" value="{{ old("category_id") }}"/>
                       @if($errors->has("category_id"))
                        <span class="help-block">{{ $errors->first("category_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('amount')) has-error @endif">
                       <label for="amount-field">Amount</label>
                    <input type="text" id="amount-field" name="amount" class="form-control" value="{{ old("amount") }}"/>
                       @if($errors->has("amount"))
                        <span class="help-block">{{ $errors->first("amount") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('capital_id')) has-error @endif">
                       <label for="capital_id-field">Capital_id</label>
                    <input type="text" id="capital_id-field" name="capital_id" class="form-control" value="{{ old("capital_id") }}"/>
                       @if($errors->has("capital_id"))
                        <span class="help-block">{{ $errors->first("capital_id") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('transactions.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
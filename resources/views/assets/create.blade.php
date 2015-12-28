@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Assets / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('assets.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('capital_id')) has-error @endif">
                       <label for="capital_id-field">Capital_id</label>
                    <input type="text" id="capital_id-field" name="capital_id" class="form-control" value="{{ old("capital_id") }}"/>
                       @if($errors->has("capital_id"))
                        <span class="help-block">{{ $errors->first("capital_id") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('amount')) has-error @endif">
                       <label for="amount-field">Amount</label>
                    <input type="text" id="amount-field" name="amount" class="form-control" value="{{ old("amount") }}"/>
                       @if($errors->has("amount"))
                        <span class="help-block">{{ $errors->first("amount") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('growth_rate')) has-error @endif">
                       <label for="growth_rate-field">Growth_rate</label>
                    <input type="text" id="growth_rate-field" name="growth_rate" class="form-control" value="{{ old("growth_rate") }}"/>
                       @if($errors->has("growth_rate"))
                        <span class="help-block">{{ $errors->first("growth_rate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('pattern')) has-error @endif">
                       <label for="pattern-field">Pattern</label>
                    <input type="text" id="pattern-field" name="pattern" class="form-control" value="{{ old("pattern") }}"/>
                       @if($errors->has("pattern"))
                        <span class="help-block">{{ $errors->first("pattern") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cycle_up')) has-error @endif">
                       <label for="cycle_up-field">Cycle_up</label>
                    <input type="text" id="cycle_up-field" name="cycle_up" class="form-control" value="{{ old("cycle_up") }}"/>
                       @if($errors->has("cycle_up"))
                        <span class="help-block">{{ $errors->first("cycle_up") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cycle_down')) has-error @endif">
                       <label for="cycle_down-field">Cycle_down</label>
                    <input type="text" id="cycle_down-field" name="cycle_down" class="form-control" value="{{ old("cycle_down") }}"/>
                       @if($errors->has("cycle_down"))
                        <span class="help-block">{{ $errors->first("cycle_down") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('assets.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@extends('layout')

@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Capitals / Edit #{{$capital->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('capitals.update', $capital->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ $capital->name }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('start_at')) has-error @endif">
                       <label for="start_at-field">Start_at</label>
                    <input type="text" id="start_at-field" name="start_at" class="form-control" value="{{ $capital->start_at }}"/>
                       @if($errors->has("start_at"))
                        <span class="help-block">{{ $errors->first("start_at") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('end_at')) has-error @endif">
                       <label for="end_at-field">End_at</label>
                    <input type="text" id="end_at-field" name="end_at" class="form-control" value="{{ $capital->end_at }}"/>
                       @if($errors->has("end_at"))
                        <span class="help-block">{{ $errors->first("end_at") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('date_start')) has-error @endif">
                       <label for="date_start-field">Date_start</label>
                    <input type="text" id="date_start-field" name="date_start" class="form-control" value="{{ $capital->date_start }}"/>
                       @if($errors->has("date_start"))
                        <span class="help-block">{{ $errors->first("date_start") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('date_end')) has-error @endif">
                       <label for="date_end-field">Date_end</label>
                    <input type="text" id="date_end-field" name="date_end" class="form-control" value="{{ $capital->date_end }}"/>
                       @if($errors->has("date_end"))
                        <span class="help-block">{{ $errors->first("date_end") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('income_start')) has-error @endif">
                       <label for="income_start-field">Income_start</label>
                    <input type="text" id="income_start-field" name="income_start" class="form-control" value="{{ $capital->income_start }}"/>
                       @if($errors->has("income_start"))
                        <span class="help-block">{{ $errors->first("income_start") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('income_end')) has-error @endif">
                       <label for="income_end-field">Income_end</label>
                    <input type="text" id="income_end-field" name="income_end" class="form-control" value="{{ $capital->income_end }}"/>
                       @if($errors->has("income_end"))
                        <span class="help-block">{{ $errors->first("income_end") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('expenses_start')) has-error @endif">
                       <label for="expenses_start-field">Expenses_start</label>
                    <input type="text" id="expenses_start-field" name="expenses_start" class="form-control" value="{{ $capital->expenses_start }}"/>
                       @if($errors->has("expenses_start"))
                        <span class="help-block">{{ $errors->first("expenses_start") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('expenses_end')) has-error @endif">
                       <label for="expenses_end-field">Expenses_end</label>
                    <input type="text" id="expenses_end-field" name="expenses_end" class="form-control" value="{{ $capital->expenses_end }}"/>
                       @if($errors->has("expenses_end"))
                        <span class="help-block">{{ $errors->first("expenses_end") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('capitals.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
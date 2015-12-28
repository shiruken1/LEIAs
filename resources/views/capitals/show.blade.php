@extends('layout')
@section('header')
<div class="page-header">
        <h1>Capitals / Show #{{$capital->id}}</h1>
        <form action="{{ route('capitals.destroy', $capital->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('capitals.edit', $capital->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$capital->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="start_at">START_AT</label>
                     <p class="form-control-static">{{$capital->start_at}}</p>
                </div>
                    <div class="form-group">
                     <label for="end_at">END_AT</label>
                     <p class="form-control-static">{{$capital->end_at}}</p>
                </div>
                    <div class="form-group">
                     <label for="date_start">DATE_START</label>
                     <p class="form-control-static">{{$capital->date_start}}</p>
                </div>
                    <div class="form-group">
                     <label for="date_end">DATE_END</label>
                     <p class="form-control-static">{{$capital->date_end}}</p>
                </div>
                    <div class="form-group">
                     <label for="income_start">INCOME_START</label>
                     <p class="form-control-static">{{$capital->income_start}}</p>
                </div>
                    <div class="form-group">
                     <label for="income_end">INCOME_END</label>
                     <p class="form-control-static">{{$capital->income_end}}</p>
                </div>
                    <div class="form-group">
                     <label for="expenses_start">EXPENSES_START</label>
                     <p class="form-control-static">{{$capital->expenses_start}}</p>
                </div>
                    <div class="form-group">
                     <label for="expenses_end">EXPENSES_END</label>
                     <p class="form-control-static">{{$capital->expenses_end}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('capitals.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
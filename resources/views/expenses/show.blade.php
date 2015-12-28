@extends('layout')
@section('header')
<div class="page-header">
        <h1>Expenses / Show #{{$expense->id}}</h1>
        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('expenses.edit', $expense->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="capital_id">CAPITAL_ID</label>
                     <p class="form-control-static">{{$expense->capital_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="capital_id">CAPITAL_ID</label>
                     <p class="form-control-static">{{$expense->capital_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$expense->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="amount">AMOUNT</label>
                     <p class="form-control-static">{{$expense->amount}}</p>
                </div>
                    <div class="form-group">
                     <label for="growth_rate">GROWTH_RATE</label>
                     <p class="form-control-static">{{$expense->growth_rate}}</p>
                </div>
                    <div class="form-group">
                     <label for="pattern">PATTERN</label>
                     <p class="form-control-static">{{$expense->pattern}}</p>
                </div>
                    <div class="form-group">
                     <label for="cycle_up">CYCLE_UP</label>
                     <p class="form-control-static">{{$expense->cycle_up}}</p>
                </div>
                    <div class="form-group">
                     <label for="cycle_down">CYCLE_DOWN</label>
                     <p class="form-control-static">{{$expense->cycle_down}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('expenses.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
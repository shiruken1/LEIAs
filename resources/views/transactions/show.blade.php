@extends('layout')
@section('header')
<div class="page-header">
        <h1>Transactions / Show #{{$transaction->id}}</h1>
        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('transactions.edit', $transaction->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <p class="form-control-static">{{$transaction->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="date">DATE</label>
                     <p class="form-control-static">{{$transaction->date}}</p>
                </div>
                    <div class="form-group">
                     <label for="category_id">CATEGORY_ID</label>
                     <p class="form-control-static">{{$transaction->category_id}}</p>
                </div>
                    <div class="form-group">
                     <label for="amount">AMOUNT</label>
                     <p class="form-control-static">{{$transaction->amount}}</p>
                </div>
                    <div class="form-group">
                     <label for="capital_id">CAPITAL_ID</label>
                     <p class="form-control-static">{{$transaction->capital_id}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('transactions.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
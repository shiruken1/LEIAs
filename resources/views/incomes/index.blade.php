@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Incomes
            <a class="btn btn-success pull-right" href="{{ route('incomes.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($incomes->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CAPITAL_ID</th>
                        <th>CAPITAL_ID</th>
                        <th>NAME</th>
                        <th>AMOUNT</th>
                        <th>GROWTH_RATE</th>
                        <th>PATTERN</th>
                        <th>CYCLE_UP</th>
                        <th>CYCLE_DOWN</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($incomes as $income)
                            <tr>
                                <td>{{$income->id}}</td>
                                <td>{{$income->capital_id}}</td>
                    <td>{{$income->capital_id}}</td>
                    <td>{{$income->name}}</td>
                    <td>{{$income->amount}}</td>
                    <td>{{$income->growth_rate}}</td>
                    <td>{{$income->pattern}}</td>
                    <td>{{$income->cycle_up}}</td>
                    <td>{{$income->cycle_down}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('incomes.show', $income->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('incomes.edit', $income->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('incomes.destroy', $income->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $incomes->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
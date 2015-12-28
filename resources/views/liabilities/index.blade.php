@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Liabilities
            <a class="btn btn-success pull-right" href="{{ route('liabilities.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($liabilities->count())
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
                        @foreach($liabilities as $liability)
                            <tr>
                                <td>{{$liability->id}}</td>
                                <td>{{$liability->capital_id}}</td>
                    <td>{{$liability->capital_id}}</td>
                    <td>{{$liability->name}}</td>
                    <td>{{$liability->amount}}</td>
                    <td>{{$liability->growth_rate}}</td>
                    <td>{{$liability->pattern}}</td>
                    <td>{{$liability->cycle_up}}</td>
                    <td>{{$liability->cycle_down}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('liabilities.show', $liability->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('liabilities.edit', $liability->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('liabilities.destroy', $liability->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $liabilities->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
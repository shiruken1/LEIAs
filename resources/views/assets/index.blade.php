@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Assets
            <a class="btn btn-success pull-right" href="{{ route('assets.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($assets->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                        @foreach($assets as $asset)
                            <tr>
                                <td>{{$asset->id}}</td>
                                <td>{{$asset->capital_id}}</td>
                    <td>{{$asset->name}}</td>
                    <td>{{$asset->amount}}</td>
                    <td>{{$asset->growth_rate}}</td>
                    <td>{{$asset->pattern}}</td>
                    <td>{{$asset->cycle_up}}</td>
                    <td>{{$asset->cycle_down}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('assets.show', $asset->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('assets.edit', $asset->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $assets->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
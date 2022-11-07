@extends('layouts.adminlte')

@section('content')
    @if (session()->has('message'))
        <div class="{{ session()->get('class') }}">{{ session()->get('message') }}</div>
    @endif


    <div class="card mx-2 my-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4"><h1>Critère d'inventaire</h1></div>
                <div class="col-md-6"></div>
                <div class="col-md-1">
                    <a href="{{route('criterias.create')}}" class="btn btn-success fw-bold">NOUVEAU</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example2">
                <thead>
                <th>Code</th>
                <th>Libellé</th>
                <th>Status</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($criterias as $criteria)
                    <tr>
                        <td>{!! $criteria->code !!}</td>
                        <td>{!! $criteria->label !!}</td>
                        <td>
                            @if($criteria->is_enabled)
                                <span class="alert alert-success">En ligne</span>
                            @else
                                <span class="alert alert-default">Hors ligne</span>
                            @endif
                        </td>
                        <td class="d-flex">
                            @if(\App\Helpers\Helper::userVerification(['gerant']))
                            <a href="{{route('criterias.edit', $criteria->id)}}" class="btn"><img src="{{asset('svg/modify.svg')}}" height="18" width="18"></a>
                            <a href="" class="btn"><img src="{{asset('svg/recu.svg')}}" height="18" width="18"></a>
                            <form method="post" action="{{route('criterias.destroy')}}">
                                @csrf
                                <input type="hidden" name="id" value={{$criteria->id}}>
                                <button type="submit" class="btn" onclick="return confirm('Etes vous sûrs?')"><img src="{{asset('svg/delete.svg')}}" height="18" width="18"></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection

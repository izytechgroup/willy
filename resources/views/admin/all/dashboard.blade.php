@extends('admin.body')



@section('body')
<div class="page-title">
    <h1>Dashboard</h1>
</div>

<div class="dashboard">
    <div class="container-fluid">
        <div class="cards row">
            <div class="col-sm-3">
                <div class="card blue">
                    <h2>{{ $users }}</h2>
                    <h4>Utilisateurs</h4>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card red">
                    <h2>{{ $songs }}</h2>
                    <h4>Audio</h4>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card green">
                    <h2>{{ $videos }}</h2>
                    <h4>Videos</h4>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

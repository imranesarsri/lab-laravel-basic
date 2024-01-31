@extends('Layouts.Layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Details de la tâche :</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tâch->name }}</h5>
                        <p class="card-text">{{ $tâch->description }}</p>
                        <div class="tags mt-3">
                            <span class="badge badge-primary">{{ $tâch->project->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="d-flex justify-content-end ">
                        <a href="{{ route('tâches.index') }}" class="btn btn-md btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endsection

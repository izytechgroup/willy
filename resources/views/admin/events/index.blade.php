@extends('admin.body')


@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('events.create') }}" class="btn btn-lg btn-green">
                <i class="flaticon-cross"></i> Nouvel Event
            </a>
        </div>

        <div class="title">
            Events
        </div>
    </div>

    <section class="page page-white">
        <div class="container-fluid">

            @include('errors.list')

            <div class="mt-10">
                <div class="row">
                    <form class="form" action="" method="get">
                        <div class="col-sm-4">
                            <div class="form-select grey">
                                <select class="" name="status">
                                    <option value="">All</option>
                                    <option value="published" {{ Request::get('status') == 'published' ? 'selected' : '' }}>Public</option>
                                    <option value="unpublished" {{ Request::get('status') == 'unpublished' ? 'selected' : '' }}>Privé</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text"
                                        name="keywords"
                                        class="form-control input-lg"
                                        value="{{ Request::get('keywords') }}"
                                        placeholder="Event title">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-lg btn-blue btn-block">
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="mt-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Statut</th>
                            <th>Date de l'event</th>
                            <th>Date de creation</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($events as $event)
                            <tr data-href="{{ route('events.edit', $event->id) }}">
                                <td class="bold">{{ $event->title }}</td>
                                <td>{{ $event->status === 'published' ? 'Public' : 'Privé'}}</td>
                                <td>{{ date('d/m/Y', strtotime($event->date)) }}</td>
                                <td>{{ date('d/m/Y H:i', strtotime($event->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End of table -->
        </div>
    </section>

@endsection

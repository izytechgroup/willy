@extends('admin.body')


@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('videos.create') }}" class="btn btn-lg btn-green">
                <i class="flaticon-cross"></i> Nouvelle Video
            </a>
        </div>

        <div class="title">
            Videos
        </div>
    </div>

    <section class="page page-white">
        <div class="container-fluid">

            @include('errors.list')

            <div class="mt-10">
                <div class="row">
                    <form class="form" action="" method="get">

                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="text"
                                        name="keywords"
                                        class="form-control input-lg"
                                        value="{{ Request::get('keywords') }}"
                                        placeholder="Chercher une playlist">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-lg btn-blue btn-block">
                                        Chercher
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
                            <th>Date de création</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($videos as $elem)
                            <tr data-href="{{ route('videos.edit', $elem->id) }}">
                                <td class="bold">{{ $elem->title }}</td>
                                <td>{{ $elem->status == 'published' ? 'Public' : 'Privé' }}</td>
                                <td>{{ date('d/m/Y H:i', strtotime($elem->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End of table -->
        </div>
    </section>

@endsection

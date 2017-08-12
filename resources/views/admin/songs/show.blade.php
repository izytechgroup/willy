@extends('admin.body')


@section('head')
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
    <script>
        var _songs = <?php echo json_encode($playlist->songs);?>
    </script>
@endsection

@section('body')
    <div class="page-heading">
        <div class="title">
            {{ $playlist->title }}
        </div>
        <div class="theme">
            <a href="{{ route('audio.playlist.edit', $playlist->id) }}">
                <i class="flaticon-pencil"></i> Editer
            </a>
        </div>
    </div>

    <section class="mt-20">
        <div class="container-fluid">
            @include('errors.list')

            <form class="form" action="{{ route('audio.playlist.store') }}" method="post">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-4">
                        <div class="block page-white">
                            <div class="block-content">
                                <h3>Couverture</h3>

                                <input type="hidden" class="form-control" id='profile' name='cover' readonly value="{{ $playlist->cover }}">
                                <div id="profile_view" class="mt-20"></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-8">
                        <admin-songs></admin-songs>

                        <div class="text-right mt-20">
                            <a href="" class="btn btn-blue btn-lg" data-toggle="modal" data-target="#songCreateModal">
                                Ajouter un titre
                            </a>
                        </div>
                    </div>
                    {{-- End of col 8 --}}


                </div>

            </form>
        </div>
    </section>

    @include('admin.modals.song-create')
@endsection


@section('js')
<script type="text/javascript" src="/backend/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="/backend/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function() {
    $('.iframe-btn').fancybox({
        'width'     : 900,
        'maxHeight' : 600,
        'minHeight'    : 400,
        'type'      : 'iframe',
        'autoSize'      : false
    });

    var profilePic = $("input[name='cover']").val();
    if(profilePic)
        $('#profile_view').html("<img class='thumbnail img-responsive mb-10' src='" + profilePic +"'/>");
})
</script>
@endsection

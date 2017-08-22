@extends('admin.body')


@section('head')
    <link rel="stylesheet" type="text/css" href="/backend/fancybox/jquery.fancybox.css" media="screen" />
@endsection

@section('body')
    <div class="page-heading">
        <div class="buttons">
            <a href="{{ route('events.index') }}" class="btn btn-lg btn-grey">
                <i class="flaticon-undo"></i> Cancel
            </a>
        </div>

        <div class="title">
            Nouvel Event
        </div>
    </div>

    <section class="mt-20">
        <div class="container-fluid">
            @include('errors.list')

            <form class="form" action="{{ route('events.index') }}" method="post">
                {{ csrf_field() }}

                {{-- Left side  --}}
                <div class="row">
                    <div class="col-sm-8">
                        <div class="block">
                            <div class="block-content">
                                <div class="form-group">
                                    <label>Titre de l'Event</label>
                                    <input type="text" name="title" value="{{ old('title') }}"
                                    required
                                    placeholder="Titre de l'Event"
                                    id="slug-source"
                                    class="form-control input-lg">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="slug" value="{{ old('slug') }}"
                                    required
                                    placeholder="slug"
                                    id="slug-target"
                                    class="form-control input-lg">
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-select grey" name="type">
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->name }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Pays</label>
                                            <select class="form-select grey" name="country">
                                                @foreach($countries as $c)
                                                    <option value="{{ $c }}">{{ $c }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="address" value="{{ old('adresse') }}"
                                    class="form-control input-lg" placeholder="Adresse complete de l'event">
                                </div>

                                <div class="form-group">
                                    <label>Organisateur</label>
                                    <input type="text" name="organizer" value="{{ old('organizer') }}"
                                    class="form-control input-lg" placeholder="Nom de l'organisateur/promoteur">
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Téléphone 1 </label>
                                            <input type="text" name="phone" value="{{ old('phone') }}"
                                            class="form-control input-lg" placeholder="Numero de telephone 1">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Téléphone 2</label>
                                            <input type="text" name="phone2" value="{{ old('phone2') }}"
                                            class="form-control input-lg" placeholder="Numero de telephone 2">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control input-lg" placeholder="Email à contacter">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Site Internet</label>
                                            <input type="text" name="website" value="{{ old('website') }}"
                                            class="form-control input-lg" placeholder="Site web de l'event/promoteur">
                                        </div>
                                    </div>
                                </div>



                                <div class="mt-20 form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="tiny"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- End of col 9 --}}


                    <div class="col-sm-4">
                        <div class="block">
                            <div class="block-content">
                                <h3>Flyer</h3>

                                <input type="hidden" class="form-control" id='profile' name='flyer' readonly value="{{ old('flyer') }}">
                                <div id="profile_view" class="mt-20"></div>

                                <div class="text-right">
                                    <a href="/backend/filemanager/dialog.php?type=1&field_id=profile" class="iframe-btn btn-dark btn round"> <i class='flaticon-folder'></i> Files</a>
                                </div>
                            </div>
                        </div>

                        <div class="block mt-40">
                            <div class="block-content">
                                <h3>Statut</h3>

                                <div class="form-select grey mt-10">
                                    <select class="" name="status">
                                        <option value="unpublished">Privé</option>
                                        <option value="published">Public</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" name="date" value="{{ old('date') }}"
                                    class="form-control input-lg datepicker" placeholder="Date de l'event" readonly>
                                </div>

                                <div class="mt-20">
                                    <button type="submit" name="submit" class="btn btn-lg btn-blue btn-block">
                                        <i class="flaticon-check"></i> Enregistrer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- End of col 3 --}}


                </div>

            </form>
        </div>
    </section>
@endsection


@section('js')
    <script type="text/javascript" src="/backend/js/scripts.min.js"></script>
    <script type="text/javascript" src="/backend/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="/backend/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function() {
    $('#slug-target').slugify('#slug-source');
    $('.datepicker').datepicker({
        startDate: 'd',
        format: 'dd-mm-yyyy',
        autoclose: true
    })

    $('.iframe-btn').fancybox({
        'width'     : 900,
        'maxHeight' : 600,
        'minHeight'    : 400,
        'type'      : 'iframe',
        'autoSize'      : false
    });

    $("body").hover(function() {
        var profilePic = $("input[name='flyer']").val();
        if(profilePic)
            $('#profile_view').html("<img class='thumbnail img-responsive mb-10' src='" + profilePic +"'/>");
    });
})

tinymce.init({
    selector: ".tiny",
    theme: "modern",
    relative_urls: false,
    height : 280,
    fontsize_formats: "8px 10px 12px 14px 16px 18px 24px 32px 36px 60px",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor filemanager code"
   ],
   toolbar1: "undo redo | fontsizeselect bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
   toolbar2: "|filemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | styleselect",
   image_advtab: true ,

    external_filemanager_path:"/backend/filemanager/",
    filemanager_title:"Responsive Filemanager" ,
    external_plugins: { "filemanager" : "/backend/filemanager/plugin.min.js"}
});
</script>
@endsection

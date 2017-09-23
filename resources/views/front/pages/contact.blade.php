@extends('front.templates.pages.single')

@section('head')
    <title>Contact | Willy Mix</title>
@endsection


@section('body')
    <section class="page">
        <div class="container">
            <div class="page-container">
                <div class="title">
                    Contact
                </div>


                <form class="form" action="" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-sm-4">
                            <ul class="list-unstyled fs-20">
                                <li>
                                    <i class="flaticon-mail-dark mr-10"></i> contact@willymixdj.com
                                </li>
                                <li>
                                    <i class="flaticon-phone mr-10"></i> 00324 8540 6858
                                </li>
                            </ul>
                        </div>

                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text"
                                    name="name"
                                    required
                                    class="form-control input-lg"
                                    placeholder="*Nom et prénom">
                            </div>

                            <div class="form-group">
                                <input type="email"
                                    name="email"
                                    required
                                    class="form-control input-lg"
                                    placeholder="*Email">
                            </div>

                            <div class="form-group">
                                <input type="text"
                                    name="phone"
                                    class="form-control input-lg"
                                    placeholder="Téléphone">
                            </div>

                            <textarea name="content" rows="7" class="form-control" placeholder="En quoi puis-je vous aider ?"></textarea>
                        </div>
                    </div>

                    <div class="text-right mt-20">
                        <button type="submit" class="btn btn-lg btn-blue">
                            Envoyer le message
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection

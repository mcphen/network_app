@extends('layouts.app')

@section('content')

    <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">Contactez-nous</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Contact Page Content Start ==-->
    <section id="page-content-wrap">
        <div class="contact-page-wrap section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-content-inner">



                                <div class="col-lg-6 m-auto">
                                    <div class="contact-form-wrap">
                                        <h3>Envoyer message</h3>
                                        <form action="#" id="cbx-contact-form">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="cbxname">Nom</label>
                                                        <input type="text" name="nom" required id="cbxname" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="cbxemail">Email</label>
                                                        <input type="email" name="email" required id="cbxemail" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="cbxsubject">Sujet</label>
                                                <input type="text" name="sujet" id="cbxsubject" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="cbxmessage">Message</label>
                                                <textarea name="cbxmessage" id="cbxmessage" rows="10" cols="80" class="form-control"></textarea>
                                            </div>

                                            <button class="btn btn-reg">Envoyez</button>
                                            <div id="cbx-formalert"></div>
                                        </form>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Contact Page Content End ==-->

@endsection
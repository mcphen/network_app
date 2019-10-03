@extends('layouts.app')

@section('content')

    <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">Espace adhérent</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Register Page Content Start ==-->
    <section id="page-content-wrap">
        <div class="register-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="register-page-inner">
                            <div class="col-lg-10 m-auto">
                                <div class="register-form-content">
                                    <div class="row">
                                        <!-- Regsiter Form Area Start -->
                                        <div class="col-lg-12 col-md-12 ml-auto">
                                            <div class="register-form-wrap">

                                                <div class="register-form">
                                                    <form method="POST" action="{{ route('register') }}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="nom">Nom</label>
                                                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus/>
                                                                    @error('nom')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="prenom">Prénom</label>
                                                                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus/>
                                                                    @error('prenom')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="register_password">Mot de passe</label>
                                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                                    @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="date_naissance">Date naissance</label>
                                                                    <input type="date" class="form-control  @error('password') is-invalid @enderror" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" required autocomplete="date_naissance"/>
                                                                    @error('date_naissance')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <?php
                                                            $promotion = \Illuminate\Support\Facades\DB::table('promotion')
                                                                ->get();

                                                            ?>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="promotion">Promotion</label>
                                                                    <select name="promotion" id="promotion" class="form-control @error('promotion') is-invalid @enderror">
                                                                        <option value="">Choisissez la promotion...</option>
                                                                        @foreach($promotion as $p)
                                                                            <option value="{{$p->idpromotion}}">{{$p->libelle_promotion}}</option>

                                                                        @endforeach
                                                                    </select>
                                                                    @error('promotion')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="gender form-group">
                                                            <label class="g-name d-block">Sexe</label>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="register_gender_male" name="genre" value="homme" class="custom-control-input" />
                                                                <label class="custom-control-label" for="register_gender_male">Homme</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="register_gender_female" name="genre" value="femme" class="custom-control-input">
                                                                <label class="custom-control-label" for="register_gender_female">Femme</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                <label class="custom-control-label" for="customCheck1"> J'ai lu et j'accepte les conditions d'utilisation </label>
                                                            </div>
                                                            <input type="submit" class="btn btn-reg" value="Enregistrer votre demande d'adhesion">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Regsiter Form Area End -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Register Page Content End ==-->

@endsection

@extends('master')

@section('content')
    <section>
        <div class="container">


            <div class="row">
                <div class="col-md-4">
                    <div class="card card-01">
                        <img class="card-img-top"
                             src="http://ovigilanteonline.com/wp-content/uploads/2016/07/CASA-DE-CARIDADE-LEOPOLDINENSE-1.jpg"
                             alt="Card image cap">
                        <div class="card-body">
                            <span class="badge-box"><i class="fa fa-check"></i></span>
                            <h4 class="card-title">Pertinho da sua casa</h4>
                            <p class="card-text">Casa de caridade leopoldinense.</p>
                            <a href="#" class="btn btn-default text-uppercase">Explore</a>
                        </div>
                    </div>
                </div>




                <div class="col-md-4">
                    <!--<h3 class="text-center mb-5">Organização do mês</h3>-->
                    <div class="card card-01">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid"
                                         src="http://animais-estimacao.com/fotos/167459_185809-pug-preto-macho-puro-com-pedigree-em-natal-rn.jpg"
                                         alt="Chegou hoje">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid"
                                         src="http://www.criadores-caes.com/fotos/183656_272744-husky-filhote-legitimo-lindos-maravilhosos.jpg"
                                         alt="Precisando de uma casa">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid"
                                         src="http://www.petvale.com.br/imagens/06328_memorial_cachorro_pitbull.jpg"
                                         alt="Venha me adotar">
                                </div>
                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>
                        <div class="card-body">
                            <span class="badge-box"><i class="fa fa-user-circle-o"></i></span>
                            <h4 class="card-title">Cantinho 4 patas</h4>
                            <p class="card-text">13 cachorrinhos estão precisando de uma casa</p>
                            <a href="#" class="btn btn-default text-uppercase">Explore</a>
                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="card card-01">
                        <div class="profile-box">
                            <img class="card-img-top rounded-circle"
                                 src="https://randomuser.me/api/portraits/women/48.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body text-center">
                            <span class="badge-box"><i class="fa fa-check"></i></span>
                            <h4 class="card-title">Usuário do mês</h4>
                            <p class="card-text">Aline ajudou 7 organizações.</p>
                            <span class="social-box">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-01">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/J9WPtgxA-mU?controls=0&showinfo=0&rel=0&mute=1&autoplay=1&loop=1&playlist=W0LHTWG-UmQ"></iframe>
                        </div>
                        <div class="card-body">
                            <span class="badge-box"><i class="fa fa-check"></i></span>
                            <h4 class="card-title">Tarde musical</h4>
                            <p class="card-text">Lar de Idosos Amor e Caridade.</p>
                            <a href="#" class="btn btn-default text-uppercase">Explore</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-flipper effect__hover" data-id="1">
                        <div class="card__front">
                            <div class="card card-01">
                                <div class="profile-box-01">
                                    <img class="card-img-top"
                                         src="https://scontent-gru.xx.fbcdn.net/v/t31.0-8/21587262_1454615214626325_237536155245005800_o.jpg?oh=8a964bb6008bbb1cc2282a95a4f532b5&oe=5A7474DB"
                                         alt="Card image cap">
                                </div>
                                <div class="card-body text-center">
                                    <span class="badge-box"><i class="fa fa-check"></i></span>
                                    <h4 class="card-title">Evento perto de você</h4>
                                    <p class="card-text">Fejoada beneficente</p>
                                    <a href="#" class="btn btn-default text-uppercase">Explore</a>
                                </div>
                            </div>
                        </div>

                        <div class="card__back">
                            <div class="card card-01">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Fejuca da Marly</h4>
                                    <p class="card-text">Associação Marly Cury conta com a participação de nossos voluntários e colaboradores nesta causa nobre.

                                        Não percam a FEIJOADA BENEFICENTE oferecida pela Instituição Serviços Assistenciais Bom Jesus dos Passos,

                                        que acontecerá no dia 23 de Setembro, sábado, a partir das 10h.

                                        Agradeçemos a participação de todos neste evento!!</p>
                                    <span class="social-box">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-01 height-fix">
                        <img class="card-img-top"
                             src="http://www.oaltoacre.com/wp-content/uploads/2017/08/DSC_0036.jpg"
                             alt="Card image cap">
                        <div class="card-img-overlay">
                            <h4 class="card-title"><strong>Baile beneficente</strong></h4>
                            <p class="card-text">Casa amores de deus</p>
                            <p class="card-text"><a href="#" class="fa fa-bookmark-o"></a><a class="fa fa-heart-o"
                                                                                             href="#"></a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

@endsection
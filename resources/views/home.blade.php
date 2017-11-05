@extends('master')

@section('content')

    <!--<section>
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

                    <div class="card card-01">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid"
                                         src="https://images.pexels.com/photos/534164/pexels-photo-534164.jpeg?h=350&auto=compress&cs=tinysrgb"
                                         alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid"
                                         src="https://images.pexels.com/photos/247599/pexels-photo-247599.jpeg?h=350&auto=compress&cs=tinysrgb"
                                         alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid"
                                         src="https://images.pexels.com/photos/66997/pexels-photo-66997.jpeg?h=350&auto=compress&cs=tinysrgb"
                                         alt="Third slide">
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
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-default text-uppercase">Explore</a>
                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="card card-01">
                        <div class="profile-box">
                            <img class="card-img-top rounded-circle"
                                 src="https://randomuser.me/api/portraits/men/77.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body text-center">
                            <span class="badge-box"><i class="fa fa-check"></i></span>
                            <h4 class="card-title">Mike Parker</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
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
                    <h3 class="text-center mb-5">Video Card</h3>
                    <div class="card card-01">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/W0LHTWG-UmQ?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=W0LHTWG-UmQ"></iframe>
                        </div>
                        <div class="card-body">
                            <span class="badge-box"><i class="fa fa-check"></i></span>
                            <h4 class="card-title">News title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
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
                                         src="https://images.pexels.com/photos/195825/pexels-photo-195825.jpeg?h=350&auto=compress&cs=tinysrgb"
                                         alt="Card image cap">
                                </div>
                                <div class="card-body text-center">
                                    <span class="badge-box"><i class="fa fa-check"></i></span>
                                    <h4 class="card-title">Mike Parker</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-default text-uppercase">Explore</a>
                                </div>
                            </div>
                        </div>

                        <div class="card__back">
                            <div class="card card-01">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Mike Parker</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
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
                             src="http://res.cloudinary.com/amritvirk23/image/upload/v1506061057/poc.jpg"
                             alt="Card image cap">
                        <div class="card-img-overlay">
                            <h4 class="card-title"><strong>Pirates of the Caribbean V</strong></h4>
                            <p class="card-text">Captain Jack Sparrow searches for the trident of Poseidon.</p>
                            <p class="card-text"><a href="#" class="fa fa-bookmark-o"></a><a class="fa fa-heart-o"
                                                                                             href="#"></a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>-->

@endsection
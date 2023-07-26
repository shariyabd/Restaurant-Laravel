@extends('frontend.layouts.master');

@section('main-content')
    <main>

        <header class="site-header site-news-header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 mx-auto">
                        <h1 class="text-white">News &amp; Events</h1>

                        <strong class="text-white">our latest updates, news, events and special promotions</strong>
                    </div>

                </div>
            </div>

            <div class="overlay"></div>
        </header>

        <section class="news section-padding bg-white">
            <div class="container">
                <div class="row">

                    <h2 class="mb-lg-5 mb-4">Latest Updates</h2>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="news-thumb mb-4">
                            <a href="">
                                <img src="{{asset('frontend')}}/images/news/pablo-merchan-montes-Orz90t6o0e4-unsplash.jpg"
                                    class="img-fluid news-image" alt="">
                            </a>

                            <div class="news-text-info news-text-info-large">
                                <span class="category-tag bg-danger">Featured</span>

                                <h5 class="news-title mt-2">
                                    <a href="" class="news-title-link">How to make a healthy diet?</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="news-thumb mb-4">
                            <a href="news-detail.html">
                                <img src="{{asset('frontend')}}/images/news/stefan-johnson-xIFbDeGcy44-unsplash.jpg" class="img-fluid news-image"
                                    alt="">
                            </a>

                            <div class="news-text-info news-text-info-large">
                                <span class="category-tag bg-danger">Featured</span>

                                <h5 class="news-title mt-2">
                                    <a href="" class="news-title-link">Happy Living and happy eating
                                        tips</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="news section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h2 class="mb-lg-5 mb-4">News &amp; Events</h2>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="news-thumb mb-4">
                            <a href="news-detail.html">
                                <img src="{{asset('frontend')}}/images/news/gilles-lambert-S_LhjpfIdm4-unsplash.jpg" class="img-fluid news-image"
                                    alt="">
                            </a>

                            <div class="news-text-info">
                                <span class="category-tag me-3 bg-info">Promotions</span>

                                <strong>12 April 2022</strong>

                                <h5 class="news-title mt-2">
                                    <a href="" class="news-title-link">Is Coconut good for your health?</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="news-thumb mb-4">
                            <a href="news-detail.html">
                                <img src="{{asset('frontend')}}/images/news/ella-olsson-mmnKI8kMxpc-unsplash.jpg" class="img-fluid news-image"
                                    alt="">
                            </a>

                            <div class="news-text-info">
                                <span class="category-tag me-3 bg-info">Career</span>

                                <strong>18 April 2022</strong>

                                <h5 class="news-title mt-2">
                                    <a href="" class="news-title-link">How to run a sushi business?</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="news-thumb mb-4">
                            <a href="news-detail.html">
                                <img src="{{asset('frontend')}}/images/news/louis-hansel-GiIiRV0FjwU-unsplash.jpg" class="img-fluid news-image"
                                    alt="">
                            </a>

                            <div class="news-text-info">
                                <span class="category-tag me-3 bg-info">Meeting</span>

                                <strong>30 April 2022</strong>

                                <h5 class="news-title mt-2">
                                    <a href="news-detail.html" class="news-title-link">Learning a fine dining experience</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection('main-content')

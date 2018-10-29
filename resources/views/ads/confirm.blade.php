@extends('layouts.app')
@section('content')
    <div class="container">
        <section>
            <div class="alert alert-warning"><i class=" glyphicon glyphicon-exclamation-sign"></i>
                <h2 class="text-center">Ето така би изглеждала твоята обява,след като бъде публикувана!</h2>
                <p class="text-center">Снимки ще можеш да качиш,след като публикуваш обявата.</p>
            </div>
            <div class="section slider">
                <div class="row">
                    <div class="col-md-7">

{{--                        <pre>{{ dd(Session::all()) }}</pre>--}}
                    </div>
                    <!-- slider-text -->
                    <div class="col-md-5">
                        <div class="slider-text">
                            <h2>{{Session::has('title') ? Session::get('title') : '' }} </h2>
                            <h3>{{Session::has('price') ? Session::get('price').'.00' : '' }} лв</h3>
                            <p><span>Публикувана от: <a href="{{ route('user',[Auth::user()->id]) }}">{{Auth::user()->nickname}}</a></span>
                                <span> Ad ID:<a href="#" class="time"></a></span></p>
                            <span class="icon">Публикувана: &nbsp;<i class="fa fa-clock-o"></i>@if(Session::has('date-time')) {{Session::get('date-time')}} @endif</span><br>
                            <span class="icon">Локация: &nbsp;<i class="fa fa-map-marker"></i>@if(Session::has('location')) {{Session::get('location')}} {{Session::has('zip_code') ? ', п.к '.Session::get('zip_code') : '' }}  @endif</span><br>
                            <span class="icon">От: &nbsp;<i class="fa fa-suitcase online"></i>&nbsp;<a
                                        href="#">{{Session::has('advertisor') ? Session::get('advertisor') : '' }} Агент</a></span>

                            <!-- short-info -->
                            <div class="short-info">
                                <h4>Кратка информация</h4>
                                <p><strong>Жилище: </strong>{{Session::has('condition') ?  Session::get('condition') : '' }}</p>
                                <p><strong>Brand: </strong><a href="#">Apple</a></p>
                                <p><strong>Features: </strong><a href="#">Camera,</a> <a href="#">Dual SIM,</a> <a
                                            href="#">GSM,</a> <a href="#">Touch screen</a></p>
                                <p><strong>Model: </strong><a href="#">iPhone 6</a></p>
                            </div><!-- short-info -->

                            <!-- contact-with -->
                            <div class="contact-with">
                                <h4>Свържи се с наемодателя </h4>
                                <span class="btn btn-red show-number">
									<i class="fa fa-phone-square"></i>
									{{--<span class="hide-text">Click to show phone number </span>--}}
									<span class="number">{{Session::has('mobileNumber') ? Session::get('mobileNumber') : '' }}</span>
								</span>
                                <a href="#" class="btn"><i class="fa fa-envelope-square"></i>Запитване по email</a>
                            </div><!-- contact-with -->

                            <!-- social-links -->
                            <div class="social-links">
                                <h4>Сподели текущата обява</h4>
                                <ul class="list-inline">
                                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                    <li><a href="#"><i class="fa fa-tumblr-square"></i></a></li>
                                </ul>
                            </div><!-- social-links -->
                        </div>
                    </div><!-- slider-text -->
                </div>
            </div>
            <div class="description-info">
                <div class="row">
                    <div class="col-md-7">
                        <div class="description">
                            <h4>Подробно описание</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est </p><br>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni।</p>
                        </div>
                    </div><!-- description -->
                    <!-- description-short-info -->
                    <!-- description -->
                    <div class="col-md-5">
                        <div class="short-info">
                            <h4>Информация за жилището</h4>
                            <!-- social-icon -->
                            <ul>
                                <li><i class="fa fa-home"></i><span>{{Session::has('propertyType') ? Session::get('propertyType')->name : '' }}</span></li>
                                @if(Session::has('attributes'))
                                    @foreach(Session::get('attributes') as $attr)
                                        <li>{{$attr->name}}</li>
                                    @endforeach
                                @endif
                            </ul><!-- social-icon -->
                        </div>
                    </div>


                </div><!-- row -->
            </div>
        </section>
    </div>
@endsection
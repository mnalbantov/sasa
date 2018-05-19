@extends('layouts.app')

@section('content')
    <section id="app" class="clearfix ad-details-page">
        <div class="container">
            <div class="adpost-details">
                <div id="propTypes" class="row">
                    {{--<div class="col-md-8">--}}
                        {{--<form  action="" method="post">--}}
                            {{--<fieldset>--}}
                            {{--{!! csrf_field() !!}--}}
                                {{--<div class="section postdetails">--}}
                                    {{--<h4>Публикуване на обява<span class="pull-right">* Задължителни полета</span></h4>--}}
                                    {{--<div class="form-group selected-product">--}}
                                        {{--<ul class="list-inline">--}}
                                            {{--<li>--}}
                                                {{--<a href="#">--}}
                                                    {{--<img src="images/icon/3.png" alt="Images" class="img-responsive">--}}
                                                {{--</a>--}}
                                                {{--<h3>За жилището</h3>--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div  class="row form-group">--}}
                                        {{--<label class="col-sm-3">Тип жилище<span class="required">*</span></label>--}}
                                        {{--@if(count($propertyTypes))--}}
                                            {{--<div class="col-sm-9">--}}
                                                {{--<div class="">--}}
                                                    {{--@foreach($propertyTypes as $type)--}}
                                                        {{--<input type="radio" name="propertyType" value="{{ $type->id }}"--}}
                                                               {{--id="{{ $type->name }}">--}}
                                                        {{--<label for="{{ $type->name }}">{{ $type->name }}</label>--}}
                                                    {{--@endforeach--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                    {{--<div class="row form-group additional">--}}
                                        {{--<label class="col-sm-3 label-title">Удобства<span--}}
                                                    {{--class="required">*</span></label>--}}
                                        {{--@if(count($propertyAttributes))--}}
                                            {{--<div class="col-sm-9">--}}
                                                {{--<div class="checkbox">--}}
                                                    {{--@foreach($propertyAttributes as $attr)--}}
                                                        {{--<label for="{{ $attr->name }}">--}}
                                                            {{--<input type="checkbox" name="propAttr[]" value="{{ $attr->id }}"--}}
                                                                   {{--id="{{ $attr->name }}">{{ $attr->name }}--}}
                                                        {{--</label>--}}
                                                    {{--@endforeach--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                    {{--<div class="row form-group add-title">--}}
                                        {{--<label class="col-sm-3 label-title">Заглавие на обявата<span--}}
                                                    {{--class="required">*</span></label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<input type="text" value="" class="form-control" id="text" name="title"--}}
                                                   {{--placeholder="пр. Двустаен апартамент / Стая от многостаен">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="row form-group select-condition">--}}
                                        {{--<label class="col-sm-3">Състояние на жилището<span class="required">*</span></label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<input type="radio" name="condition" value="new" id="new">--}}
                                            {{--<label for="new">Ново</label>--}}
                                            {{--<input type="radio" name="condition" value="used" id="used">--}}
                                            {{--<label for="used">Използвано</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row form-group select-price">--}}
                                        {{--<label class="col-sm-3 label-title">Наем (за месец)<span class="required"> *</span></label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<label>BGN лв</label>--}}
                                            {{--<input type="text" placeholder="650 лв" class="form-control" id="text1">--}}
                                            {{--<input type="radio" name="price" value="negotiable" id="negotiable">--}}
                                            {{--<label for="negotiable">Negotiable </label>--}}
                                            {{--<div class="checkbox">--}}
                                                {{--<label for="uBills">--}}
                                                    {{--<input type="checkbox" value="" id="uBills">Разходи за комунални услуги,които се заплащат с наема</label>--}}
                                            {{--</div>--}}
                                            {{--<div id="utilityCosts" style="display: none;" class=" col-sm-5">--}}
                                                {{--<small for="">Комунални сметки на месец (лв)</small>--}}
                                                {{--<input type="number" name="utilityCosts" value="" class="form-control" id="text1" placeholder="300 лв">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<hr>--}}
                                    {{--<h3>Текущи съквартиранти</h3>--}}
                                    {{--<br>--}}
                                    {{--<label for="fun" class="control-label">Брой съквартиранти</label>--}}
                                    {{--<div class="input-group">--}}
                                        {{--<div id="radioBtn" class="btn-group">--}}
                                            {{--<a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="1">0</a>--}}
                                            {{--<a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="1">1</a>--}}
                                            {{--<a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="2">2</a>--}}
                                            {{--<a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="3">3</a>--}}
                                            {{--<a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="4+">4+</a>--}}
                                        {{--</div>--}}
                                        {{--<input type="hidden" name="roommates" id="roommates">--}}
                                    {{--</div>--}}
                                    {{--<br>--}}
                                    {{--<div id="gender" style="display: none;" class="input-group">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<a class="btn-sm btn-primary notActive" data-toggle="gender" data-title="1">Мъже</a>--}}
                                            {{--<a class="btn-sm btn-danger notActive" data-toggle="gender" data-title="2">Жени</a>--}}
                                            {{--<a class="btn-sm btn-info notActive" data-toggle="gender" data-title="3">И двете</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<hr>--}}
                                    {{--<h3>Предпочитани съквартиранти</h3><br>--}}
                                    {{--<div class="input-group">--}}
                                        {{--<div id="radioBtn" class="btn-group">--}}
                                            {{--<a class="btn btn-info btn-sm notActive" data-toggle="roommates" data-title="1">Мъже</a>--}}
                                            {{--<a class="btn btn-danger btn-sm notActive" data-toggle="roommates" data-title="1">Жени</a>--}}
                                            {{--<a class="btn btn-warning btn-sm notActive" data-toggle="roommates" data-title="1">Без значение</a>--}}
                                        {{--</div>--}}
                                        {{--<input type="hidden" name="roommates" id="roommates">--}}
                                    {{--</div>--}}

                                {{--</div><!-- section -->--}}

                                {{--<div class="section seller-info">--}}
                                    {{--<h4>Информация за теб</h4>--}}
                                    {{--<div class="row form-group">--}}
                                        {{--<label class="col-sm-3 label-title">Аз съм:<span--}}
                                                    {{--class="required">*</span></label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<input type="radio" name="sellerType" value="individual" id="individual">--}}
                                            {{--<label for="individual">Квартирант</label>--}}
                                            {{--<input type="radio" name="sellerType" value="landlord" id="landlord">--}}
                                            {{--<label for="landlord">Хазяин</label>--}}
                                            {{--<input type="radio" name="sellerType" value="dealer" id="dealer">--}}
                                            {{--<label for="dealer">Агент</label>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row form-group">--}}
                                        {{--<label class="col-sm-3 label-title">Your Name<span--}}
                                                    {{--class="required">*</span></label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<input type="text" name="name" class="form-control"--}}
                                                   {{--placeholder="ex, Jhon Doe">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row form-group">--}}
                                        {{--<label class="col-sm-3 label-title">E-mail адрес<span class="required">*</span></label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<input type="email"  {{ isset($user->email) ? 'disabled' : '' }} class="form-control" value="{{ $user->email or '' }}"--}}
                                                   {{--placeholder="{{ $user->email or '' }}">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row form-group">--}}
                                        {{--<label class="col-sm-3 label-title">Mobile Number<span class="required">*</span></label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<input type="text" name="mobileNumber" class="form-control"--}}
                                                   {{--placeholder="ex, +912457895">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row form-group">--}}
                                        {{--<label class="col-sm-3 label-title">Address</label>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<input type="text" name="address" class="form-control"--}}
                                                   {{--placeholder="ex, alekdera House, coprotec, usa">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div><!-- section -->--}}

                                {{--<div class="section">--}}
                                    {{--<h4>Make your Ad Premium </h4>--}}
                                    {{--<p>More replies means more interested buyers. With lots of interested buyers, you--}}
                                        {{--have a better chance of selling for the price that you want. <a href="#">Learn--}}
                                            {{--more</a></p>--}}
                                    {{--<ul class="premium-options">--}}
                                        {{--<li class="premium">--}}
                                            {{--<input type="radio" name="premiumOption" value="day-one" id="day-one">--}}
                                            {{--<label for="day-one">Regular Ad Per Day</label>--}}
                                            {{--<span>$20.00</span>--}}
                                        {{--</li>--}}
                                        {{--<li class="premium">--}}
                                            {{--<input type="radio" name="premiumOption" value="day-two" id="day-two">--}}
                                            {{--<label for="day-two">Top Ad for 3 days</label>--}}
                                            {{--<span>$30.00</span>--}}
                                        {{--</li>--}}
                                        {{--<li class="premium">--}}
                                            {{--<input type="radio" name="premiumOption" value="day-three" id="day-three">--}}
                                            {{--<label for="day-three">Top Ad for 7 days</label>--}}
                                            {{--<span>$50.00</span>--}}
                                        {{--</li>--}}
                                        {{--<li class="premium">--}}
                                            {{--<input type="radio" name="premiumOption" value="day-four" id="day-four">--}}
                                            {{--<label for="day-four">Daily Bump Up for 7 days</label>--}}
                                            {{--<span>$100.00</span>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div><!-- section -->--}}

                                {{--<div class="checkbox section agreement">--}}
                                    {{--<label for="send">--}}
                                        {{--<input type="checkbox" name="send" id="send">--}}
                                        {{--Send me Trade Email/SMS Alerts for people looking to buy mobile handsets in www--}}
                                        {{--By clicking "Post", you agree to our <a href="#">Terms of Use</a> and <a--}}
                                                {{--href="#">Privacy Policy</a> and acknowledge that you are the rightful--}}
                                        {{--owner of this item and using Trade to find a genuine buyer.--}}
                                    {{--</label>--}}
                                    {{--<button type="submit" class="btn btn-primary">Post Your Ad</button>--}}
                                {{--</div><!-- section -->--}}

                            {{--</fieldset>--}}
                        {{--</form><!-- form -->--}}
                    {{--</div>--}}

                    <!-- quick-rules -->
                        <post-ad></post-ad>
                    <div class="col-md-4">
                        <div class="section quick-rules">
                            <h4>Правила за публикуване на обяви</h4>
                            <p class="lead">Публикуването на обяви в <a href="#">Стая БГ</a> е напълно безпалтно!<br>
                                Въпреки това, всички обяви трябва да следват описаните правила:</p>

                            <ul>
                                <li>Уверете се, че вашата обява е в правилнят раздел.</li>
                                <li>Не публикувайте еднаква обява повече от веднъж в близките 48 часа.</li>
                                <li>Не включвайте имейл адреси и телефонни номера в заглавието на обявите.</li>
                                <li>Уверете се, че Вашата обява има всичко необходимо,за да бъде лесно достъпна за
                                    останалите потребители.
                                </li>
                                <li>При неспазване на правилата,модератор ще редактира обявата Ви</li>
                                <li>При продължително неспазване на изброените правила, Вашата обява ще бъде свалена!
                                </li>
                            </ul>
                        </div>
                    </div><!-- quick-rules -->
                </div><!-- photos-ad -->
            </div>
        </div>

    </section>
@endsection
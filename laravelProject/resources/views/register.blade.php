@extends('template')

@section('title')
    Регистрация
@endsection

@section('main-content')
    <div class="d-flex flex-column mx-5 border-common justify-content-center align-items-center authorization-container">
        <div class="some-form">
            <form method="post" enctype="application/x-www-form-urlencoded" action="{{url('register')}}" class="form text-about js-form-validate" id="registerForm">
                @csrf
                <h1 class="card-title d-flex text-about-header justify-content-center pb-3 mt-0">Регистрация</h1>
                <div id="loginDiv" class="some-form__line">
                    <input id="login" type="text" name="login" placeholder="Уникальный логин*" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span id="loginError" class="some-form__hint"></span>
                </div>
                <div id="emailDiv" class="some-form__line">
                    <input id="mail" title="Пример: ivan@mail.ru" type="email" name="email" placeholder="E-mail*" value="" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span id="emailError" class="some-form__hint"></span>
                </div>
                <div id="passwordDiv" class="some-form__line">
                    <input id="password" type="password" name="password" placeholder="Пароль*" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span id="passwordError" class="some-form__hint"></span>
                </div>
                <div class="some-form__line">
                    <input id="name" type="text" name="name" value="" placeholder="Ваше имя" data-validate>
                    <span class="some-form__hint-succesfull">Отлично</span>
                    <span class="some-form__hint"></span>
                </div>
                <div id="alertText" class="alert alert-danger d-flex flex-column align-items-center" style="display: none !important;" role="alert">

                </div>
                <div class="d-flex justify-content-end py-3">
                    <a href="login" class="text-guestBook">Вы уже зарегистрированы?</a>
                </div>
                <div class="d-flex gap-3 some-form__submit align-items-center justify-content-center">
                    <input id="formSubmit" type="submit" value="Зарегистрироваться" class="button button_submit button-wide">
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/js/registerAjaxRequest.js') }}"></script>
@endsection

@extends('template')

@section('title')
    Вход
@endsection

@section('main-content')
    <div class="d-flex flex-column mx-5 border-common justify-content-center authorization-container">
        <div class="some-form">
            <form method="post" action="{{url('login')}}" class="form text-about js-form-validate">
                @csrf
                <h1 class="card-title d-flex text-about-header justify-content-center pb-3 mt-0">Логин</h1>
                <div class="some-form__line">
                    <input id="login" type="text" name="login" placeholder="Логин*" data-validate>
                </div>
                <div class="some-form__line">
                    <input id="password" type="password" name="password" placeholder="Пароль*"" data-validate>
                </div>
                <?php
                if (isset($error))
                {
                    echo '<div class="alert alert-danger d-flex align-items-center" role="alert">';
                    echo '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
                    echo '<div>';
                    echo $error;
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                <div class="d-flex justify-content-end py-3">
                    <a href="register" class="text-guestBook">Зарегистрироваться</a>
                </div>
                <div class="d-flex gap-3 some-form__submit align-items-center justify-content-center">
                    <input id="formSubmit" type="submit" value="Войти" class="button button_submit button-wide">
                </div>
            </form>
        </div>
    </div>
@endsection

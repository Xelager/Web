@extends('template')

@section('title')
    Контакты
@endsection

@section('main-content')
    <div class="d-flex flex-column mx-5 border-common justify-content-center">
        <div class="some-form">
            <form method="post" class="form text-about js-form-validate">
                <h1 class="card-title d-flex text-about-header justify-content-center mt-0">Мой контакт</h1>

                <div class="d-flex gap-5 some-form__line ">

                    <div class="date-picker some-form__line ">
                        <input name="birthDate" class="text-about selected-date" value="">

                        <div class="dates">
                            <div class="month">
                                <div class="arrows prev-mth">&lt;</div>
                                <div class="mth"></div>
                                <div class="arrows next-mth">&gt;</div>
                            </div>
                            <div class="d-flex gap-2">
                                <select id="yearId" class="form-control">
                                    <option value="" disabled selected>Год</option>
                                </select>
                                <select id="monthId" class="form-control">
                                    <option value="" disabled selected>Месяц</option>
                                </select>
                            </div>
                            <div class="days"></div>
                        </div>
                        <span class="some-form__hint-succesfull mb-3">Отлично</span>
                        <span class="some-form__hint mb-3"></span>
                    </div>
                </div>
                <div class="d-flex gap-3 some-form__submit align-items-center">
                    <input id="formSubmit" type="submit" value="Отправить" class="button button_submit button-wide">
                    <button type="reset" value="reset" class="button_submit inter-button-text button-wide">Очистить поля</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('assets/js/dateOfBirth.jpg') }}"></script>
@endsection

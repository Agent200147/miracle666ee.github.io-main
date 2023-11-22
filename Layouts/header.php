<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=adge">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<!--    <link rel="stylesheet" href="../assets/css/style.css">-->
<!--    <link rel="stylesheet" href="../assets/css/forms.css">-->
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/png">
    <title>Объявления</title>

</head>
<script>
    const link1 = document.createElement('link');
    link1.rel = 'stylesheet';
    link1.type = 'text/css';
    link1.href = "assets/css/style.css?v=" + Math.random() * 100
    document.head.appendChild(link1);


    const link2 = document.createElement('link');
    link2.rel = 'stylesheet';
    link2.type = 'text/css';
    link2.href = "assets/css/forms.css?v=" + Math.random() * 100
    document.head.appendChild(link2);
</script>

<header class="header">
    <div class="container">
        <div class="header-line">
            <a href="/" class="header-logo">
                <img src="../assets/img/logo.png" alt="">
                <span>Объявления</span>
            </a>
            <?php
            if (isset($_SESSION['name'])) {
                ?>
                <div class="user">
                    <div class="user__name">
                        <span class="hidden-576">Здравствуйте,</span>  <?= $_SESSION['name'] ?>
                    </div>
                    <a href="/php/exit.php" class="user__exit-btn header__button">
                        Выход
                    </a>
                </div>
            <?php } else {
                ?>
                <div class="nav1">
                    <a class="nav-item header__button__registration">Регистрация</a>
                    <a class="nav-item header__button__login">Авторизация</a>
                </div>
            <?php }
            ?>
        </div>
        <hr>
    </div>
</header>


<div class="form">
    <div class="form__background">
    </div>
    <div class="form__window">
        <div class="back">
            <button class="close-button">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                     xmlns="C:\OpenServer\domains\web\assets\img\close.svg">
                    <path d="M4 4L16 16" stroke="#B9B9B9" stroke-width="2" stroke-linecap="round"/>
                    <path d="M16 4L4 16" stroke="#B9B9B9" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>


        <div class="form__window__change-mode">
            <button class="change-mode__button change-mode__button__registration change-mode__button__active">
                Регистрация
            </button>
            <button class="change-mode__button change-mode__button__autorization change-mode__button__unactive">
                Авторизация
            </button>
        </div>

        <div class="registration__form">
            <form action="" method="post" id="form-register">
                <div class="registration-inputs__container">
                    <div class="registration__name">
                        <label class="input__label input__label__big">
                            <input type="text" required name="name"
                                   class="form__input registration__form__input form__input__big registration__name__input">
                            <span class="form__placeholder registration__placeholder">
                                Ваше имя
                            </span>
                        </label>
                    </div>

                    <div class="registration__email">
                        <label class="input__label">
                            <input type="text" required name="email"
                                   class="form__input registration__form__input registration__email__input">
                            <span class="form__placeholder registration__placeholder">
                                Email
                            </span>
                        </label>
                    </div>

                    <div class="registration__phone">
                        <label class="input__label">
                            <input type="text" onkeyup="this.value = this.value.replace (/\D/, '')" required
                                   name="telefon"
                                   class="form__input registration__form__input registration__phone__input">
                            <span class="form__placeholder registration__placeholder">
                                Мобильный телефон
                            </span>
                        </label>
                    </div>

                    <div class="registration__pass">
                        <label class="input__label">
                            <input type="password" required name="password"
                                   class="form__input registration__form__input registration__pass__input">
                            <span class="form__placeholder registration__placeholder">
                                Пароль
                            </span>
                        </label>
                    </div>

                    <div class="registration__pass-check">
                        <label class="input__label">
                            <input type="password" required name="password2"
                                   class="form__input registration__form__input registration__pass-check__input">
                            <span class="form__placeholder registration__placeholder">
                                Повторите пароль
                            </span>
                        </label>
                    </div>
                </div>

                <div class="agree">
                    <input id="checkbox" type="checkbox" class="agree__checkbox">
                    <div class="agree__checkbox__background"></div>

                    <label for="checkbox" class="agree__checkbox__label">
                    <p class="agree__text">
                        Согласен на обработку
                        <a class="agree__link">персональных данных</a>
                    </p>
                    </label>
                </div>


                <input type="button" value="Зарегистрироваться" disabled class="registration__submit submit__unactive">
                <div class="error" id="error-register"></div>

                <div class="registration__info">
                    <div class="registration__info__icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="10" cy="10" r="7" stroke="#838383" stroke-width="2"/>
                            <rect x="9" y="6" width="2" height="5" rx="1" fill="#838383"/>
                            <rect x="9" y="12" width="2" height="2" rx="1" fill="#838383"/>
                        </svg>
                    </div>

                    <p class="registration__info__text">
                        Все поля обязательны для заполнения
                    </p>
                </div>
            </form>
        </div>

        <div class="login__form" id="rrr">
            <form action="" method="post" id="form-login">
                <div class="login-inputs__container">
                    <div class="login__email">
                        <label class="input__label">
                            <input type="text" required name="email"
                                   class="form__input login__form__input login__email__input">
                            <span class="form__placeholder login__placeholder">
                                Email
                            </span>
                        </label>
                    </div>

                    <div class="login__pass">
                        <label class="input__label">
                            <input type="password" required name="password"
                                   class="form__input login__form__input login__pass__input">
                            <span class="form__placeholder login__placeholder">
                                Пароль
                            </span>
                        </label>
                    </div>
                </div>

                <input type="button" disabled value="Войти" class="login__submit submit__unactive">
                <div class="error" id="error-login"></div>

                <div class="registration__info">
                    <div class="registration__info__icon">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="10" cy="10" r="7" stroke="#838383" stroke-width="2"/>
                            <rect x="9" y="6" width="2" height="5" rx="1" fill="#838383"/>
                            <rect x="9" y="12" width="2" height="2" rx="1" fill="#838383"/>
                        </svg>
                    </div>
                    <p class="registration__info__text">
                        Все поля обязательны для заполнения
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
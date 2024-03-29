<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-in">
                <div class="logo">
                    <a href="{{ route('welcome') }}" class="d-flex align-items-center">
                        <img class="header__logo logo" alt=" " src="{{ asset('images/logo2.png') }}">
                        <span class="h3 p-0 m-0 ml-2 text-white"><strong>ШИНЫ УФА</strong></span>
                    </a>
                </div>
                <div class="header-in">
                    <ul class="icon1 sub-icon1">
                        @auth
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                    ВЫЙТИ
                                </a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li><a href="{{ route('home') }}">МОЙ АККАУНТ</a></li>
                        @else
                            <li><a href="{{ route('login') }}">ВОЙТИ</a></li>
                        @endauth
                        <li><a href="{{ route('cart.index') }}">КОРЗИНА</a></li>
                        <li>
                            <div class="cart">
                                <a class="cart-in" href="{{ route('cart.index') }}"> </a>
                                <span>{{ Cart::count() }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="h_menu4">
                <a class="toggleMenu" href="#">Menu</a>
                <ul class="nav">
                    <li class="@if(Request::route()->getName() === "welcome") active @endif"><a
                            href="{{ route('welcome') }}"><i> </i>Главная</a></li>
                    <li class="@if(Request::route()->getName() === "tires.index") active @endif"><a
                            href="{{ route('tires.index') }}">Шины</a>
                    </li>
                    <li class="@if(Request::route()->getName() === "contact") active @endif"><a href="{{ route('contact') }}">Контакты</a></li>

                </ul>
            </div>
        </div>
    </div>
    @if((Request::route()->getName() === "tires.index") or
        (Request::route()->getName() === "tires.search"))
        <div class="header-bottom-in h-100" style="background: none">
            <div class="container">
                <h3 style="padding-top: 1em">Шинный калькулятор</h3>
                <div class="header-bottom-on" style="padding-top: 0; background: none">
                    {{--                        <p class="wel"><a href="#">Welcome visitor you can login or create an account.</a></p>--}}
                    <form action="{{ route('tires.search') }}" method="GET">
                        <div class="row">
                            <div class="col-md-2 col-4 pt-2">
                                <div class="">
                                    <label for="">Марка</label>
                                    <select class="form-control" name="brand">
                                        <option value="all">Любая</option>
                                        @foreach($searchInfo['tireBrands'] as $info)
                                            <option @if(app('request')->input('brand') == $info->id) selected @endif class="in-of" value="{{ $info->id }}">{{ $info->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-4 pt-2">
                                <div class="">
                                    <label for="">Ширина</label>
                                    <select class="form-control" name="width">
                                        <option value="all">Любая</option>
                                        @foreach($searchInfo['tireWidths'] as $info)
                                            <option  @if(app('request')->input('width') == $info->id) selected @endif class="in-of" value="{{ $info->id }}">{{ $info->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-4 pt-2">
                                <div class="">
                                    <label for="">Профиль</label>
                                    <select class="form-control" name="profile">
                                        <option value="all">Любой</option>
                                        @foreach($searchInfo['tireProfiles'] as $info)
                                            <option  @if(app('request')->input('profile') == $info->id) selected @endif class="in-of" value="{{ $info->id }}">{{ $info->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-4 pt-2">
                                <div class="">
                                    <label for="">Диаметр</label>
                                    <select class="form-control" name="diameter">
                                        <option value="all">Любой</option>
                                        @foreach($searchInfo['tireDiameters'] as $info)
                                            <option  @if(app('request')->input('diameter') == $info->id) selected @endif class="in-of" value="{{ $info->id }}">{{ $info->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-4 pt-2">
                                <div class="">
                                    <label for="">Сезон</label>
                                    <select class="form-control" name="season">
                                        <option value="all">Любой</option>
                                        @foreach($searchInfo['tireSeasons'] as $info)
                                            <option  @if(app('request')->input('season') == $info->id) selected @endif class="in-of" value="{{ $info->id }}">{{ $info->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-4 d-flex justify-content-center align-items-end pt-2">
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Найти</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>



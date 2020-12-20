<!doctype html>
<html>
    <head>
        <title>Clone - App</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
        <link rel="stylesheet" href="/libs/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" href="/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/css/fonts.css" />
        <link rel="stylesheet" href="/css/style.css" />
        <link rel="stylesheet" href="/libs/toastr/toastr.min.css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body data-ng-app="app" data-ng-controller="MainCtrl"> 
        <header class="header">
            <div class="header-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-1">
                            <a href="{{ url('/') }}" class="header-logo">
                                <img src="/img/logo.png" alt="TMsys" />
                            </a>
                        </div>
                        <div class="col-sm-5">
                            @if (Auth::user())
                                <nav class="header-nav">

                                <ul class="list clearfix">
                                    @role(('admin'))
                                        <li ng-class="{ 'active' : isActive('/')}">
                                            <a href="/">Strona główna</a>
                                        </li>
                                        <li ng-class="{ 'active' : isActive('/customers/list/')}">
                                            <a href="/customers/list">Użytkowniki</a>
                                        </li>
                                        <li ng-class="{ 'active': isActive('/customers/analitica/')}">
                                            <a href="/customers/analitica">Analityka</a>
                                        </li>
                                        <li >
                                            <a href="#">Projekty</a>
                                        </li>
                                    @endrole
                                    @role(('designer'))
                                        <li class="active">
                                            <a href="#">Strona główna</a>
                                        </li>
                                        <li>
                                            <a href="#">Moje projekty</a>
                                        </li>
                                        <li>
                                            <a href="#">Kupione projekty</a>
                                        </li>
                                    @endrole
                                    @role(('subscriber'))
                                        <li class="active">
                                            <a href="#">Strona główna</a>
                                        </li>
                                    @endrole
                                </ul>
                            </nav>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            <div class="header-info text-right">
                                @if (Auth::user())
                                    <!--<div class="header-info-pin">
                                        <img src="/img/pin.png" alt="pin">
                                        <sup>7</sup>
                                    </div>
                                    <a href="#" class="butt">+  Dodaj projekt</a>-->
                                    <div class="header-info-yet">
                                        <div class="wrapper-plugin-img">
                                            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : '/img/user.png' }}" alt="photo" />
                                        </div>

                                        <div class="header-info-text text-left" uib-dropdown is-open="status.isopen" class="dropdown-toggle" data-toggle="dropdown">
                                            <button type="button" uib-dropdown-toggle ng-disabled="disabled">
                                                <span>
                                                    <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                                    <span>{{ Auth::user()->ballance }} punkty</span>
                                                </span>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" uib-dropdown-menu >
                                                <li>
                                                    <a href="javascript:;" data-ng-click="signout()">Logout</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>  
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header> 

        <div data-ng-view></div>
        

        <script src="/js/angular.min.js"></script>
        <script src="/js/angular-animate.min.js"></script>
        <script src="/js/angular-route.min.js"></script>
        <script src="/js/libs/ng-file-upload.min.js"></script>
        <script src="/js/angular-sanitize.min.js"></script>
        <script src="/js/jquery.min.js"></script>
        <script src="/libs/toastr/toastr.min.js"></script>
        <script src="/js/libs/ui-bootstrap-tpls.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/factories/logger.js"></script>
        <script src="/js/factories/request.js"></script>
       
        <script src="/js/controllers/auth.js"></script>
        <script src="/js/controllers/admin.js"></script>
    </body>
</html>
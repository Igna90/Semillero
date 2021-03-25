<?php $r = \Route::current()->getAction() ?>
<?php $route = (isset($r['as'])) ? $r['as'] : ''; ?>

<ul class="sidebar-menu">
    @Logged()
    <li class="header">MENU</li>
    @endLogged()

    @LoggedAD()
    <li>
        <a href="{{ url('/usuario') }}">

            <i class="fa fa-copyright"></i>
            <span>Usuarios</span>
        </a>
    </li>
    @endLoggedAD()
</ul>
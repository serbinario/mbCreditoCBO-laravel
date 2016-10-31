<!DOCTYPE html>
<!--[if IE 9 ]-->
<html class="ie9">
<!--[endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Material Admin</title>

        {{--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}

        <link type="text/css" rel="stylesheet" href="/dist/css/fullcalendar/dist/fullcalendar.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/dist/css/animate.css/animate.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/dist/css/sweetalert2/dist/sweetalert2.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/dist/css/material-design-iconic-font/dist/css/material-design-iconic-font.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/dist/css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/dist/css/app_1.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="/dist/css/app_2.min.css"  media="screen,projection"/>

    </head>
    <body>
    <header id="header" class="clearfix" data-ma-theme="blue">
        <ul class="h-inner">
            <li class="hi-trigger ma-trigger" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                <div class="line-wrap">
                    <div class="line top"></div>
                    <div class="line center"></div>
                    <div class="line bottom"></div>
                </div>
            </li>

            <li class="hi-logo hidden-xs">
                <a href="index.html">Material Admin</a>
            </li>

            <li class="pull-right">
                <ul class="hi-menu">

                    <li data-ma-action="search-open">
                        <a href=""><i class="him-icon zmdi zmdi-search"></i></a>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" href="">
                            <i class="him-icon zmdi zmdi-email"></i>
                            <i class="him-counts">6</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                            <div class="list-group">
                                <div class="lg-header">
                                    Messages
                                </div>
                                <div class="lg-body">
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/1.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">David Belle</div>
                                            <small class="lgi-text">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                        </div>
                                    </a>
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/2.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">Jonathan Morris</div>
                                            <small class="lgi-text">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                        </div>
                                    </a>
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/3.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">Fredric Mitchell Jr.</div>
                                            <small class="lgi-text">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small>
                                        </div>
                                    </a>
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/4.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">Glenn Jecobs</div>
                                            <small class="lgi-text">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small>
                                        </div>
                                    </a>
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/4.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">Bill Phillips</div>
                                            <small class="lgi-text">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small>
                                        </div>
                                    </a>
                                </div>
                                <a class="view-more" href="">View All</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href="">
                            <i class="him-icon zmdi zmdi-notifications"></i>
                            <i class="him-counts">9</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg pull-right">
                            <div class="list-group him-notification">
                                <div class="lg-header">
                                    Notification

                                    <ul class="actions">
                                        <li class="dropdown">
                                            <a href="" data-ma-action="clear-notification">
                                                <i class="zmdi zmdi-check-all"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="lg-body">
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/1.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">David Belle</div>
                                            <small class="lgi-text">Cum sociis natoque penatibus et magnis dis parturient montes</small>
                                        </div>
                                    </a>
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/2.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">Jonathan Morris</div>
                                            <small class="lgi-text">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small>
                                        </div>
                                    </a>
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/3.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">Fredric Mitchell Jr.</div>
                                            <small class="lgi-text">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small>
                                        </div>
                                    </a>
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/4.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">Glenn Jecobs</div>
                                            <small class="lgi-text">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small>
                                        </div>
                                    </a>
                                    <a class="list-group-item media" href="">
                                        <div class="pull-left">
                                            <img class="lgi-img" src="img/demo/profile-pics/4.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="lgi-heading">Bill Phillips</div>
                                            <small class="lgi-text">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small>
                                        </div>
                                    </a>
                                </div>

                                <a class="view-more" href="">View Previous</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown hidden-xs">
                        <a data-toggle="dropdown" href="">
                            <i class="him-icon zmdi zmdi-view-list-alt"></i>
                            <i class="him-counts">2</i>
                        </a>
                        <div class="dropdown-menu pull-right dropdown-menu-lg">
                            <div class="list-group">
                                <div class="lg-header">
                                    Tasks
                                </div>
                                <div class="lg-body">
                                    <div class="list-group-item">
                                        <div class="lgi-heading m-b-5">HTML5 Validation Report</div>

                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                                <span class="sr-only">95% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="lgi-heading m-b-5">Google Chrome Extension</div>

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="lgi-heading m-b-5">Social Intranet Projects</div>

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="lgi-heading m-b-5">Bootstrap Admin Template</div>

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">
                                        <div class="lgi-heading m-b-5">Youtube Client App</div>

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a class="view-more" href="">View All</a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" href=""><i class="him-icon zmdi zmdi-more-vert"></i></a>
                        <ul class="dropdown-menu dm-icon pull-right">
                            <li class="skin-switch hidden-xs">
                                <span class="ss-skin bgm-lightblue" data-ma-action="change-skin" data-ma-skin="lightblue"></span>
                                <span class="ss-skin bgm-bluegray" data-ma-action="change-skin" data-ma-skin="bluegray"></span>
                                <span class="ss-skin bgm-cyan" data-ma-action="change-skin" data-ma-skin="cyan"></span>
                                <span class="ss-skin bgm-teal" data-ma-action="change-skin" data-ma-skin="teal"></span>
                                <span class="ss-skin bgm-orange" data-ma-action="change-skin" data-ma-skin="orange"></span>
                                <span class="ss-skin bgm-blue" data-ma-action="change-skin" data-sma-kin="blue"></span>
                            </li>
                            <li class="divider hidden-xs"></li>
                            <li class="hidden-xs">
                                <a data-ma-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                            </li>
                            <li>
                                <a data-ma-action="clear-localstorage" href=""><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                            </li>
                            <li>
                                <a href=""><i class="zmdi zmdi-face"></i> Privacy Settings</a>
                            </li>
                            <li>
                                <a href=""><i class="zmdi zmdi-settings"></i> Other Settings</a>
                            </li>
                        </ul>
                    </li>
                    <li class="hidden-xs ma-trigger" data-ma-action="sidebar-open" data-ma-target="#chat">
                        <a href=""><i class="him-icon zmdi zmdi-comment-alt-text"></i></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Top Search Content -->
        <div class="h-search-wrap">
            <div class="hsw-inner">
                <i class="hsw-close zmdi zmdi-arrow-left" data-ma-action="search-close"></i>
                <input type="text">
            </div>
        </div>
    </header>

    <section id="main">
        <aside id="sidebar" class="sidebar c-overflow">
            <div class="s-profile">
                <a href="" data-ma-action="profile-menu-toggle">
                    <div class="sp-pic">
                        <img src="img/demo/profile-pics/1.jpg" alt="">
                    </div>

                    <div class="sp-info">
                        Malinda Hollaway

                        <i class="zmdi zmdi-caret-down"></i>
                    </div>
                </a>

                <ul class="main-menu">
                    <li>
                        <a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-time-restore"></i> Logout</a>
                    </li>
                </ul>
            </div>

            <ul class="main-menu">
                <li><a href="index.html"><i class="zmdi zmdi-home"></i> Home</a></li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-chart"></i> Dashboards</a>

                    <ul>
                        <li><a href="dashboards/analytics.html">Analytics</a></li>
                        <li><a href="dashboards/school.html">School</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i> Headers</a>

                    <ul>
                        <li><a href="textual-menu.html">Textual menu</a></li>
                        <li><a href="image-logo.html">Image logo</a></li>
                        <li><a href="top-mainmenu.html">Mainmenu on top</a></li>
                    </ul>
                </li>
                <li><a href="typography.html"><i class="zmdi zmdi-format-underlined"></i> Typography</a></li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-widgets"></i> Widgets</a>

                    <ul>
                        <li><a href="widget-templates.html">Templates</a></li>
                        <li><a href="widgets.html">Widgets</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-list"></i> Tables</a>

                    <ul>
                        <li><a href="tables.html">Normal Tables</a></li>
                        <li><a href="data-tables.html">Data Tables</a></li>
                    </ul>
                </li>
                <li class="sub-menu active toggled">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-collection-text"></i> Forms</a>

                    <ul>
                        <li><a class="active" href="form-elements.html">Basic Form Elements</a></li>
                        <li><a href="form-components.html">Form Components</a></li>
                        <li><a href="form-examples.html">Form Examples</a></li>
                        <li><a href="form-validations.html">Form Validation</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-swap-alt"></i>User Interface</a>
                    <ul>
                        <li><a href="colors.html">Colors</a></li>
                        <li><a href="animations.html">Animations</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="alerts.html">Alerts</a></li>
                        <li><a href="preloaders.html">Preloaders</a></li>
                        <li><a href="notification-dialog.html">Notifications & Dialogs</a></li>
                        <li><a href="media.html">Media</a></li>
                        <li><a href="components.html">Components</a></li>
                        <li><a href="other-components.html">Others</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-trending-up"></i>Charts & Maps</a>
                    <ul>
                        <li><a href="flot-charts.html">Flot Charts</a></li>
                        <li><a href="other-charts.html">Other Charts</a></li>
                        <li><a href="maps.html">Maps</a></li>
                    </ul>
                </li>
                <li><a href="calendar.html"><i class="zmdi zmdi-calendar"></i> Calendar</a></li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-image"></i>Photo Gallery</a>
                    <ul>
                        <li><a href="photos.html">Default</a></li>
                        <li><a href="photo-timeline.html">Timeline</a></li>
                    </ul>
                </li>

                <li><a href="generic-classes.html"><i class="zmdi zmdi-layers"></i> Generic Classes</a></li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-collection-item"></i> Sample
                        Pages</a>
                    <ul>

                        <li><a href="profile-about.html">Profile</a></li>
                        <li><a href="list-view.html">List View</a></li>
                        <li><a href="messages.html">Messages</a></li>
                        <li><a href="pricing-table.html">Pricing Table</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="wall.html">Wall</a></li>
                        <li><a href="invoice.html">Invoice</a></li>
                        <li><a href="login.html">Login and Sign Up</a></li>
                        <li><a href="lockscreen.html">Lockscreen</a></li>
                        <li><a href="404.html">Error 404</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-menu"></i> 3 Level Menu</a>

                    <ul>
                        <li><a href="form-elements.html">Level 2 link</a></li>
                        <li><a href="form-components.html">Another level 2 Link</a></li>
                        <li class="sub-menu">
                            <a href="" data-ma-action="submenu-toggle">I have children too</a>

                            <ul>
                                <li><a href="">Level 3 link</a></li>
                                <li><a href="">Another Level 3 link</a></li>
                                <li><a href="">Third one</a></li>
                            </ul>
                        </li>
                        <li><a href="form-validations.html">One more 2</a></li>
                    </ul>
                </li>
            </ul>
        </aside>

        <aside id="chat" class="sidebar">

            <div class="chat-search">
                <div class="fg-line">
                    <input type="text" class="form-control" placeholder="Search People">
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div>

            <div class="lg-body c-overflow">
                <div class="list-group">
                    <a class="list-group-item media" href="">
                        <div class="pull-left p-relative">
                            <img class="lgi-img" src="img/demo/profile-pics/2.jpg" alt="">
                            <i class="chat-status-busy"></i>
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Jonathan Morris</div>
                            <small class="lgi-text">Available</small>
                        </div>
                    </a>

                    <a class="list-group-item media" href="">
                        <div class="pull-left">
                            <img class="lgi-img" src="img/demo/profile-pics/1.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">David Belle</div>
                            <small class="lgi-text">Last seen 3 hours ago</small>
                        </div>
                    </a>

                    <a class="list-group-item media" href="">
                        <div class="pull-left p-relative">
                            <img class="lgi-img" src="img/demo/profile-pics/3.jpg" alt="">
                            <i class="chat-status-online"></i>
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Fredric Mitchell Jr.</div>
                            <small class="lgi-text">Availble</small>
                        </div>
                    </a>

                    <a class="list-group-item media" href="">
                        <div class="pull-left p-relative">
                            <img class="lgi-img" src="img/demo/profile-pics/4.jpg" alt="">
                            <i class="chat-status-online"></i>
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Glenn Jecobs</div>
                            <small class="lgi-text">Availble</small>
                        </div>
                    </a>

                    <a class="list-group-item media" href="">
                        <div class="pull-left">
                            <img class="lgi-img" src="img/demo/profile-pics/5.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Bill Phillips</div>
                            <small class="lgi-text">Last seen 3 days ago</small>
                        </div>
                    </a>

                    <a class="list-group-item media" href="">
                        <div class="pull-left">
                            <img class="lgi-img" src="img/demo/profile-pics/6.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <div class="lgi-heading">Wendy Mitchell</div>
                            <small class="lgi-text">Last seen 2 minutes ago</small>
                        </div>
                    </a>
                </div>
            </div>
        </aside>

        <section id="content">
            <div class="container">
            <div class="block-header">
                <h2>Form Elements</h2>

                <ul class="actions">
                    <li>
                        <a class="icon-pop" href="">
                            <i class="zmdi zmdi-trending-up"></i>
                        </a>
                    </li>
                    <li>
                        <a class="icon-pop" href="">
                            <i class="zmdi zmdi-check-all"></i>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="icon-pop" href="" data-toggle="dropdown">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="">Refresh</a>
                            </li>
                            <li>
                                <a href="">Manage Widgets</a>
                            </li>
                            <li>
                                <a href="">Widgets Settings</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

                <div class="card">
                    <div class="card-header">
                    </div>

                    <div class="card-body card-padding">
                        <form role="form">
                            <div class="form-group fg-line">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control input-sm" id="exampleInputEmail1"
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group fg-line">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control input-sm" id="exampleInputPassword1"
                                       placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    <i class="input-helper"></i>
                                    Don't forget to check me out
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm m-t-10">Submit</button>
                        </form>
                    </div>
                </div>

                {{--<div class="card">
                    <div class="card-header">
                        <h2>Checkbox and Radio
                        </h2>
                    </div>
                    <div class="card-body card-padding">
                        <form role="form">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group fg-line">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control input-sm" id="exampleInputPassword1"
                                               placeholder="tetste">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group fg-line">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control input-sm" id="exampleInputPassword1"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <p class=" f-500 m-b-10">Algum título</p>
                                        <label class="radio radio-inline m-r-20">
                                            <input type="radio" name="inlineRadioOptions" value="option1">
                                            <i class="input-helper"></i>
                                            1
                                        </label>
                                        <label class="radio radio-inline m-r-20">
                                            <input type="radio" name="inlineRadioOptions" value="option2">
                                            <i class="input-helper"></i>
                                            2
                                        </label>
                                        <label class="radio radio-inline m-r-20">
                                            <input type="radio" name="inlineRadioOptions" value="option3">
                                            <i class="input-helper"></i>
                                            3
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <p class=" f-500 m-b-10">Algum título</p>
                                        <label class="checkbox checkbox-inline m-r-20">
                                            <input type="checkbox" value="option1">
                                            <i class="input-helper"></i>
                                            1
                                        </label>
                                        <label class="checkbox checkbox-inline m-r-20">
                                            <input type="checkbox" value="option2">
                                            <i class="input-helper"></i>
                                            2
                                        </label>
                                        <label class="checkbox checkbox-inline m-r-20">
                                            <input type="checkbox" value="option3">
                                            <i class="input-helper"></i>
                                            3
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group fg-line">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control input-sm" id="exampleInputPassword1"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <p class=" f-500 m-b-10">Sexo</p>
                                        <label class="radio radio-inline m-r-20">
                                            <input type="radio" name="inlineRadioOptions" value="option1">
                                            <i class="input-helper"></i>
                                            Maculino
                                        </label>
                                        <label class="radio radio-inline m-r-20">
                                            <input type="radio" name="inlineRadioOptions" value="option2">
                                            <i class="input-helper"></i>
                                            Feminino
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="form-group fg-line">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control input-sm" id="exampleInprutPassword1"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group fg-line">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control input-sm" id="exampleInputPasswodrd1"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group fg-line">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control input-sm" id="exampleInputPwassword1"
                                               placeholder="Password">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>--}}


            {{--<div class="card">
                <div class="card-header">
                    <h2>Textarea
                        <small>Form control which supports multiple lines of text. Change 'rows' attribute as
                            necessary.
                        </small>
                    </h2>
                </div>

                <div class="card-body card-padding">
                    <p class="c-black f-500 m-b-20">Basic Example</p>

                    <div class="form-group">
                        <div class="fg-line">
                                    <textarea class="form-control" rows="5"
                                              placeholder="Let us type some lorem ipsum...."></textarea>
                        </div>
                    </div>

                    <p class="c-black f-500 m-t-20 m-b-20">Height Auto Growing</p>

                    <div class="form-group">
                        <div class="fg-line">
                                    <textarea class="form-control auto-size"
                                              placeholder="Start pressing Enter to see growing..."></textarea>
                        </div>
                    </div>

                    <p class="c-black f-500 m-b-20 m-t-20">Disabled State</p>

                    <div class="form-group">
                        <div class="fg-line disabled">
                            <textarea class="form-control" disabled>This is disabled</textarea>
                        </div>
                    </div>
                </div>
            </div>--}}

            {{--<div class="card">
                <div class="card-header">
                    <h2>Select
                        <small>Use the default option, or add multiple to show multiple options at once.</small>
                    </h2>
                </div>

                <div class="card-body card-padding">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="c-black f-500 m-b-20">Basic Example</p>

                            <div class="form-group">
                                <div class="fg-line">
                                    <div class="select">
                                        <select class="form-control">
                                            <option>Select an Option</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                            <option>Option 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <p class="c-black f-500 m-b-20">Disabled Stat</p>

                            <div class="form-group">
                                <div class="fg-line">
                                    <div class="select">
                                        <select class="form-control" disabled>
                                            <option>Select an Option</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                            <option>Option 4</option>
                                            <option>Option 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}

            {{--<div class="card">
                <div class="card-header">
                    <h2>Checkbox and Radio
                        <small>Checkboxes are for selecting one or several options in a list, while radios are
                            for selecting one option from many.
                        </small>
                    </h2>
                </div>

                <div class="card-body card-padding">
                    <p class="c-black f-500 m-b-20">Basic Example</p>

                    <div class="checkbox m-b-15">
                        <label>
                            <input type="checkbox" value="">
                            <i class="input-helper"></i>
                            Option one is this and that-be sure to include why it's great
                        </label>
                    </div>

                    <div class="checkbox disabled">
                        <label>
                            <input type="checkbox" value="" disabled="">
                            <i class="input-helper"></i>
                            Option two is disabled
                        </label>
                    </div>

                    <br/>

                    <div class="radio m-b-15">
                        <label>
                            <input type="radio" name="sample" value="">
                            <i class="input-helper"></i>
                            Option one is this and that-be sure to include why it's great
                        </label>
                    </div>

                    <div class="radio m-b-15">
                        <label>
                            <input type="radio" name="sample" value="">
                            <i class="input-helper"></i>
                            Option two can be something else and selecting it will deselect option one
                        </label>
                    </div>

                    <div class="radio disabled">
                        <label>
                            <input type="radio" value="" disabled="">
                            <i class="input-helper"></i>
                            Option three is disabled
                        </label>
                    </div>

                    <br/>
                    <p class="c-black f-500 m-b-20 m-t-20">Inline Checkboxes and Radios - Use the
                        '.checkbox-inline' or '.radio-inline' classes on a series of checkboxes or radios for
                        controls that appear on the same line.</p>

                    <label class="checkbox checkbox-inline m-r-20">
                        <input type="checkbox" value="option1">
                        <i class="input-helper"></i>
                        1
                    </label>
                    <label class="checkbox checkbox-inline m-r-20">
                        <input type="checkbox" value="option2">
                        <i class="input-helper"></i>
                        2
                    </label>
                    <label class="checkbox checkbox-inline m-r-20">
                        <input type="checkbox" value="option3">
                        <i class="input-helper"></i>
                        3
                    </label>

                    <br/><br/>

                    <label class="radio radio-inline m-r-20">
                        <input type="radio" name="inlineRadioOptions" value="option1">
                        <i class="input-helper"></i>
                        1
                    </label>

                    <label class="radio radio-inline m-r-20">
                        <input type="radio" name="inlineRadioOptions" value="option2">
                        <i class="input-helper"></i>
                        2
                    </label>

                    <label class="radio radio-inline m-r-20">
                        <input type="radio" name="inlineRadioOptions" value="option3">
                        <i class="input-helper"></i>
                        3
                    </label>
                </div>
            </div>--}}
            </div>
        </section>
    </section>

    <footer id="footer">
        Copyright &copy; 2015 Material Admin

        <ul class="f-menu">
            <li><a href="">Home</a></li>
            <li><a href="">Dashboard</a></li>
            <li><a href="">Reports</a></li>
            <li><a href="">Support</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </footer>

    <!-- Page Loader -->
    <div class="page-loader">
        <div class="preloader pls-blue">
            <svg class="pl-circular" viewBox="25 25 50 50">
                <circle class="plc-path" cx="50" cy="50" r="20" />
            </svg>

            <p>Please wait...</p>
        </div>
    </div>

    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
    <div class="ie-warning">
        <h1 class="c-white">Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="img/browsers/chrome.png" alt="">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="img/browsers/firefox.png" alt="">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="img/browsers/opera.png" alt="">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="img/browsers/safari.png" alt="">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="img/browsers/ie.png" alt="">
                        <div>IE (New)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <!--[endif]-->

    @yield('content')

        <!-- jQuery personalizado -->
        <script type="text/javascript" src={{ asset('/lib/jquery/dist/jquery.min.js') }}></script>

        <script type="text/javascript" src={{ asset('/lib/bootstrap/dist/js/bootstrap.min.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/flot/jquery.flot.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/flot/jquery.flot.resize.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/flot.curvedlines/curvedLines.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/sparklines/jquery.sparkline.min.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/moment/min/moment.min.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/fullcalendar/dist/fullcalendar.min.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/simpleWeather/jquery.simpleWeather.min.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/Waves/dist/waves.min.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/bootstrap-growl/bootstrap-growl.min.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/sweetalert2/dist/sweetalert2.min.js') }}></script>
        <script type="text/javascript" src={{ asset('/dist/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}></script>

        <!-- Placeholder for IE9 -->
        <!--[if IE 9 ]-->
        <script type="text/javascript" src={{ asset('/dist/js/jquery-placeholder/jquery.placeholder.min.js') }}></script>
        <!--[endif]-->

        <script type="text/javascript" src={{ asset('/dist/js/app.min.js') }}></script>

        @yield('javascript')

    </body>
</html>
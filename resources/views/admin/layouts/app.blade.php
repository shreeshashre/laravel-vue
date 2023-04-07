<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="hold-transition sidebar-mini" id="app">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <router-link class="nav-link" data-widget="pushmenu" to="#" role="button"><i class="fas fa-bars"></i></router-link>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <router-link to="index3.html" class="nav-link">Home</router-link>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <router-link to="#" class="nav-link">Contact</router-link>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <router-link class="nav-link" data-widget="navbar-search" to="#" role="button">
                        <i class="fas fa-search"></i>
                    </router-link>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <router-link class="nav-link" data-toggle="dropdown" to="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </router-link>

                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <router-link to="#" class="dropdown-item">
                            <div class="media">
                                <img src="https://adminlte.io/themes/v3/dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </router-link>

                        <div class="dropdown-divider"></div>

                        <router-link to="#" class="dropdown-item">
                            <div class="media">
                                <img src="https://adminlte.io/themes/v3/dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </router-link>

                        <div class="dropdown-divider"></div>

                        <router-link to="#" class="dropdown-item">
                            <div class="media">
                                <img src="https://adminlte.io/themes/v3/dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                        </router-link>
                        <div class="dropdown-divider"></div>

                        <router-link to="#" class="dropdown-item dropdown-footer">See All Messages</router-link>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <router-link class="nav-link" data-toggle="dropdown" to="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </router-link>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <router-link to="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </router-link>
                        <div class="dropdown-divider"></div>
                        <router-link to="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </router-link>
                        <div class="dropdown-divider"></div>
                        <router-link to="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </router-link>
                        <div class="dropdown-divider"></div>
                        <router-link to="#" class="dropdown-item dropdown-footer">See All Notifications</router-link>
                    </div>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" data-widget="fullscreen" to="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" data-widget="control-sidebar" data-slide="true" to="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </router-link>
                </li>
            </ul>
        </nav>


        <router-linkside class="main-sidebar sidebar-dark-primary elevation-4">

            <router-link to="index3.html" class="brand-link">
                <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </router-link>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <router-link to="#" class="d-block">Alexander Pierce</router-link>
                    </div>
                </div>

                {{-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> --}}

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        {{-- <li class="nav-item menu-open">
                            <router-link to="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Starter Pages
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </router-link>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Active Page</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inactive Page</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li> --}}

                        <li class="nav-item">
                            <router-link to="/admin/dashboard" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/admin/appointments" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>
                                    Appoinments
                                </p>
                            </router-link>
                        </li>
                        
                        <li class="nav-item">
                            <router-link to="/admin/users" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Users
                                </p>
                            </router-link>
                        </li>
                        
                        <li class="nav-item">
                            <router-link to="/admin/setting" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Setting
                                </p>
                            </router-link>
                        </li>
                        
                        <li class="nav-item">
                            <router-link to="/admin/profile" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Profile
                                </p>
                            </router-link>
                        </li>
                        
                        <li class="nav-item">
                            <router-link to="/admin/logout" active-class="active" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Log Out
                                </p>
                            </router-link>
                        </li>
                    </ul>
                </nav>

            </div>

        </router-linkside>

        <div class="content-wrapper">
            <router-view></router-view>
        </div>


        <router-linkside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </router-linkside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2014-2021 <router-link to="https://adminlte.io">AdminLTE.io</router-link>.</strong> All rights
            reserved.
        </footer>
    </div>
</body>

</html>
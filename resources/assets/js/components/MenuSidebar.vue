<template>
  <!-- ============================================ -->
<!-- Begin Main_menu -->
<!-- ============================================ -->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <!-- ============================================ -->
    <!-- Begin Main-menu-content -->
    <!-- ============================================ -->
    <div class="main-menu-content">
        <!-- ============================================ -->
        <!-- Begin Navigation-->
        <!-- ============================================ -->
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span><span class="badge badge badge-info badge-pill float-right mr-2">1</span></a>
                <ul class="menu-content">
                    <li>
                        <a class="menu-item" href="dashboard-ecommerce.html">eCommerce</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href="index.html"><i class="la la-table"></i><span class="menu-title" data-i18n="nav.dash.main">Table</span><span class="badge badge badge-info badge-pill float-right mr-2">10</span></a>
                <ul class="menu-content">
                    <li>
                         <router-link :to="{ name: 'tables-users'}">Test Users</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'tables-users'}" class="menu-item">Users</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'tables-namhocs'}" class="menu-item">NamHoc</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'tables-hockys'}" class="menu-item">HocKy</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'tables-hoatdongs'}" class="menu-item">HoatDong</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'tables-lcdoanhoatdongs'}" class="menu-item">LCDHoatDong</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'tables-lcdoans'}" class="menu-item">LCDoan</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'tables-khoas'}" class="menu-item">Khoa</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'tables-lops'}" class="menu-item">Lop</router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Templates</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">Vertical</a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="../vertical-menu-template" data-i18n="nav.templates.vert.classic_menu">Classic Menu</a>
                        </li>
                    </ul>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header">
            <span data-i18n="nav.category.layouts">Layouts</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
            data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Page layouts</span><span class="badge badge badge-pill badge-danger float-right mr-2">New</span></a>
            <ul class="menu-content">
                <li><a class="menu-item" href="layout-1-column.html" data-i18n="nav.page_layouts.1_column">1 column</a>
                </li>
            </ul>
            </li>
            <li class=" nav-item"><a href="changelog.html"><i class="la la-copy"></i><span class="menu-title" data-i18n="nav.changelog.main">Changelog</span><span class="badge badge badge-pill badge-warning float-right">1.0</span></a>
            </li>
            <li class=" nav-item"><a href="scrumboard.html"><i class="la la-check-square"></i><span class="menu-title" data-i18n="nav.scrumboard.main">Scrumboard</span><span class="badge badge badge-info float-right">Update</span></a>
            </li>
            <li class=" navigation-header">
            <span data-i18n="nav.category.ui">User Interface</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
            data-placement="right" data-original-title="User Interface"></i>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-tablet"></i><span class="menu-title" data-i18n="nav.cards.main">Cards</span><span class="badge badge badge-success float-right mr-2">New</span></a>
            <ul class="menu-content">
                <li><a class="menu-item" href="card-bootstrap.html" data-i18n="nav.cards.card_bootstrap">Bootstrap</a>
                </li>
                <li><a class="menu-item" href="card-headings.html" data-i18n="nav.cards.card_headings">Headings</a>
                </li>
            </ul>
            </li>
            <li class=" navigation-header">
            <span data-i18n="nav.category.support">Support</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
            data-placement="right" data-original-title="Support"></i>
            </li>
            <li class=" nav-item"><a href="https://www.facebook.com/AndroidDeveloper.MinhHoang.HueIC.IT"><i class="la la-whatsapp"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">FGDev Contact</span></a>
            </li>
            <li class=" nav-item">
            <a href="https://github.com/KenHoang16CDTH12/FG-YouthUnion"><i class="la la-github"></i>
                <span class="menu-title" data-i18n="nav.support_documentation.main">Github</span>
            </a>
            </li>
        </ul>
        <!-- ============================================ -->
        <!-- End Navigation-->
        <!-- ============================================ -->
    </div>
    <!-- ============================================ -->
    <!-- End Main-menu-content -->
    <!-- ============================================ -->
</div>
<!-- ============================================ -->
<!-- End Main_menu -->
<!-- ============================================ -->
</template>

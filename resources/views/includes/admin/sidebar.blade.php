<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
        <!--begin::Scroll wrapper-->
        <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item here {{ request()->is('admin/produk*') ? 'show' : '' }} menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon">

                            <i class="ki-duotone ki-lots-shopping fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                                <span class="path7"></span>
                                <span class="path8"></span>
                            </i>
                        </span>
                        <span class="menu-title">Produk</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->is('admin/produk/kategori*') ? 'active' : '' }}"
                                href="{{ route('admin.produk.kategori.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kategori</span>
                            </a>
                            <a class="menu-link {{ request()->is('admin/produk/item*') ? 'active' : '' }}"
                                href="{{ route('admin.produk.item.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Item</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <div class="menu-item"><!--begin:Menu link-->
                    <a class="menu-link " href="{{ route('admin.page-web.index') }}">
                        <span class="menu-icon"><i class="ki-duotone ki-calendar-8 fs-2"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                    class="path4"></span><span class="path5"></span><span
                                    class="path6"></span></i></span><span class="menu-title">Page Web</span>
                    </a><!--end:Menu link-->
                </div>
                <div class="menu-item"><!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/transaksi*') ? 'active' : '' }}"
                        href="{{ route('admin.transaksi.index') }}">
                        <span class="menu-icon"><i class="ki-duotone ki-calendar-8 fs-2"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                    class="path4"></span><span class="path5"></span><span
                                    class="path6"></span></i></span>
                        <span class="menu-title">Transaksi</span>
                    </a><!--end:Menu link-->
                </div>
                <div class="menu-item"><!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/projek*') ? 'active' : '' }}"
                        href="{{ route('admin.projek.index') }}">
                        <span class="menu-icon"><i class="ki-duotone ki-calendar-8 fs-2"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                    class="path4"></span><span class="path5"></span><span
                                    class="path6"></span></i></span>
                        <span class="menu-title">Projek</span>
                    </a><!--end:Menu link-->
                </div>
                <div class="menu-item"><!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/jasa*') ? 'active' : '' }}"
                        href="{{ route('admin.jasa.index') }}">
                        <span class="menu-icon">
                            <i class="bi bi-tools fs-2"></i>
                        </span>
                        <span class="menu-title">Jasa</span>
                    </a><!--end:Menu link-->
                </div>

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Scroll wrapper-->
    </div>
    <!--end::Menu wrapper-->
</div>

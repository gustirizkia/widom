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


                <div class="menu-item"><!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('projek*') ? 'active' : '' }}"
                        href="{{ route('projek.index') }}">
                        <span class="menu-icon"><i class="ki-duotone ki-calendar-8 fs-2"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                    class="path4"></span><span class="path5"></span><span
                                    class="path6"></span></i></span><span class="menu-title">Projek</span>
                    </a><!--end:Menu link-->
                </div>
                <div class="menu-item"><!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('transaksi*') ? 'active' : '' }}"
                        href="{{ route('transaksi.index') }}">
                        <span class="menu-icon"><i class="ki-duotone ki-calendar-8 fs-2"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                    class="path4"></span><span class="path5"></span><span
                                    class="path6"></span></i></span><span class="menu-title">Transaksi</span>
                    </a><!--end:Menu link-->
                </div>
                <div class="menu-item"><!--begin:Menu link-->
                    <a class="menu-link " href="{{ route('product') }}">
                        <span class="menu-icon"><i class="ki-duotone ki-calendar-8 fs-2"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                    class="path4"></span><span class="path5"></span><span
                                    class="path6"></span></i></span><span class="menu-title">Produk</span>
                    </a><!--end:Menu link-->
                </div>

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Scroll wrapper-->
    </div>
    <!--end::Menu wrapper-->
</div>

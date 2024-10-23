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

                {{-- Master Data --}}

                <!--begin::Menu item-->
                <div class="menu-item menu-sub-indention menu-accordion {{ request()->is('admin/master-data*') ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#" class="menu-link py-3">
                        <span class="menu-icon">
                            <i class="bi bi-boxes fs-2"></i>
                        </span>
                        <span class="menu-title">Master Data</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub menu-sub-accordion pt-3">


                        <!--begin::Menu item-->
                        <div class="menu-item menu-accordion {{ request()->is('admin/master-data/produk*') ? 'show' : '' }}"
                            data-kt-menu-trigger="click">
                            <!--begin::Menu link-->
                            <a href="#" class="menu-link py-3">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Produk</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <!--end::Menu link-->

                            <!--begin::Menu sub produk-->
                            <div class="menu-sub menu-sub-accordion pt-3">

                                <!--begin::Menu item-->
                                <div class="menu-item ">
                                    <a href="{{ route('admin.master-data.produk.kategori.index') }}"
                                        class="menu-link py-3 {{ request()->is('admin/master-data/produk/kategori*') ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Kategori</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <a href="{{ route('admin.master-data.produk.item.index') }}"
                                        class="menu-link py-3 {{ request()->is('admin/master-data/produk/item*') ? 'active' : '' }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Item</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu sub produk-->
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <a href="{{ route('admin.master-data.bank.index') }}"
                                class="menu-link py-3 {{ request()->is('admin/master-data/bank*') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Bank</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu sub-->
                </div>
                <!--end::Menu item-->

                {{-- Master Data end --}}

                <!--begin:Menu item-->
                {{-- <div data-kt-menu-trigger="click"
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
                                href="{{ route('admin.master-data.produk.kategori.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kategori</span>
                            </a>
                            <a class="menu-link {{ request()->is('admin/produk/item*') ? 'active' : '' }}"
                                href="{{ route('admin.master-data.produk.item.index') }}">
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
                </div> --}}
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


                <!--begin::Menu item-->
                <div class="menu-item menu-sub-indention menu-accordion {{ request()->is('admin/web-config*') ? 'show' : '' }}"
                    data-kt-menu-trigger="click">
                    <!--begin::Menu link-->
                    <a href="#" class="menu-link py-3">
                        <span class="menu-icon">
                            <i class="bi bi-browser-chrome fs-2"></i>
                        </span>
                        <span class="menu-title">Web Config</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--end::Menu link-->

                    <!--begin::Menu sub-->
                    <div class="menu-sub menu-sub-accordion pt-3">
                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <a href="{{ route('admin.web-configcontent.index') }}"
                                class="menu-link py-3 {{ request()->is('admin/web-config/content*') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Content</span>
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <a href="{{ route('admin.web-configkategori-blog.index') }}"
                                class="menu-link py-3 {{ request()->is('admin/web-config/kategori-blog*') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Kategori Blog</span>
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <a href="{{ route('admin.web-configblog.index') }}"
                                class="menu-link py-3 {{ request()->is('admin/web-config/blog*') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog</span>
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item">
                            <a href="{{ route('admin.web-configinformasi.index') }}"
                                class="menu-link py-3 {{ request()->is('admin/web-config/informasi*') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Informasi</span>
                            </a>
                        </div>
                        <!--end::Menu item-->


                    </div>
                    <!--end::Menu sub-->
                </div>
                <!--end::Menu item-->

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Scroll wrapper-->
    </div>
    <!--end::Menu wrapper-->
</div>

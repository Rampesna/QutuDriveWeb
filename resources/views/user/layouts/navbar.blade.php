<div id="kt_header" class="header align-items-stretch">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                    </svg>
                </span>
            </div>
        </div>

        <div class="d-flex align-items-center flex-lg-grow-0">
            <a href="#" class="d-lg-none">
                <img alt="Logo" src="{{ getLogoPath(url('/')) }}" class="h-30px" />
            </a>
        </div>

        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

                </div>
            </div>
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <label for="SelectedCompany"></label>
                    <select id="SelectedCompany" class="form-select form-select-solid select2Input w-300px" data-control="select2" data-minimum-results-for-search="Infinity" data-placeholder="Firma Seçimi">
                    </select>
                </div>
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <div class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px position-relative" id="kt_drawer_chat_toggle">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black"></path>
                                <path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black"></path>
                            </svg>
                        </span>
                        <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <div class="btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="currentColor"/>
                                <path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="currentColor"/>
                                <path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="currentColor"/>
                            </svg>
                        </span>
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" style="">
                        <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('{{ assert('assets/media/misc/pattern-1.jpg') }}')">
                            <h3 class="text-dark fw-bold px-9 mt-10 mb-6">Veritabanı İndirmeleri</h3>
                            <hr class="text-muted">
                            <div class="row p-3" id="waitingDatabaseBackDownloadsRow">
                                <div class="col-xl-12">
                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
                                                <i class="fa fa-times-circle fa-lg text-danger cursor-pointer"></i>
                                            </div>
                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">Veritabanı Adı</a>
                                            </div>
                                        </div>
                                        <span class="badge badge-light-warning fs-8">Durum</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <span class="btn btn-sm btn-secondary btn-icon fs-5 fw-bolder" id="loggedUserNameFirstWordSpan">
                            <i class="fa fa-spinner fa-spin fa-sm"></i>
                        </span>
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <span class="btn btn-sm btn-active-secondary btn-secondary btn-icon fs-5 fw-bolder cursor-default" id="loggedUserNameFirstWordSpan2">
                                        <i class="fa fa-spinner fa-spin fa-sm"></i>
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                        <span id="authUserNameSpan"></span>
                                        <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2"></span></div>
                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7" id="authUserEmailSpan"></a>
                                </div>
                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Hesap Bilgileri</a>
                        </div>
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Kullanım Bilgileri</a>
                        </div>
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Hakkında</a>
                        </div>
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Yardım</a>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title position-relative">Dil Seçimi</span>
                            </a>
                            <div class="menu-sub menu-sub-dropdown w-175px py-4" style="">
                                <div class="menu-item px-3">
                                    <a onclick="changeLanguage('tr')" class="menu-link d-flex px-5">
                                        <span class="symbol symbol-20px me-4">
                                            <img class="rounded-1" src="{{ asset('assets/media/flags/turkey.svg') }}" alt="">
                                        </span>Türkçe
                                    </a>
                                </div>
                                <div class="menu-item px-3">
                                    <a onclick="changeLanguage('en')" class="menu-link d-flex px-5">
                                        <span class="symbol symbol-20px me-4">
                                            <img class="rounded-1" src="{{ asset('assets/media/flags/united-states.svg') }}" alt="">
                                        </span>English
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5" onclick="logout()">Çıkış Yap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

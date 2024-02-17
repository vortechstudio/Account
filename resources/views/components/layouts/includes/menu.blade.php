<!--begin::Menu wrapper-->
<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
    <!--begin::Menu-->
    <div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                    <span class="menu-item {{ route_is('home') ? 'here' : '' }} me-0 me-lg-2">
                        <a href="" class="menu-link" wire:navigate>
                            <span class="menu-title">Accueil</span>
                        </a>
                    </span>
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item {{ route_is(['account.app', 'account.mbrHistory', 'account.loginHistory', 'account.rgpd']) ? 'here' : '' }} menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
            <!--begin:Menu link-->
            <span class="menu-link">
							<span class="menu-title">Comptes</span>
							<span class="menu-arrow d-lg-none"></span>
						</span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                <div class="menu-item {{ route_is('account.app') ? 'here' : '' }}">
                    <a class="menu-link" href="{{ route('account.app') }}" wire:navigate>
                        <span class="menu-title">Informations de compte</span>
                    </a>
                </div>
                <div class="menu-item {{ route_is('account.mbrHistory') ? 'here' : '' }}">
                    <a class="menu-link" href="{{ route('account.mbrHistory') }}" wire:navigate>
                        <span class="menu-title">Historique du compte</span>
                    </a>
                </div>
                <div class="menu-item {{ route_is('account.loginHistory') ? 'here' : '' }}">
                    <a class="menu-link" href="{{ route('account.loginHistory') }}" wire:navigate>
                        <span class="menu-title">Historique des connexions</span>
                    </a>
                </div>
                <div class="menu-item {{ route_is('account.rgpd') ? 'here' : '' }}">
                    <a class="menu-link" href="{{ route('account.rgpd') }}" wire:navigate>
                        <span class="menu-title">Mes données personnels</span>
                    </a>
                </div>
            </div>
            <!--end:Menu sub-->
        </div>
        <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item {{ route_is(['services.dashboard', 'services.authenticator']) ? 'here' : '' }} menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
            <!--begin:Menu link-->
            <span class="menu-link">
							<span class="menu-title">Services & Options</span>
							<span class="menu-arrow d-lg-none"></span>
						</span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                <div class="menu-item {{ route_is('services.dashboard') ? 'here' : '' }}">
                    <a class="menu-link" href="{{ route('services.dashboard') }}" wire:navigate>
                        <span class="menu-title">Etat des services & Options</span>
                    </a>
                </div>
                <div class="menu-item {{ route_is('services.authenticator') ? 'here' : '' }}">
                    <a class="menu-link" href="{{ route('services.authenticator') }}" wire:navigate>
                        <span class="menu-title">Authentification Double facteur (MFA)</span>
                    </a>
                </div>
            </div>
            <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        <span class="menu-item me-0 me-lg-2">
            <a href="" class="menu-link" wire:navigate>
                <span class="menu-title">Centre de support</span>
            </a>
        </span>
    </div>
    <!--end::Menu-->
</div>
<!--end::Menu wrapper-->

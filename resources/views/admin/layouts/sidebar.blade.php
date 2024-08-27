<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo me-1">
                <img scr="{{ asset('assets/img/logo.png')}}" width="30" height="24"/>
              </span>
              <span class="app-brand-text demo menu-text fw-semibold ms-2">Olibh</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item active open">
              <a href="{{route('dashboard.index')}}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
                <div data-i18n="Dashboards">Dashboards</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-form-select"></i>
                <div data-i18n="Form Elements">Products</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{route('products.create')}}"  class="menu-link">
                    <div data-i18n="Basic Inputs">Product Create</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{route('products.index')}}" class="menu-link">
                    <div data-i18n="Input groups">Product list</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

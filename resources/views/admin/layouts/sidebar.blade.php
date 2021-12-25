<nav id="sidebrr" class="pcoded-navbar">
      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
      <div class="pcoded-inner-navbar main-menu">
          <div class="">
              <div class="main-menu-content">
                  <ul>
                      <li class="more-details">
                          <a href="#"><i class="ti-user"></i>View Profile</a>
                          <a href="#!"><i class="ti-settings"></i>Settings</a>
                          <a href="#"><i class="ti-layout-sidebar-left"></i>Logout</a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Main</div>
          <ul class="pcoded-item pcoded-left-item">
              <li class="{{ Request::is('dashboard')? 'active' : '' }}">
                  <a href="/dashboard" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
              </li>
            </ul>
            <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Administrator</div>
            <ul class="pcoded-item pcoded-left-item">
                {{-- <li class="{{ Request::is('transaction*')? 'active' : '' }}">
                    <a href="/transactions" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-wallet"></i><b>FC</b></span>
                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Transactions</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li> --}}
                
                <li class="{{ Request::is('transaction*')? 'active' : '' }} pcoded-hasmenu ">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-wallet"></i></span>
                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Transactions</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{ Request::is('transaction/waiting-for-verification*')? 'active' : '' }}">
                            <a href="/transaction/waiting-for-verification" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Waiting For Verification</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="{{ Request::is('transaction/on-shipping*')? 'active' : '' }}">
                            <a href="/transaction/on-shipping" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">On Shipping</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="{{ Request::is('transaction/arrived*')? 'active' : '' }}">
                            <a href="/transaction/arrived" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Arrived</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                




              <li class="{{ Request::is('products*')? 'active' : '' }}">
                  <a href="/products" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-support"></i><b>FC</b></span>
                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Products</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
              </li>
              <li class="{{ Request::is('user*')? 'active' : '' }}">
                  <a href="/users" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Users</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
              </li>
              <li class="{{ Request::is('customer*')? 'active' : '' }}">
                  <a href="/customer" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-crown"></i><b>FC</b></span>
                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Customers</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
              </li>
              <li class="{{ Request::is('review*')? 'active' : '' }}">
                  <a href="/review" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-mobile""></i><b>FC</b></span>
                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Reviews</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
              </li>
          </ul>
      </div>
  </nav>

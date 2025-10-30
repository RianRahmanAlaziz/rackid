  <nav class="side-nav side-nav--simple">
      <ul>
          <li>
              <a href="/dashboard" class="side-menu {{ Request::is('dashboard') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                  <div class="side-menu__title"> Dashboard </div>
              </a>
          </li>
          <li class="side-nav__devider my-6"></li>
          <li>
              <a href="javascript:;"
                  class="side-menu {{ Request::is('dashboard/banner*', 'dashboard/category*', 'dashboard/product*', 'dashboard/gallery*') ? 'side-menu--active side-menu--open' : '' }}">
                  <div class="side-menu__icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                          viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" stroke-linejoin="round"
                          class="lucide lucide-folders-icon lucide-folders">
                          <path
                              d="M20 5a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2.5a1.5 1.5 0 0 1 1.2.6l.6.8a1.5 1.5 0 0 0 1.2.6z" />
                          <path d="M3 8.268a2 2 0 0 0-1 1.738V19a2 2 0 0 0 2 2h11a2 2 0 0 0 1.732-1" />
                      </svg></div>
                  <div class="side-menu__title">
                      Data Master
                      <div class="side-menu__sub-icon"> <i data-lucide="chevron-down"></i> </div>
                  </div>
              </a>
              <ul
                  class=" {{ Request::is('dashboard/banner*', 'dashboard/category*', 'dashboard/product*', 'dashboard/gallery*') ? 'side-menu__sub-open' : '' }}">
                  <li>
                      <a href="/dashboard/banner"
                          class="side-menu {{ Request::is('dashboard/banner*') ? 'side-menu--active' : '' }}">
                          <div class="side-menu__icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" class="lucide lucide-wallpaper-icon lucide-wallpaper">
                                  <path d="M12 17v4" />
                                  <path d="M8 21h8" />
                                  <path d="m9 17 6.1-6.1a2 2 0 0 1 2.81.01L22 15" />
                                  <circle cx="8" cy="9" r="2" />
                                  <rect x="2" y="3" width="20" height="14" rx="2" />
                              </svg>
                          </div>
                          <div class="side-menu__title"> Banner </div>
                      </a>
                  </li>
                  <!-- Category -->
                  <li>
                      <a href="/dashboard/category"
                          class="side-menu {{ Request::is('dashboard/category*') ? 'side-menu--active' : '' }}">
                          <div class="side-menu__icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round"
                                  class="lucide lucide-chart-bar-stacked-icon lucide-chart-bar-stacked">
                                  <path d="M11 13v4" />
                                  <path d="M15 5v4" />
                                  <path d="M3 3v16a2 2 0 0 0 2 2h16" />
                                  <rect x="7" y="13" width="9" height="4" rx="1" />
                                  <rect x="7" y="5" width="12" height="4" rx="1" />
                              </svg>
                          </div>
                          <div class="side-menu__title"> Category </div>
                      </a>
                  </li>
                  <!-- Product -->
                  <li>
                      <a href="/dashboard/product"
                          class="side-menu {{ Request::is('dashboard/product*') ? 'side-menu--active' : '' }}">
                          <div class="side-menu__icon"> <i data-lucide="shopping-cart"></i> </div>
                          <div class="side-menu__title"> Product </div>
                      </a>
                  </li>
                  <li>
                      <a href="/dashboard/gallery"
                          class="side-menu {{ Request::is('dashboard/gallery*') ? 'side-menu--active' : '' }}">
                          <div class="side-menu__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  class="lucide lucide-images-icon lucide-images">
                                  <path d="m22 11-1.296-1.296a2.4 2.4 0 0 0-3.408 0L11 16" />
                                  <path d="M4 8a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2" />
                                  <circle cx="13" cy="7" r="1" fill="currentColor" />
                                  <rect x="8" y="2" width="14" height="14" rx="2" />
                              </svg></div>
                          <div class="side-menu__title"> Gallery </div>
                      </a>
                  </li>
              </ul>
          </li>
      </ul>
  </nav>

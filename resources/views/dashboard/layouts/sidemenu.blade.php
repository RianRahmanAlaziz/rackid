  <nav class="side-nav side-nav--simple">
      <ul>
          <li>
              <a href="/dashboard" class="side-menu {{ Request::is('dashboard') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                  <div class="side-menu__title"> Dashboard </div>
              </a>
          </li>
          <!-- Category -->
          <li>
              <a href="/dashboard/category"
                  class="side-menu {{ Request::is('dashboard/category*') ? 'side-menu--active' : '' }}">
                  <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
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

      </ul>
  </nav>

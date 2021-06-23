<div class="br-logo"><a href="{{ route('index') }}">
<img src="{{ asset($web_info->logo) }}" width="80%"  alt="">
</a></div>
<div class="br-sideleft sideleft-scrollbar">
  <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
  <ul class="br-sideleft-menu">
    <li class="br-menu-item">
      <a href="{{ route('admin.home') }}" class="br-menu-link {{ (request()->is('admin/dashbord')) ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="{{ route('admin.categories.index') }}" class="br-menu-link {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
        <i class="fa fa-cubes" aria-hidden="true"></i>
        <span class="menu-item-label">Category</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    
    {{-- <li class="br-menu-item">
      <a href="{{ route('admin.subcategories.index') }}" class="br-menu-link {{ (request()->is('admin/subcategories*')) ? 'active' : '' }}">
        <i class="fa fa-cube" aria-hidden="true"></i>
        <span class="menu-item-label">Sub Category</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item --> --}}
    
    <li class="br-menu-item">
      <a href="{{ route('admin.products.index') }}" class="br-menu-link {{ (request()->is('admin/products*')) ? 'active' : '' }}">
        <i class="fa fa-paint-brush" aria-hidden="true"></i>
        <span class="menu-item-label">Product</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    
    <li class="br-menu-item">
      <a href="{{ route('admin.pos.index') }}" class="br-menu-link {{ (request()->is('admin/pos*')) ? 'active' : '' }}">
        <i class="fa fa-print" aria-hidden="true"></i>
        <span class="menu-item-label">Pos</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="{{ route('admin.orders.index') }}" class="br-menu-link {{ (request()->is('admin/orders*')) ? 'active' : '' }}">
        <i class="fas fa-box"></i>
        <span class="menu-item-label">Order</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->

    <li class="br-menu-item">
      <a href="{{ route('admin.web.index') }}" class="br-menu-link {{ (request()->is('admin/web*')) ? 'active' : '' }}">
        <i class="fa fa-globe" aria-hidden="true"></i>
        <span class="menu-item-label">Web Info</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->


  </ul><!-- br-sideleft-menu -->

  

  <br>
</div><!-- br-sideleft -->
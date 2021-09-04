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
      </a>
    </li>
    <li class="br-menu-item">
      <a href="{{ route('admin.categories.index') }}" class="br-menu-link {{ (request()->is('admin/categories*')) ? 'active' : '' }}">
        <i class="fa fa-cubes" aria-hidden="true"></i>
        <span class="menu-item-label">Category</span>
      </a>
    </li>
    
    {{-- <li class="br-menu-item">
      <a href="{{ route('admin.subcategories.index') }}" class="br-menu-link {{ (request()->is('admin/subcategories*')) ? 'active' : '' }}">
        <i class="fa fa-cube" aria-hidden="true"></i>
        <span class="menu-item-label">Sub Category</span>
      </a>
    </li> --}}
    
    <li class="br-menu-item">
      <a href="{{ route('admin.products.index') }}" class="br-menu-link {{ (request()->is('admin/products*')) ? 'active' : '' }}">
        <i class="fa fa-paint-brush" aria-hidden="true"></i>
        <span class="menu-item-label">Products</span>
      </a>
    </li>
    
    <li class="br-menu-item">
      <a href="{{ route('admin.pos.index') }}" class="br-menu-link {{ (request()->is('admin/pos*')) ? 'active' : '' }}">
        <i class="fa fa-print" aria-hidden="true"></i>
        <span class="menu-item-label">Pos</span>
      </a>
    </li>
    
    <li class="br-menu-item">
      <a href="{{ route('admin.stocks.index') }}" class="br-menu-link {{ (request()->is('admin/stocks*')) ? 'active' : '' }}">
        <i class="fa fa-print" aria-hidden="true"></i>
        <span class="menu-item-label">Stocks</span>
      </a>
    </li>
    <li class="br-menu-item">
      <a href="{{ route('admin.orders.index') }}" class="br-menu-link {{ (request()->is('admin/orders*')) ? 'active' : '' }}">
        <i class="fas fa-box"></i>
        <span class="menu-item-label">Orders</span>
      </a>
    </li>
    
    <li class="br-menu-item">
      <a href="{{ route('admin.types.index') }}" class="br-menu-link {{ (request()->is('admin/types*')) ? 'active' : '' }}">
        <i class="fas fa-box"></i>
        <span class="menu-item-label">Types</span>
      </a>
    </li>
    <li class="br-menu-item">
      <a href="{{ route('admin.units.index') }}" class="br-menu-link {{ (request()->is('admin/units*')) ? 'active' : '' }}">
        <i class="fas fa-box"></i>
        <span class="menu-item-label">Units</span>
      </a>
    </li>
    <li class="br-menu-item">
      <a href="{{ route('admin.items.index') }}" class="br-menu-link {{ (request()->is('admin/items*')) ? 'active' : '' }}">
        <i class="fas fa-box"></i>
        <span class="menu-item-label">Items</span>
      </a>
    </li>
    <li class="br-menu-item">
      <a href="{{ route('admin.suppliers.index') }}" class="br-menu-link {{ (request()->is('admin/suppliers*')) ? 'active' : '' }}">
        <i class="fas fa-box"></i>
        <span class="menu-item-label">Suppliers</span>
      </a>
    </li>
    
    <li class="br-menu-item">
      <a href="{{ route('admin.admins.index') }}" class="br-menu-link {{ (request()->is('admin/admins*')) ? 'active' : '' }}">
        <i class="fa fa-gavel" aria-hidden="true"></i>
        <span class="menu-item-label">Admins</span>
      </a>
    </li>
    
    <li class="br-menu-item">
      <a href="{{ route('admin.roles.index') }}" class="br-menu-link {{ (request()->is('admin/roles*')) ? 'active' : '' }}">
        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
        <span class="menu-item-label">Role</span>
      </a>
    </li>

    <li class="br-menu-item">
      <a href="{{ route('admin.web.index') }}" class="br-menu-link {{ (request()->is('admin/web*')) ? 'active' : '' }}">
        <i class="fa fa-globe" aria-hidden="true"></i>
        <span class="menu-item-label">Web Info</span>
      </a>
    </li>


  </ul>

  

  <br>
</div>
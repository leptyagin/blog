<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <span class="brand-text font-weight-light">Lara Blog</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tree"></i>
                    <p>Категории</p>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
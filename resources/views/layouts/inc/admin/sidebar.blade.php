<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">PRODUCTOS</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/products/create')}}">Añadir Producto</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/products')}}">Ver Productos</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/brands">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">MARCAS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/colors">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">COLORES</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/category">
              <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">CATEGORIAS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Banner Principal</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pregunta/index">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">Preguntas Frecuentes</span>
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="documentation/documentation.html">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Contactanos</span>
            </a>
          </li>
        </ul>
      </nav>
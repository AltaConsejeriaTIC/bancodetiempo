<div class="nav-side-menu">
    <div class="brand">Bogotá Cambalachea</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="/homeAdmin">
                      <i class="fa fa-dashboard fa-lg"></i> Inicio
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed">
                  <a href="#"><i class="fa fa-bar-chart fa-lg"></i> Reportes <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li><a href="/homeAdminUser">Usuarios</a></li>
                    <li><a href="/listServiceAdmin">Ofertas</a></li>
                    <li><a href="/historyDonations">Donaciones</a></li>
                    <li><a href="/listDeals">Tratos</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#new" class="collapsed">
                  <a href="#"><i class="fa fa-desktop fa-lg"></i> Secciones administrables <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                     <li><a href="/homeAdminCategory">Categorias</a></li>
                  <li><a href="/admin/suggestedSites">Sitios sugeridos</a></li>
                  <li><a href="/homeAdminContents">Paginas administrables</a></li>
                  <li><a href="/admin/dynamicContent">Modulos administrables</a></li>
                </ul>

                 <li>
                  <a href="#">
                      <i class="fa fa-user fa-lg"></i> Profile
                  </a>
                  </li>

                 <li>
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out fa-lg"></i> Salir
                  </a>
                </li>
            </ul>
     </div>
</div>


<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
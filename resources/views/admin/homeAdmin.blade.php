@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Panel de Administración</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                @include('partial.errors')
            </div>



            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Administrar Usuarios</h3></div>
                    <div class="panel-body">
                        <p>Sección para gestionar los usuarios registrados en el sistema. (Administradores o Usuarios de
                            la comunidad.)</p>
                        <p><a href="/homeAdminUser" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Administrar Categorias</h3></div>
                    <div class="panel-body">
                        <p>Sección para gestionar categorias a las que pertenecen los servicios que ofrece el
                            sistema.</p>
                        <p><a href="/homeAdminCategory" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Generar Reportes</h3></div>
                    <div class="panel-body">
                        <p><br></p>
                        <p><a href="/admin/reports" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Administrar Contenidos</h3></div>
                    <div class="panel-body">
                        <p>Sección para gestionar las paginas de contenidos cambiantes.</p>
                        <p><a href="/homeAdminContents" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Administrar Ofertas</h3></div>
                    <div class="panel-body">
                        <p>Sección para gestionar todas las ofertas.</p>
                        <p><a href="/homeAdminServices" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Administrar Grupos</h3></div>
                    <div class="panel-body">
                        <p>Sección para gestionar todos los grupos.</p>
                        <p><a href="/listGroups" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Administrar Campañas</h3></div>
                    <div class="panel-body">
                        <p>Sección para gestionar todas las campañas.</p>
                        <p><a href="/adminCampaigns" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Reporte Donaciones</h3></div>
                    <div class="panel-body">
                        <p>Sección para visualizar repote de donaciones.</p>
                        <p><a href="/historyDonations" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Ofertas</h3></div>
                    <div class="panel-body">
                        <p>Crear ofertas, editar y eliminar</p>
                        <p>
                           <p><a href="/listServiceAdmin" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Tratos</h3></div>
                    <div class="panel-body">
                        <p>Listado de tratos</p>
                        <p>
                           <p><a href="/listDeals" class="btn btn-raised btn-primary btn-lg">Ingresar</a></p>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection

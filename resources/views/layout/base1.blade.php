<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap 5-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!--  iconos de fontawesome-->
    <script src="https://kit.fontawesome.com/a411db0add.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

     <!-- mis estilos creados -->
    <link href="{{ asset('inicio.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('miestilo.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
	<script src="{{ asset('js/scripts.bundle.js') }}"></script>

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	
	@yield('page-info')
	
    <title>GEEPPERU</title>


</head>

<body id="kt_body"    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

    <nav id="menu">
        <!-- start menu -->
        <ul>
            &nbsp;

            <li id="telefono">
                <a href="#">&nbsp;&nbsp;<i class="fa-solid fa-phone"></i> +51 936108792</a>
            </li>

            <li id="direccion">
                <a href="mailto:@ventas@geepperu.com"> &nbsp;&nbsp;<i class="fa-solid fa-envelope"></i> ventas@geepperu.com</a>
            </li>
            <li style="float:right">
                &nbsp;&nbsp;&nbsp;&nbsp;
            </li>
            <li style="float:right">
                <a> &nbsp;&nbsp;
                    Mi Cuenta▼
                </a>
                <ul>
                    <li><a href="·">Ingresar</a></li>
                    <li><a href="#">Mi Cuenta</a></li>
                    <li><a href="#">Mi Carrito</a></li>
                    <li><a href="#">Pagar</a></li>

                </ul>
            </li>
            <li style="float:right">
                <a href="#"> &nbsp;&nbsp;
                    Lista de deseos</a>
            </li>






        </ul>

        <!-- end menu -->
    </nav>

    <nav id="menu3">

        <a href="/">
            <img src="{{ asset('imgs/geepperu2.png') }}" title="geepperu" alt="geepperu" />
        </a>

        <ul>
            <li id="inicioN">
                <a href="/">&nbsp;&nbsp; INICIO</a>
            </li>

            <li>
                <a>&nbsp;&nbsp;
                    CATEGORÍAS
                </a>
                <ul id="optionmenucat">
                 
                </ul>
            </li>
            <li id="nosotrosN">
                <a>&nbsp;&nbsp;
                    NOSOTROS
                </a>
                <ul id="optionmenu">
                    <li><a href="/nosotros">Quienes Somos</a>  </li>
                    
                    <li><a href="/trayectoria">Nuestra Trayectoria</a> </li>
                    <li><a href="/principios">Nuestros Principios</a> </li>

                </ul>
            </li>
            <li id="serviciosN">
                <a>&nbsp;&nbsp;
                    SERVICIOS
                </a>
                <ul id="optionmenu">
                    <li><a href="#">VENTA DE COMPUTADORAS</a></li>
                    <li><a href="#">SERVICIO TECNICO</a></li>

                </ul>
            </li>
            <li>
                <a href="">&nbsp;&nbsp; OFERTAS</a>
            </li>
            <li id="contact">
                <a href="/contactanos">&nbsp;&nbsp; CONTÁCTANOS</a>
            </li>
            <li>
                <a>&nbsp;&nbsp;
                    <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}} Items
                </a>
                <ul id="cart">
                    @include('partials.cart-drop')
                </ul>
            </li>


        </ul>


    </nav>

    <div class="container">

        @yield('content')

    </div>
    <br> <br>
    <!-- START FOOTER -->
    <div id="servicios">
        <br>
        <div class="container">
            <div class="row justify-content-center" style="text-align: center;">
                <div class="col-xs-12 col-sm-6 col-md-4  col-lg-2">
                    <ul>
                        <i class="fa-solid fa-chart-line  "></i>
                        <br>
                        <h6>Alta Calidad</h6>
                        <p>Contamos con la mejor tecnología nacional e internacional</p>
                    </ul>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-4  col-lg-2">
                    <ul>
                        <i class="fa-solid fa-headset"></i>
                        <br>
                        <h6>Soporte Online</h6>
                        <p>Contamos con personal profesional para ayudarlo</p>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4  col-lg-2">
                    <ul>
                        <i class="fa-solid fa-truck"></i>
                        <br>
                        <h6>Llegamos a tu Casa</h6>
                        <p>Te protegemos!, por eso llegamos hasta la puerta de tu casa</p>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4  col-lg-2">
                    <ul>
                        <i class="fa-solid fa-user-shield"></i>
                        <br>
                        <h6>Garantía</h6>
                        <p>Todos nuestros productos y servicios están garantizados</p>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4  col-lg-2">
                    <ul>
                        <i class="fa-solid fa-lock"></i>
                        <br>
                        <h6>Pago Seguro</h6>
                        <p>Contamos con la mayor seguridad para tus compras en linea</p>
                    </ul>

                </div>
            </div>

        </div>
        <hr  />
    </div>
 
    <div id="nosotros">

        <div class="container">
            <div class="row justify-content-center" style="text-align: center;">
                <div class="col-xs-12  col-sm-6  col-md-4 col-lg-3 ">
                    <br>
                    <h6> ¿PORQUE ELEGIRNOS?</h6>
                    <ul>
                        <a href="/nosotros">
                            <li> Nuestra Empresa </li>
                        </a>
                        <a href="/trayectoria">
                            <li> Nuestra Trayectoria </li>
                        </a>
                        <a href="#">
                            <li> Nuestras Distinciones </li>
                        </a>
                        <a href="/principios">
                            <li> Nuestros Principios </li>
                        </a>
                    </ul>
                </div>
                <div class="col-xs-12  col-sm-6  col-md-4 col-lg-3 ">
                    <br>
                    <h6> POLÍTICAS</h6>
                    <ul>
                        <a href="#">
                            <li> Política de Devoluciones </li>
                        </a>
                        <a href="#">
                            <li> Política de Privacidad </li>
                        </a>
                        <a href="#">
                            <li> Política Comerciales </li>
                        </a>
                        <a href="#">
                            <li> Política de Darantias </li>
                        </a>
                        <a href="#">
                            <li> Política de Envios </li>
                        </a>
                    </ul>
                </div>
                <div class="col-xs-12  col-sm-6  col-md-4 col-lg-3 ">
                    <br>
                    <h6> SERVICIOS</h6>
                    <ul>
                        <a href="/contactanos">
                            <li> Soporte </li>
                        </a>
                        <a href="/contactanos">
                            <li> Ventas Tienda</li>
                        </a>
                        <a href="/contactanos">
                            <li> Ventas Online </li>
                        </a>
                        <a href="/contactanos">
                            <li> Reclamaciones </li>
                        </a>
                        <a href="/preguntasfrecuentes">
                            <li> Preguntas Frecuentes </li>
                        </a>
                    </ul>
                </div>
                <div class="col-xs-12  col-sm-6  col-md-4 col-lg-3 ">
                    <br>
                    <h6> CONTÁCTANOS!</h6>
                    <p> Con gusto nuestros ejecutivos especializados atenderán tus dudas, recibirán tus comentarios.</p>

                    <ul style="list-style-type: none;">
                        <a href="https://www.google.com/maps/place/GEEP+PERU+SRL/@-8.114465,-79.0307253,19z/data=!3m1!4b1!4m5!3m4!1s0x91ad3d120d07dfbf:0xf5641a979fb99073!8m2!3d-8.1144663!4d-79.0301781">
                            <li> <i class="fa-solid fa-location-dot"></i>Jirón Francisco Pizarro 203, Trujillo </li>
                        </a>
                        <a href="tel:+51936108792">
                            <li> <i class="fa-solid fa-phone"></i>936108792</li>
                        </a> 
                        <a href="">
                            <li> <i class="fa-solid fa-envelope"></i>ventas@geepperu.com </li>
                        </a>
                    </ul>
                </div>

            </div>
        </div>
        <hr />
        <div style="text-align: center;">

            <a><strong>2022© Todos los derechos reservados</strong></a> &nbsp - &nbsp


            <a><strong>Hecho por TPF</strong></a>

        </div>

    </div>
    <!-- END FOOTER -->

    <!-- START COPYRIGHT -->



    <!--  js de bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   
    @yield('script')
    <script>
    $(document).ready(function() {
        $.get('/listacategorias', function(data) { 
            for (var i = 0; i < data.length; i++) {
                $("#optionmenucat").append('<li id="categorias"><a href="/categoria-producto/'+data[i].nombre+'">'+data[i].nombre+'</a> <ul id="optionmenusubcat'+data[i].idcategoria+'"> </ul> </li>');
            }
        });
        $.get('/listasubcategorias', function(data) { 
            for (var i = 0; i < data.length; i++) {
                $('#optionmenusubcat'+data[i].categoria_id).append('<li id="subcategorias"><a href="/subcategoria-producto/'+data[i].nombre+'">'+data[i].nombre+'</a> </li>');
            }
        });
    });
    </script>
</body>


</html>
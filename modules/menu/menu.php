
        <div class="container-fluid bg-primary p-2 text-white" style="border-bottom: 1px solid black;">
        <div class="row">
            <div class="col-2 text-end" style="">
                <img src="http://localhost/avicola/img/logo.png" alt="Logo" class="rounded-pill" style="width:28%; min-width:50px;">
            </div>
            <div class="col p-2">
                <h3 class="ms-3 text-start">El caracol</h3>
            </div>

            <div class="col d-none d-sm-block">
                <h3 class="text-center">         
                    <?php
                        $mes = array("","Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre");
                        echo date('d')." de ". $mes[date('n')] . " de " . date('Y');
                        ?></h3> 
            </div>
            <div class="col text-end">
                    <ul class="navbar-nav"style="font-size: 22px;">
                        <li class="nav-item"><a href="http://localhost/avicola/controller/logout.php" class="nav-link">
                            <i class="bi bi-box-arrow-in-right"></i>Cerrar sesion</a></li>
                        </a></li>
                    </ul>
            </div>
        </div>
    </div>
     </div>





@extends('templates.main')
@section('content')
<div>
     <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Inicio</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">   
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid"> 
        
        <div class="accordion" id="accordionExample">
            <?php
            $cont = 0;
            foreach ($cursos as $key => $item) {  
            ?>
            <div class="card m-b-0">
                <div class="card-header text-center" id="heading<?php echo $item->id_curso;?>">
                    <h5 class="mb-0">
                        <a  data-toggle="collapse" data-target="#collapse<?php echo $item->id_curso;?>" aria-expanded="false" aria-controls="collapse<?php echo $item->id_curso;?>">
                            <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="false"></i>
                            <span><?php 
                                    $nombrecurso = $item->curso." ".$item->seccion;
                                    $iniciales = explode(" ", $nombrecurso);
                                    $nombrecurso = substr($iniciales[0],0,1).substr($iniciales[1],0,1).$iniciales[2]." ".$iniciales[3];
                                    echo $nombrecurso;
                                ?></span>
                        </a>
                    </h5>
                </div>
                <div id="collapse<?php echo $item->id_curso;?>" class="collapse show" aria-labelledby="heading<?php echo $item->id_curso;?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12"> 
                                <div class="row">                                       
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-cyan text-center">
                                                <h1 class="font-light text-white">
                                                    <i class="fas fa-user"></i>
                                                </h1>
                                                <h6 class="text-white">Auxiliar<br/><?php echo "$item->auxiliar";?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-success text-center">
                                                <h1 class="font-light text-white">
                                                    <i class="fas fa-building"></i>
                                                </h1>
                                                <h6 class="text-white">Edificio<br/><?php echo "$item->Edificio";?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-secondary text-center">
                                                <h1 class="font-light text-white">
                                                    <i class="far fa-address-book"></i>
                                                </h1>
                                                <h6 class="text-white">Salon<br/><?php echo "$item->salon";?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white">
                                                    <i class="far fa-clock"></i>
                                                </h1>
                                                <h6 class="text-white">Hora<br/><?php echo "$item->horario";?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white">
                                                    <i class="fas fa-calendar-check"></i>
                                                </h1>
                                                    <?php if (($item->curso=='Matemática Básica 1')||($item->curso=='Matemática Básica 2')||($item->curso=='Matemática Intermedia 1')||($item->curso=='Matemática Intermedia 2')||($item->curso=='Matemática Intermedia 3')){?>
                                                                <h6 class="text-white">Días<br/>L-Ma-Mi-V</h6>
                                                                <?php }else{?>
                                                                <h6 class="text-white">Días<br/>L-Mi-V</h6>
                                                                <?php }?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-danger text-center">
                                                <h1 class="font-light text-white">
                                                    <i class="fab fa-black-tie"></i>
                                                </h1>
                                                <h6 class="text-white">Catedrático<br/>Ing. <?php echo "$item->Catedratico";?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            <?php
                                $bandera = 0;
                                foreach ($clases_asig as $key => $item2) 
                                {
                                    if($item2->id_clase==$item->id_curso)
                                    {
                                        $bandera=1;                                    
                                    }
                                }  
                                if($bandera==0)
                                {
                            ?>
                            <form class="col-md-2" method="POST" action="{{ route('matricularse') }}">
                                <input type="text" hidden="true" name="id_clase" value="<?php echo $item->id_curso;?>">
                                <button type="submit" class="btn btn-block btn-cyan">
                                    <i class="mdi mdi-account-plus"></i> Inscribirse
                                </button>
                            <?php
                                }
                                else
                                {
                            ?>
                            <form class="col-md-2" method="POST" action="{{ route('desmatricularse') }}">
                                <input type="text" hidden="true" name="id_clase" value="<?php echo $item->id_curso;?>">
                                <button type="submit" class="btn btn-block btn-danger">
                                    <i class="mdi mdi-account-minus"></i> Desasignar
                                </button>
                            <?php
                                }
                            ?>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
@endsection
@section('script')
<script src="/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="/dist/js/waves.js"></script>
<script src="/dist/js/sidebarmenu.js"></script>
<script src="/dist/js/custom.min.js"></script>
@endsection
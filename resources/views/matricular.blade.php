@extends('templates.main')
@section('news')
<ul class="list-style-none">
    <li>
        <div class="">
            <a href="javascript:void(0)" class="link border-top">
                <div class="d-flex no-block align-items-center p-10">
                    <span class="btn btn-danger btn-circle"><i class="ti-calendar"></i></span>
                    <div class="m-l-10">
                        <h5 class="m-b-0">Recoger Tarea1</h5> 
                        <span class="mail-desc">Hoy</span> 
                    </div>
                </div>
            </a>
            <a href="javascript:void(0)" class="link border-top">
                <div class="d-flex no-block align-items-center p-10">
                    <span class="btn btn-warning btn-circle"><i class="ti-calendar"></i></span>
                    <div class="m-l-10">
                        <h5 class="m-b-0">Parcial 1</h5> 
                        <span class="mail-desc">En 3 días</span> 
                    </div>
                </div>
            </a>
            <!-- Message -->
            <a href="javascript:void(0)" class="link border-top">
                <div class="d-flex no-block align-items-center p-10">
                    <span class="btn btn-primary btn-circle"><i class="ti-calendar"></i></span>
                    <div class="m-l-10">
                        <h5 class="m-b-0">Recoger Tarea2</h5> 
                        <span class="mail-desc">Próxima Semana</span> 
                    </div>
                </div>
            </a>
        </div>
    </li>
</ul>
@endsection
@section('content')
<div class="page-wrapper">
  <!-- accoridan part -->
                        <div class="accordion" id="accordionExample">
                            <div class="card m-b-0">
                                <div class="card-header text-center" id="headingOne">
                                  <h5 class="mb-0">
                                    <a  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 A</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   		<div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingTwo">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 B</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                            <div class="card m-b-0 border-top">
                                <div class="card-header text-center" id="headingThree">
                                  <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="m-r-5 mdi mdi-book-open-page-variant" aria-hidden="true"></i>
                                        <span>MB1 C</span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <div class="row">
                                            <div class="col-lg-12"> 
                                                 <div class="row">                                       
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-cyan text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                                                <h6 class="text-white">Auxiliar<br/>Cesar Morales</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-success text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-building"></i></h1>
                                                                <h6 class="text-white">Edificio<br/>T1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-secondary text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-address-book"></i></h1>
                                                                <h6 class="text-white">Salon<br/>L-II 1</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-warning text-center">
                                                                <h1 class="font-light text-white"><i class="far fa-clock"></i></h1>
                                                                <h6 class="text-white">Hora<br/>10:40-12:20</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-info text-center">
                                                                <h1 class="font-light text-white"><i class="fas fa-calendar-check"></i></h1>
                                                                <h6 class="text-white">Dias<br/>L-Mi-V</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                                        <div class="card card-hover">
                                                            <div class="box bg-danger text-center">
                                                                <h1 class="font-light text-white"><i class="fab fa-black-tie"></i></h1>
                                                                <h6 class="text-white">Catedrático<br/>Ing.Samayoa</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     <div class="row">
                                        	<div class="col-md-5"></div>
                                        	<div class="col-md-2">
                                        		<button type="button" class="btn btn-block btn-cyan"><i class="mdi mdi-account-plus"></i>Inscribirse</button>
                                        	</div>
                                    	</div>
                                  </div>
                                </div>
                            </div>
                        </div>
        <footer class="footer text-center">
                Departamento de Matem&aacuteticas FIUSAC
        </footer>
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
    @extends('templates.main')

    @section('head')
    <link rel="stylesheet" type="text/css" href="/assets/extra-libs/multicheck/multicheck.css">
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <link href="/assets/extra-libs/DataTables/scroller.bootstrap4.min.css" rel="stylesheet">
    @endsection

@section('content')
<div>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Noticias</h4>
            </div>
        </div>
    </div>        
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionNews">
                    <?php
                        $cont =0;
                        foreach ($chat as $key => $item) {
                    ?> 
                    <div class="card m-b-0">
                        <div class="card-header" id="heading<?php echo $item->id;?>">
                            <h5 class="mb-0">
                              <a  data-toggle="collapse" data-target="#collapse<?php echo $item->id;?>" aria-expanded="<?php if($cont==0){echo "true";}else{echo "false";} ?>" aria-controls="collapse<?php echo $item->id;?>">
                                  <i class="m-r-5 mdi mdi-message-text" aria-hidden="true"></i>
                                  <span><?php echo $item->titulo;?></span>
                              </a>
                          </h5>
                        </div>
                        <div id="collapse<?php echo $item->id;?>" class="collapse <?php if($cont==0){echo "show";} ?>" aria-labelledby="heading<?php echo $item->id;?>" data-parent="#accordionNews">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $item->clase." ".$item->seccion;?></h4>
                                        <div class="chat-box scrollable" style="height:475px;">
                                            <ul class="chat-list" id="<?php echo "chat".$item->id;?>">
                                                <li class="odd chat-item">
                                                    <div class="chat-content">
                                                        <div class="box bg-light-inverse"><?php echo $item->descripcion;?></div>
                                                        <div class="chat-time"><?php echo $item->fecha;?></div>
                                                        <br>
                                                    </div>
                                                </li>
                                                <?php
                                                    foreach ($item->dialogos as $key => $aux)
                                                    {
                                                        if($aux->tipo==3)
                                                        {
                                                ?> 
                                                <li class="chat-item">    
                                                    <div class="chat-content">
                                                        <h6 class="font-medium"><?php echo $aux->Nombre;?></h6>
                                                        <div class="box bg-info text-white"><?php echo $aux->Contenido;?></div>
                                                    </div>
                                                    <div class="chat-time"><?php echo $aux->Fecha;?></div>
                                                </li> 
                                                <?php
                                                        }
                                                        else
                                                        {
                                                ?>  
                                                <li class="odd chat-item">    
                                                    <div class="chat-content">              
                                                        <div class="box bg-light-inverse"><?php echo $aux->Contenido;?></div>
                                                    </div>
                                                    <div class="chat-time"><?php echo $aux->Fecha;?></div>
                                                </li> 
                                                <?php
                                                        }
                                                    }
                                                ?>                                              
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="input-field m-t-0 m-b-0">
                                                    <textarea id="men<?php echo $item->id;?>" placeholder="Mensaje" class="form-control border-0"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <a class="btn-circle btn-lg btn-cyan float-right text-white" data-toggle="tooltip" data-placement="top" title="Enviar" onclick="nueva('<?php echo $item->id;?>')"><i class="fas fa-paper-plane"></i></a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $cont=1;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none">
    <form id="mensend" name="mensend" method="POST" action="{{ route('save.mensaje') }}"  target="_blank">
        <input type="text" name="claves" id="claves">
        {{ csrf_field() }}
    </form>
         
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

    <script>
         function nueva(id) {
        var chat = document.getElementById("chat"+id);
        var men = document.getElementById("men"+id);        
        var li = document.createElement("li");        
        var div = document.createElement("div");    
        var div2 = document.createElement("div");    

        <?php if($type == 3)
            {
        ?>
        div.setAttribute("class", "chat-content");
        li.setAttribute("class", "chat-item");
        
        var h6 = document.createElement("h6");        
        h6.setAttribute("class", "font-medium");
        h6.innerHTML="<?php echo $username;?>";

                
        div2.setAttribute("class", "box bg-info text-white");

        div.appendChild(h6);
        

        <?php
            }
            else 
            {
        ?>
        div.setAttribute("class", "chat-content");
        li.setAttribute("class", "odd chat-item");
                
        div2.setAttribute("class", "box bg-light-inverse");

        <?php
            }
        ?>

        div2.innerHTML = men.value;
        div.appendChild(div2);

        var div3 = document.createElement("div");        
        div3.setAttribute("class", "chat-time");
        var time = new Date();
        var mes = "";
        if(time.getMonth()<9)
        {
            mes = "0"+(time.getMonth()+1);
        }
        else
        {
            mes = (time.getMonth()+1);
        }
        var dia = "";
        if(time.getDate()<10)
        {
            dia = "0"+time.getDate();
        }
        else
        {
            dia = time.getDate();
        }
        var hora = "";
        if(time.getHours()<10)
        {
            hora = "0"+time.getHours();
        }
        else
        {
            hora = time.getHours();
        }
        var min = "";
        if(time.getMinutes()<10)
        {
            min = "0"+time.getMinutes();
        }
        else
        {
            min = time.getMinutes();
        }
        var seg = "";
        if(time.getSeconds()<10)
        {
            seg = "0"+time.getSeconds();
        }
        else
        {
            seg = time.getSeconds();
        }

        var fecha = time.getFullYear()+"-"+mes+"-"+dia+" "+hora+":"+min+":"+seg
        div3.innerHTML=fecha;

        li.appendChild(div);
        li.appendChild(div3);
        chat.appendChild(li);
        
        var padre = document.getElementById("mensend");

        var input = document.createElement("INPUT");
            input.type = 'text';  
            input.setAttribute("id", "mensaje");
            input.setAttribute("name", "mensaje");
            input.setAttribute("value", men.value);
            padre.appendChild(input);

        var input2 = document.createElement("INPUT");
            input2.type = 'text';  
            input2.setAttribute("id", "noticia");
            input2.setAttribute("name", "noticia");
            input2.setAttribute("value", id);
            padre.appendChild(input2);

        var input3 = document.createElement("INPUT");
            input3.type = 'text';  
            input3.setAttribute("id", "fecha");
            input3.setAttribute("name", "fecha");
            input3.setAttribute("value", fecha);
            padre.appendChild(input3);


            document.mensend.submit();
            padre.innerHTML = '{{ csrf_field() }}';
            var input = document.createElement("INPUT");
            input.type = 'text';  
            input.setAttribute("id", "claves");
            input.setAttribute("name", "claves");
            padre.appendChild(input);

            men.value ="";

        }
    </script>

@endsection
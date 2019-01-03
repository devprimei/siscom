@extends('layout.app')
  @section('links')   
        <link rel="stylesheet" href="{{ URL::to('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css') }}">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
    @endsection
 @section('estilos')
<style>
 
  aside{
      margin-top: 5%;
      padding: 3%;
  }
  .btnTop{
      margin-top: 1rem;
      margin-left: 0.5rem;
  }
  .nav-tabs{
    
	background-color: #fafafa !important; 
  }
  .cardImg{
    color: white !important;
  }
.modal-content {width: 700px !important; margin-left:-20%;}
    .modal-body {  width:100%; } 
 

</style>

@endsection

@section('telaListarPaciente')
    <hr>
        <div class = 'container-fluid corpo-paciente .d-flex'>
                <div class="row">
                        <aside class="col-2 d-flex justify-content-center">
                            
                            <form class = 'form-group 'name="form" method= 'get'>
                                <input class = 'form-control 'type="text" name="cronometro" value="00:00:00" />
                                <button class="btn btn-outline-secondary btnTop" type="button" onclick="setInterval('tempo()',983);return false;">Iniciar</button>
                                <button class="btn btn-outline-danger btnTop  " type="submit" >Finalizar</button>
                            </form>
                        
                        </aside>
        
                    <section class="col-10">
                            <div class="d-flex justify-content-end">
                        
                                    <a class="btn btn-outline-secondary ladoDireito"  href="{{route('dashboard')}}" data-toggle="tooltip" title="Voltar"><i class="fas fa-share"></i></a>
                                    <a class="btn btn-outline-success ladoDireito" data-toggle="modal" data-target=".bd-example-modal-x" title="Agendar"> <i class="fas fa-plus-circle"></i></a>
                            </div>
                            <div class="card  text-white">
                                    <svg class="bd-placeholder-img bd-placeholder-img-lg card-img" width="100%" height="270" xmlns="http://www.w3.org/2000/svg"
                                     preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Card image"><title>Placeholder</title><rect fill="#05a7ff" width="100%" height="100%"></rect><text fill="#dee2e6" dy=".3em" x="50%" y="50%"></text></svg>
                                   <!-- <img src="..." class="card-img" alt="..."> -->
                                   
                                    <div class="card-img-overlay">
                                      <div class="d-flex justify-content-start">
                                        
                                      </div>
                                      <h5 class="card-title">Nome do paciente</h5>
                                      <div class="card-body">
                                      
                                          <div class=" container row">
                                              <div class="col-3">
                                                <label for="">Nome:</label>
                                                <span class="">Rafael</span>
                                              </div>
                                              <div class="col-3">
                                                <label for="">Idade:</label>
                                                <span class="">22 anos</span>
                                              </div>
                                              <div class="col-2">
                                                  <label for="">peso:</label>
                                                  <span class="">63</span>
                                              </div>
                                              <div class="col-2">
                                                <label for="">Altura:</label>
                                                <span class="">1,80</span>
                                              </div>
                                              <div class="col-3">
                                                <label for="">Sintoma:</label>
                                                <span class="">gripe</span>
                                              </div>
                                            </div>
                                      
                                      </div>
                                      <p class="card-text">Last updated 3 mins ago</p>
                                    </div>
                                  </div>
                                </section>
                </div>
                    <section>

                        
                            <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Atendimento</a>
                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">.....</a>
                                      <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Registro Clinico</a>
                                    </div>
                                  </nav>
                                  <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="container-fluid">
                                                <form action="" method="post">
                                                    <div class="row">
                                                        <div class="col-12 form-group">
                                                            <div class="form-group">
                                                                    <label for="queixa">Queixa Principal</label>
                                                                    <input type="text" class="form-control" id="queixa">
                                                            </div>
                                                        </div>
                                                        <div class="col-6 ">
                                                           <div class="form-group">
                                                                <span for="historia">historia</span>
                                                                <textarea name="historia" id="historia" cols="60" rows="10" class="form-control"></textarea>
                                                           </div>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                          em desenvolvimento
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                                      <!-- fazer um foreach com as infos dos registros e de algum jeio mandar pro colapse -->
                                    
                                      <a data-toggle="collapse" id="registroCollapse" value= {{ 2 }}><p>Ordenado por data .</p></a>
                                     

                                               <!-- corpo do colapse -->
                                    <div id="Registro" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <div class=" container row">
                                            <div class="col-3">
                                              <label for="">Nome:</label>
                                              <span id="Rnome">fadfafaf</span>
                                            </div>
                                            <div class="col-3">
                                              <label for="">Idade:</label>
                                              <span  id="Ridade">dfadfafda</span>
                                            </div>
                                            <div class="col-2">
                                                <label for="">peso:</label>
                                                <span  id="Rpeso">fafdafafd</span>
                                            </div>
                                            <div class="col-2">
                                              <label for="">Altura:</label>
                                              <span c id="Raltura">fadfadfdf</span>
                                            </div>
                                            <div class="col-3">
                                              <label for="">Sintoma:</label>
                                              <span  id="Rsistoma">fgfdafafd</span>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div><!-- nav bar lateral -->
                            </div><!-- corpo da navbar lateral -->
                    </section>
                        
                </div>
        </div>
           
    
            
     
  

@endsection

    @section('scripts')
 <script type="text/javascript" language="JavaScript">
var segundo = 0+"0";
var minuto = 0+"0";
var hora = 0+"0";
 
function tempo(){	
   if (segundo < 59){
      segundo++
      if(segundo < 10){segundo = "0"+segundo}
   }else 
      if(segundo == 59 && minuto < 59){
         segundo = 0+"0";
	minuto++;
	if(minuto < 10){minuto = "0"+minuto}
      }
   if(minuto == 59 && segundo == 59 && hora < 23){
      segundo = 0+"0";
      minuto = 0+"0";
      hora++;
      if(hora < 10){hora = "0"+hora}
   }else 
      if(minuto == 59 && segundo == 59 && hora == 23){
         segundo = 0+"0";
	minuto = 0+"0";
	hora = 0+"0";
      }
   form.cronometro.value = hora +":"+ minuto +":"+ segundo
}


</script>
    <script type="text/javascript" src="{{ asset('js/buscaAjax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/agenda.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    @endsection



@extends('layout.app')

@section('estilos')
<style>
    span{
        text-align: center;
    }
    form{
        
     float: right;
    }
    .container-fluid{
        margin-top: 1rem;
    }
    .btn{
        float:right;
    }
   
</style>
@endsection

@section('conteudo')

   
@endsection


@section('navegação')
 
@endsection



@section('tela')
<!--<a  class="btn btn-outline-danger"  href=""   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>-->

<div class="container-fluid col-lg-12">
<div class="card text-center mb-3">
    <div class="card-header">
           <h3 class="titulopacientes">Pacientes Cadastrados</h3>
           <form action="buscar" method="post">
                @csrf
            <a  class="btn btn-outline-danger"  href=""   data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="fas fa-times"></i></a>
            <a  id = "recon"class="btn btn-outline-success"  href="{{route('paciente.novo')}}"   data-toggle="tooltip" data-placement="top" title="cadastrar"><i class="fas fa-plus-circle"></i></a>
           <input class=" form-control" type="text" name="search" placeholder="Buscar nome, cpf e matricula">
        </form>
    </div>
    <div class="card-body">
            <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th >prontuario      </th>
                <th >nome            </th>
                <th >cpf             </th>
                <th >identidade      </th>
                <th >Nascimento</th>
                <th >sexo            </th>
     {{--       <th >etnia           </th>      --}}
                <th >nacionalidade   </th>
    {{--        <th >naturalidade    </th>   
                <th >escolaridade    </th>--}}
    <!--        <th scope="col">rua             </th>
                <th scope="col">numero          </th>
                <th scope="col">bairro          </th>
                <th scope="col">cep             </th>
                <th scope="col">cidade          </th>
                <th scope="col">estado          </th>
                <th scope="col">telefone        </th>
                <th scope="col">celular         </th>-->
                <th scope="col">email           </th> 
       {{--          <th scope="col">profissao       </th> --}}
                <th scope="col">status        </th>  
                <th scope="col">opções    </th>
              </tr>
            </thead>
            <tbody>
                @php $cont = 0; @endphp
                @foreach ($pacientes as $p)
                @php $cont = $cont + 1; @endphp
                    
              <tr class="Filter">
                 <td class="prontuario">       {{$p->id}}          </td>
  <!--           <td>       {{$p->DataCadastro}}        </td>  -->
                 <td class="nome">       {{$p->nome}}             </td>
                 <td class="cpf">       {{$p->cpf}}                 </td>
                 <td>       {{$p->identidade}}          </td>
                 <td>       {{$p->dataDeNascimento}}    </td>
                 <td>       {{$p->sexo}}                </td>
  {{--            <td>       {{$p->etnia}}               </td>   --}}
                 <td>       {{$p->nacionalidade}}       </td>
    {{--              <td>       {{$p->naturalidade}}        </td> 
                 <td>       {{$p->escolaridade}}        </td>  --}}
    <!--         <td>       {{$p->rua}}                 </td>
                 <td>       {{$p->numero}}              </td>
                 <td>       {{$p->bairro}}              </td>
                 <td>       {{$p->cep}}                 </td>
                 <td>       {{$p->cidade}}              </td>
                 <td>       {{$p->estado}}              </td>
                 <td>       {{$p->telefone}}            </td>
                 <td>       {{$p->celular}}             </td>-->
                 <td>       {{$p->email}}               </td> 
      {{--           <td>       {{$p->profissao}}           </td>  --}}
                 <td>       {{$p->status}}            </td>  
                <td>
                    <button id="excluir"name = "excluir" class="btn btn-outline-danger" type="Submit" onclick ="alguma({{$p->id}})"  data-toggle="tooltip" data-placement="top" title="excluir"><i class="fas fa-trash"></i></button>  
                
                    <a class="btn btn-outline-primary" href="editar/{{$p->id}}"  title="editar"><i class="fas fa-edit"></i></a> 
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="card-footer">
            @if($cont==4)

                <p></p>  

            @endif
            {!!$pacientes->links()!!}
          </div>
    </div>

</div>
</div>
   <hr> 


    @endsection


    @section('scripts')
<script type="text/javascript" src="{{ asset('js/filtra.js') }}"></script>
 <script type="text/javascript" src="{{ asset('js/confirmacaoDeExclusao.js') }}"></script>   
    @endsection
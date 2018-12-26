<?php

namespace App\Http\Controllers;
use App\Models\Especialidade;
use App\Models\Funcionario;
use App\Models\Paciente;
use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\JsonResponse;
class AgendaController extends Controller
{


    function index( $medicoId  = "", $date = "",$espec = ""){

        $especialidade = Especialidade::with('Medico.funcionario')->get();
        $medicos = Medico::all();
        //return dd($date);
        $med = Medico::find($medicoId);
        if($med != null){
        //dd($med->planos[0]->procedimentos()->get());
    }
        //Opção com buscar por medico e data 
        $agendamentos = Agenda::where('idMedico', $medicoId)->where('data', $date)->orderBy('hora')->get();

      //Opção para teste
       // $agendamentos = Agenda::where('idMedico',$medicoId)->get();
               // return dd($agendamentos);

     if(!empty($espec)){
         $esp = Especialidade::find($espec);

         
         $especialidadesP = $esp->procedimentos()->get();
         //dd($especialidadesP);
        
     }
        return view('agenda.teste', compact('especialidade','medicos','esp','agendamentos','med', 'medicoId', 'date','especialidadesP'));

    }




    function agendar(Request $request){
        
            $dataDaConsulta = strtotime($request['data']);
            $date = strtotime(date("Y-m-d"));
            if( $dataDaConsulta < $date  )
                return back();

            $paciente = Paciente::where('cpf',$request['cpf'])->where('nome',$request['paciente'])->first();
            if($paciente === null){
                $paciente = Paciente::create([

                   'nome'             => $request['paciente'],
                   'cpf'              => $request['cpf'],
                   'dataDeNascimento' => $request['dataDeNascimento'],
                   'telefone'         => $request['telefone'],
                   'celular'          => $request['celular'],
                   
                ]);
            }
            try{            
                Agenda::create([ 
                    'primeiraVez'      => $request['primeiraVez'] ,
                    'paciente_id'      => $paciente->id, 
                    'paciente'         => $request['paciente'],
                    'cpf'              => $request['cpf'],
                    'dataDeNascimento' => $request['dataDeNascimento'],
                    'telefone'         => $request['telefone'],
                    'celular'          => $request['celular'],
                    'procedimento_id'  => $request['procedimento_id'],
                    'medico'           => $request['medico'],
                    'idMedico'         => $request['idMedico'],
                    'atendente'        => $request['atendente'],
                    'hora'             => $request['hora'],
                    'data'             => $request['data'],


                    ]);

            }catch (\Exception $e){

              $mensagem= $e->getMessage();
              $buscar = ' Integrity constraint violation: 1062 Duplicate entry';
               $pos = strpos( $mensagem, $buscar );



                if ($pos === false) 
                    return back();
               
            }
        

            return back();


    }

    
    function desmarcar(Request $request){
     //   return dd($request);

        $id = $request['id'];
           //  return dd($id);
            $agenda = Agenda::find($id);
            $dataDaConsulta = strtotime($agenda->data);
            $date = strtotime(date("Y-m-d"));
            if( $dataDaConsulta == $date  )
                $agenda->delete();
            

            return back();


    }


    function remarcar(Request $request , $id){

        $this->desmarcar($id);
        $this->remarcar($request, $id);

        return back();


    }


    function getMedicosEsp($id){
       $medico = Medico::find($id);
        $esps = $medico->especialidade()->get(); 
        return json_encode($esps);

    }


     function buscarName( Request $request){
         $term = $request['term'];
      $nome = Paciente::where('nome', 'like', '%'.$term.'%')->pluck('nome');
       return json_encode($nome);

  

    }

 function buscarCpf( Request $request){
         $term = $request['term'];
      $cpf = Paciente::where('cpf', 'like', '%'.$term.'%')->pluck('cpf');
       return json_encode($cpf);

  

    }


}

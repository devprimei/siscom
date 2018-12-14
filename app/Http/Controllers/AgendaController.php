<?php

namespace App\Http\Controllers;
use App\Models\Especialidade;
use App\Models\Funcionario;
use App\Models\Medico;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
class AgendaController extends Controller
{

    public $horarios = [
        '08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00',
    ];

    function index(){

        $especialidade = Especialidade::with('Medico.funcionario')->get();
        //return dd($especialidade);
        return view('agenda.index', compact('especialidade'));
    }

    function index2($medicoId){

        $especialidade = Especialidade::with('Medico.funcionario')->get();
        //return dd($especialidade);
        $med = Medico::find($medicoId);
     
        $horarios = $this->horarios;
        $agendamentos = Agenda::all();
       
        return view('agenda.index', compact('especialidade','horarios','agendamentos','med'));
    }


    function agendar(Request $request){

            $agenda = Agenda::create($request->all());

            return back();


    }

    
    function desmarcar($id){

            $agenda = Agenda::find($id);
            $agenda->delete();

            return back();


    }


    function remarcar(Request $request , $id){

        $this->desmarca($id);
        $this->remarcar($request, $id);

        return back();


    }

}

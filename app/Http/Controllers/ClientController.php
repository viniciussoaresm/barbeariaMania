<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
	private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

    // Listando pessoas
    public function list(){
		return $this->client->all();
	}
		
	// Cadastrando pessoas
	public function new(Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw

		$res = DB::insert('insert into clientes (nome, email) values (?, ?)', [$data['nome'], $data['email']]); // Insert
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	// Editando pessoas
	public function editar($id, Request $request){
		$data = sizeof($_POST) > 0 ? $_POST : json_decode($request->getContent(), true); // Pega o post ou o raw
 
		$res = DB::update("update clientes set nome = ?, email = ? WHERE id = ?",[$data['nome'], $data['email'], $id]); //Update
 
		return ["status" => ($res)?'ok':'erro'];
	}
 
	// Excluindo pessoas
	public function excluir($id){
		$res = DB::delete("delete from clientes WHERE id = ?", [$id]); //Excluir
 
		return ["status" => ($res)?'ok':'erro'];
	}
}

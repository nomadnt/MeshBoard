<?php

class NetworkController extends BaseController {

	protected $layout = 'layouts.default';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		if(Request::ajax()){
			$response = array(
				'draw' => Input::get('draw'),
				'recordsTotal' => Network::count(),
				'recordsFiltered' => 0,
				'data' => array()
			);

			$networks = Network::with(array('nodes' => function($query){
				$query->lastlog();
			}));

			if(Input::get('search.value')){
				$networks->where('name', 'LIKE', '%'.Input::get('search.value').'%');
				$networks->orwhere('location', 'LIKE', '%'.Input::get('search.value').'%');
			}

			$column = Input::get('columns.'.Input::get('order.0.column'));
			if(array_get($column, 'orderable') == 'true'){
				$networks->orderBy(array_get($column, 'data'), Input::get('order.0.dir'));
			}

			$response['recordsFiltered'] = $networks->count();
			$networks->skip(Input::get('start'))->take(Input::get('length'));

			foreach($networks->get() as $network){
				$clients = 0;
				$bytes = array('rx' => 0, 'tx' => 0);
				foreach($network->nodes as $node){
					$clients += array_get($node->last_log, 'network.mesh.clients');
					$bytes['rx'] += array_get($node->last_log, 'network.mesh.statistics.rx_bytes');
					$bytes['tx'] += array_get($node->last_log, 'network.mesh.statistics.tx_bytes');
				}

				$response['data'][] = array(
					'id' => $network->id,
					'name' => $network->name,
					'location' => $network->location,
					'nodes' => array(
						'alives' => $network->nodes()->alive()->count(), 
						'total' => $network->nodes()->count()
					),
					'clients' => $clients,
					'bytes' => array(
						'rx' => Text::bytes($bytes['rx'], NULL, NULL, FALSE),
						'tx' => Text::bytes($bytes['tx'], NULL, NULL, FALSE)
					),
					'actions' => array(
						array(
							'name' => trans('network.nodes'),
							'class' => 'glyphicon-list',
							'onclick' => 'network_nodes('.$network->id.');'
						),
						array(
							'name' => trans('network.edit'),
							'class' => 'glyphicon-pencil',
							'onclick' => 'network_edit('.$network->id.');'
						),
						array(
							'name' => trans('network.delete'),
							'class' => 'glyphicon-trash',
							'onclick' => 'network_delete('.$network->id.');'
						)
					)
				);
			}
			return $response;
		}

		$this->layout->content = View::make('network.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){
		$network = new Network;
		$route = 'network.store';
		$method = 'POST';
		$this->layout->content = View::make('network.create')->with(compact('network', 'route', 'method'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		$network = new Network;
		$data = Input::all();

		if($network->validate($data)){
			$network->create($data);
			return Response::json($network, 201);
		}else{
			return Response::json($network->errors(), 400);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		return Network::with('nodes')->find(1);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		$network = Network::find($id);
		$route = array('network.update', $id);
		$method = 'PUT';
		$this->layout->content = View::make('network.create')->with(compact('network', 'route', 'method'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){
		$network = Network::findOrFail($id);
		$data = Input::all();

		if($network->validate($data)){
			$network->update($data);
			return Response::json($network, 200);
		}else{
			return Response::json($network->errors(), 400);
		}

		//if($validator->passes()){
		//	unset($data['logo']);
		//	$network->update($data);
		//	Input::file('logo')->move(NETWORK . $network->id . '/', 'logo.jpg');
		//return Response::json($network, 200);
		//}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		return Network::destroy($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function postDelete(){
		return Network::destroy(Input::get('id'));
	}
}
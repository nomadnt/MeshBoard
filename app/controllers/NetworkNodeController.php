<?php

class NetworkNodeController extends BaseController {

	protected $layout = 'layouts.default';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id){
		if(Request::ajax()){
			$response = array(
				'draw' => Input::get('draw'),
				'recordsTotal' => Node::count(),
				'recordsFiltered' => 0,
				'data' => array()
			);

			$nodes = Network::find($id)->nodes()->lastlog();

			if(Input::get('search.value')){
				$nodes->where('name', 'LIKE', '%'.Input::get('search.value').'%');
				$nodes->orwhere('mac', 'LIKE', '%'.Input::get('search.mac').'%');
				$nodes->orwhere('location', 'LIKE', '%'.Input::get('search.value').'%');
			}

			$column = Input::get('columns.'.Input::get('order.0.column'));
			if(array_get($column, 'orderable') == 'true'){
				$nodes->orderBy(array_get($column, 'data'), Input::get('order.0.dir'));
			}

			$response['recordsFiltered'] = $nodes->count();
			
			$nodes->skip(Input::get('start'))->take(Input::get('length'));

			foreach($nodes->get() as $node){
				$response['data'][] = array(
					'id' => $node->id,
					'name' => $node->name,
					'mac' => $node->mac,
					'location' => $node->location,
					'is_alive' => $node->isalive,
					'role' => array_get($node->last_log, 'role'),
					'clients' => array_get($node->last_log, 'network.mesh.clients'),
					'bytes' => array(
						'rx' => Text::bytes(array_get($node->last_log, 'network.mesh.statistics.rx_bytes'), NULL, NULL, FALSE),
						'tx' => Text::bytes(array_get($node->last_log, 'network.mesh.statistics.tx_bytes'), NULL, NULL, FALSE)
					),
					'status' => array_get($node->last_log, 'mesh.quality'),
					//'lastlog' => Date::fuzzy_span2($node->checkin).' ago',
					'lastlog' => $node->checkin,
					'actions' => array(
						array(
							'name' => trans('network.edit'),
							'class' => 'glyphicon-pencil',
							'onclick' => 'node_edit('.$node->id.');'
						),
						array(
							'name' => trans('network.delete'),
							'class' => 'glyphicon-trash',
							'onclick' => 'node_delete('.$node->id.');'
						)
					)
				);
			}
			return $response;
		}

		$this->layout->content = View::make('network.node.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(){

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id){
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
		//
	}

}
<?php

namespace controllers\api\meos\v1;

use App;
use Input;
use DB;
use Node;
use NodeLog;
use Cookie;
use Request;
use Response;
use Wireless;

class NodeController extends \BaseController {

	public function show($mac){
		$node = Node::where('mac', '=', $mac)->firstOrFail();
		$data = json_encode(array('config' => $node->config()));
		return Response::make($data)
			->header('Content-Type', 'application/json')
			->header('X-Content-MD5', md5($data));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($mac){
		if(Request::isJson()){
			// Get accept_encoding
			$accept_encoding = array_map('trim', explode(',', Request::header('accept-encoding')));
			$content_encoding = array_map('trim', explode(',', Request::header('content-encoding')));

			$node = Node::where('mac', '=', $mac)->firstOrFail();
			$node->checkin = date('Y-m-d H:i:s');
			$node->save();

			// Ho dovuto fare questa porcata in quanto laravel svuota php://input dopo la chiamata.
			if(in_array('gzip', $content_encoding)){
				$data = json_decode(gzinflate(substr(file_get_contents('php://input'), 10, -8)));
			}else{
				$data = Input::json()->all();
			}

			NodeLog::create(array(
				'node_id' => $node->id,
				'date' => $node->checkin,
				'data' => $data,
				//'public_ip' => Request::getClientIp()
			));

			//$data = json_encode(array('config' => $node->config()));
			$data = json_encode(array('config' => array()));
			$response = Response::make($data)
				->header('Content-Type', 'application/json')
				->header('X-Content-MD5', md5($data));

			if(in_array('gzip', $accept_encoding)){
				$response->header('Content-Encoding', 'gzip');
				$response->setContent(gzencode($data));
			}
			return $response;
		}else{
			App::abort(400);
		}
	}
}

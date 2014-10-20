<?php

class NodeLog extends Eloquent {

	public $timestamps = FALSE;

	protected $fillable = array('node_id', 'date', 'data');
	
	public function node(){
        return $this->belongsTo('Node');
    }

    public function setDataAttribute($data){
    	$this->attributes['data'] = json_encode($data);
    }

    public function getDataAttribute($data){
    	return json_decode($data);
    }
}
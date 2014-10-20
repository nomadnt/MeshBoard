<?php

class Node extends Eloquent {
	
	public function network(){
        return $this->belongsTo('Network');
    }

    public function logs(){
        return $this->hasMany('NodeLog');
    }

    public function scopeAlive($query){
        return $query->where('checkin', '>', DB::raw('NOW() - INTERVAL 15 MINUTE'));
    }

    public function scopeLastLog($query){
        return $query->select('nodes.*', 'node_logs.data')->leftJoin('node_logs', function($join){
            $join->on('nodes.id', '=', 'node_logs.node_id');
            $join->on('nodes.checkin', '=', 'node_logs.date');
        });
    }

    public function getIsAliveAttribute(){
        return (time() - strtotime($this->checkin) <= 900) ? TRUE : FALSE;
    }

    public function getLastLogAttribute(){
        return json_decode($this->data, TRUE);
    }

    public function getHostnameAttribute(){
        return preg_replace('/\s+/', '_', strtolower($this->name));
    }

    public function cfg(){
    	if(is_null($this->cfg)) $this->cfg = '{}';
    	return json_decode($this->cfg);
    }

    public function config(){
        $config['system']['system'][0]['hostname'] = $this->hostname;
        //$config['system']['system'][0]['timezone'] = Kohana::$config->load('timezones.'.$this->network->timezone);
        //$config['system']['system'][0]['password'] = $this->network->password;

        return $config;
    }
}
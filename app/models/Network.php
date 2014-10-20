<?php

class Network extends Eloquent {

	protected $fillable = array('name', 'country', 'timezone', 'location', 'lat', 'lng', 'password', 'channel_2', 'channel_5', 'encryption', 'cfg', 'logo');

    protected $attributes = array(
        'lat' => 0,
        'lng' => 0,
    );

    protected $errors;

    public function validate($data){
        $validator = Validator::make($data, array(
            'name' => 'required', 
            'country' => 'required',
            'timezone' => 'required',
            'location' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'password' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif|max:128',
            'channel_2' => 'required|integer',
            'channel_5' => 'required|integer',
            'encryption' => 'required|in:0,1',
            'cfg.wireless._lap0.disabled' => 'required|in:0,1',
        ), array(
            'cfg.wireless._lap0.ssid.required' => 'The LAN AP SSID field is required.',
            'cfg.wireless._lap0.key.min' => 'The LAN AP Key must be at least :min characters.'
        ));

        $validator->sometimes('cfg.wireless._lap0.ssid', 'required', function($input){
            return !array_get($input->cfg, 'wireless._lap0.disabled');
        });

        $validator->sometimes('cfg.wireless._lap0.key', 'min:8', function($input){
            return !array_get($input->cfg, 'wireless._lap0.disabled');
        });

        if($validator->fails()){
            $this->errors = $validator->messages();
            return FALSE;
        }
        return TRUE;
    }

    public function errors(){
        return $this->errors;
    }

	public function nodes(){
        return $this->hasMany('Node');
    }

    public function getAliveNodesAttribute($value){
        return $this->nodes()->alive()->get();
    }
    
    public function getCfgAttribute($value){
    	return json_decode($value);
    }

    public function setCfgAttribute($value){
    	$this->attributes['cfg'] = json_encode($value);
    }
}
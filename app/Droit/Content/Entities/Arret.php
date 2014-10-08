<?php namespace Droit\Content\Entities;

use Droit\Common\BaseModel as BaseModel;

class Arret extends BaseModel {

	protected $fillable = ['pid','user_id','deleted','reference','pub_date','abstract','pub_text','file','categories','analysis'];
    protected $dates    = ['pub_date','created_at','updated_at'];

    public static $rules = array();
    public static $messages = array();

    public function arrets_categories()
    {
        return $this->belongsToMany('\Droit\Categorie\Entities\Ba_categories', 'arret_ba_categories', 'arret_id', 'ba_categories_id');
    }

    public function arrets_analyses()
    {
        return $this->belongsToMany('\Droit\Content\Entities\Analyse', 'analyses_arret', 'arret_id', 'analyse_id');
    }

}

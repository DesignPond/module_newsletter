<?php namespace Droit\Newsletter\Entities;

class Newsletter_contents extends \Eloquent {

	protected $fillable = ['type_id','titre','contenu','image','arret_id','categorie_id','newsletter_campagne_id','rang'];

    public function campagne(){

        return $this->belongsTo('Droit\Newsletter\Entities\Newsletter_campagnes');
    }

    public function newsletter(){

        return $this->belongsTo('Droit\Newsletter\Entities\Newsletter');
    }

    public function type(){

        return $this->belongsTo('Droit\Newsletter\Entities\Newsletter_types');
    }

    public function arrets(){

        return $this->hasMany('Droit\Arret\Entities\Arret', 'id', 'arret_id');
    }

}
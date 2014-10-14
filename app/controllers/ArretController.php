<?php

use Droit\Content\Repo\ArretInterface;
use Droit\Categorie\Repo\CategorieInterface;

class ArretController extends \BaseController {

    protected $arret;

    protected $categorie;

    public function __construct( ArretInterface $arret, CategorieInterface $categorie )
    {
        $this->arret  = $arret;

        $this->categorie  = $categorie;
    }

	/**
	 * Display a listing of the resource.
	 * GET /arret
	 *
	 * @return Response
	 */

    public function index()
    {
        $arrets = $this->arret->getPaginate(195,15);
        $latest = $arrets->take(5);

        $categories = $this->categorie->getAll(195);

        return View::make('arrets.index')->with(array( 'arrets' => $arrets , 'categories' => $categories , 'latest' => $latest ));
    }

    /**
     * Display a list of arrets
     * GET /arret
     *
     * @return Response
     */

    public function listed()
    {
        $arrets = $this->arret->getAll(195);
        $categories = $this->categorie->getAll(195);

        $required = true;

        return View::make('arrets.list')->with(array( 'arrets' => $arrets , 'categories' => $categories  , 'required' => $required ));
    }

    /**
     * Return one arret by id
     *
     * @return json
     */
    public function show($id)
    {
        $arret = $this->arret->find($id);

        return View::make('newsletter.arret')->with(array( 'arret' => $arret));
    }

    /**
     * Return response arrets
     *
     * @return response
    */
    public function arrets()
    {
        $arrets = $this->arret->getAll(195);

        return Response::json( $arrets, 200 );
    }

    /**
     * Return response arrets prepared for filtered
     *
     * @return response
     */
    public function preparedArrets()
    {
        $arrets = $this->arret->getAll(195);

        $prepared = $arrets->map(function($arret)
        {
                // categories for isotope
                if(!$arret->arrets_categories->isEmpty())
                {
                    foreach($arret->arrets_categories as $cat){
                        $cats[] = 'cat-'.$cat->id;
                    }
                }
                $cats = ( isset($cats) && !empty($cats) ? implode(' ',$cats) : array() );

                $arret->setAttribute('allcats',$cats);
                // format the title with the date
                setlocale(LC_ALL, 'fr_FR');
                $arret->setAttribute('humanTitle',$arret->reference.' du '.$arret->pub_date->formatLocalized('%d %B %Y'));
                $arret->setAttribute('parsedText',$arret->pub_text);

                return $arret;
        });

        return Response::json( $prepared, 200 );
    }

    /**
     * Return response categories
     *
     * @return response
     */
    public function categories()
    {
        $categories = $this->categorie->getAll(195);

        return Response::json( $categories, 200 );
    }

}
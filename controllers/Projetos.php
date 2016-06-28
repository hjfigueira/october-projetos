<?php namespace Hjfigueira\Projetos\Controllers;

use Backend\Classes\Controller;
use Hjfigueira\Projetos\Widgets\ProjectMenu;
use BackendMenu;

class Projetos extends Controller
{
	//Atributos

    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $modulos = [];

    //Métodos

    public function __construct()
    {
        parent::__construct();
        new ProjectMenu($this, 'projectMenu');

        $this->carregarModulos();
    }

    private function carregarModulos()
    {

    	$modulos = \Event::fire('projetos.listarModulos');
    	$this->modulos = call_user_func_array(function($arrayItem){

    		return array_merge($arrayItem);

    	}, $modulos);	
    }

    public function getUrl($link, $model)
    {

    	foreach($model->attributes as $campo => $valor){

    		$link = str_replace(':'.$campo, $valor, $link);

    	}

    	return $link;
    }
}
<?php namespace Hjfigueira\Projetos;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

	public $modulos;



    public function registerNavigation()
    {
        return [
            'projetos' => [
                'label'       => 'Projetos',
                'url'         => \Backend::url('hjfigueira/projetos/projetos'),
                'icon'        => 'icon-rocket',
//                'iconSvg'     => 'plugins/rainlab/user/assets/images/user-icon.svg',
                'permissions' => ['hjfigueira.projetos.*'],
                'order'       => 500,
            ]
        ];
    }

    private function carregarModulos()
    {

//    	$modulos = \Event::fire('projetos.listarModulos');
//    	$this->modulos = call_user_func_array(function($arrayItem){
//
//    		return array_merge($arrayItem);
//
//    	}, $modulos);
    }

    public function getUrl($link, $model)
    {

    	foreach($model->attributes as $campo => $valor){

    		$link = str_replace(':'.$campo, $valor, $link);

    	}

    	return $link;
    }
}

<?php namespace Hjfigueira\Projetos\Widgets;


use Backend\Classes\WidgetBase;
use Hjfigueira\Projetos\Models\Projeto;
use Backend;
use \Redirect;

/**
 * Static page list widget.
 *
 * @package agencia110\pages
 * @author Alexey Bobkov, Samuel Georges
 */
class ProjectMenu extends WidgetBase
{
    private $currentProject;

    public function __construct($controller, $alias)
    {
        $this->alias = $alias;

        parent::__construct($controller, []);
        $this->bindToController();
    }

    /**
     * Renders the widget.
     * @return string
     */
    public function render()
    {
        $this->vars['projectName'] = $this->currentProject->titulo;

        return $this->makePartial('default');
    }

    /**
     * Returns information about this widget, including name and description.
     */
    public function widgetDetails() {}


    public function setProject(Projeto $projeto)
    {
        $this->currentProject = $projeto;
    }

    public function getUrl($link)
    {
        foreach($this->currentProject->attributes as $campo => $valor){
            $link = str_replace(':'.$campo, $valor, $link);
        }

        return Backend::url($link);
    }
}
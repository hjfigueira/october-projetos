<?php namespace Hjfigueira\Projetos\Controllers {

    use Hjfigueira\Projetos\Models\Projeto;
    use Redirect;
    use Backend\Classes\Controller;
    use Hjfigueira\Projetos\Widgets\ProjectMenu;
    use Illuminate\Database\Eloquent\ModelNotFoundException;

    /**
     * Classe para extensão dos subplugins de projetos
     * Class Submodule
     * @package Hjfigueira\Projetos\Classes
     */
    abstract class Submodule extends Controller
    {
        //Props

        /** @var ProjectMenu Instancia do menu */
        public $menuWidget;

        /** @var  Projeto Instancia do projeto atual */
        protected $currentProject;

        /** @var string template usado */
        public $layout = 'submodule';

        //Methods

        public function __construct()
        {
            parent::__construct();

            $this->layoutPath[] = '~/plugins/hjfigueira/projetos/layouts';
            $this->menuWidget   = new ProjectMenu($this, 'projectMenu');
        }

        public function menuRender()
        {
            return $this->menuWidget->render();
        }

        public function index($projectSlug, $mode = null)
        {
            try{
                $this->prepareVars($projectSlug);
                return parent::index($mode);

            }catch(ModelNotFoundException $error)
            {
//                return Redirect::to('404');
            }
        }

        public function create($projectSlug, $mode = null)
        {
            $this->prepareVars($projectSlug);
            return parent::create($mode);
        }

        public function update($projectSlug, $modelId, $mode = null)
        {
            $this->prepareVars($projectSlug);
            return parent::update($modelId, $mode);
        }

        public function preview($projectSlug, $modelId, $mode = null)
        {
            $this->prepareVars($projectSlug);
            return parent::preview($modelId, $mode);
        }

        // Internals

        private function prepareVars($projectSlug)
        {
            $this->currentProject = $this->loadProject($projectSlug);
            $this->menuWidget->setProject($this->currentProject);
        }

        private function loadProject($projectSlug)
        {
            return Projeto::findBySlug($projectSlug);
        }

    }
}

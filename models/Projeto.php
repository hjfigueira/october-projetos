<?php namespace Hjfigueira\Projetos\Models;

use Model;
use \October\Rain\Database\Traits\Validation;
use October\Rain\Database\Traits\Sluggable;

/**
 * Model
 */
class Projeto extends Model
{
    use Validation;
    use Sluggable;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'hjfigueira_projetos_projetos';

    public $hasMany = [
        'bugs' => ['Hjfigueira\Bugs\Models\Bug']
    ];

    public $slugs = [ 'slug'=> 'titulo' ];

    public static function findBySlug($slug)
    {
        return self::where('slug',$slug)->firstOrFail();
    }
}
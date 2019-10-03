<?php

namespace App\Steps\User;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ycs77\LaravelWizard\Step;

class FormationStep extends Step
{
    /**
     * The step slug.
     *
     * @var string
     */
    protected $slug = 'formation';

    public $titre = "Votre dernière formation";

    /**
     * The step show label text.
     *
     * @var string
     */
    protected $label = 'Formation';

    /**
     * The step form view path.
     *
     * @var string
     */
    protected $view = 'steps.user.formation';

    /**
     * Set the step model instance or the relationships instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function setModel(Request $request)
    {
        // $this->model =
    }

    /**
     * Save this step form data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array|null  $data
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\relation|null  $model
     * @return void
     */
    public function saveData(Request $request, $data = null, $model = null)
    {
        $data = Arr::only($data, ['ecole','diplome','domaine_etude','startYear','startEnd','education_description','resultat']);
        DB::table('formations')->insert(
            ['users_id' => Auth::user()->idutilisateurs,
                'ecole'=>$data['ecole'],
                'diplome_obtenu'=>$data['diplome'],
                'domaine_etude'=>$data['domaine_etude'],
                'resultat_obtenu'=>$data['resultat'],
                'annee_debut'=>$data['startYear'],
                'annee_fin'=>$data['startEnd'],
                'description'=>$data['education_description']
            ]
        );
    }

    /**
     * Validation rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'ecole'=>'required'
        ];
    }
}

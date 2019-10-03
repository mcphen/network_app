<?php

namespace App\Steps\User;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ycs77\LaravelWizard\Step;

class ExperienceStep extends Step
{
    /**
     * The step slug.
     *
     * @var string
     */
    protected $slug = 'experience';

    public $titre = "Votre dernier poste occupé";

    /**
     * The step show label text.
     *
     * @var string
     */
    protected $label = 'Experience';

    /**
     * The step form view path.
     *
     * @var string
     */
    protected $view = 'steps.user.experience';

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
        $data = Arr::only($data, ['poste','entreprise','lieu','datedebut','datefin','description']);
        if(!empty($data)){
            DB::table('experiences')->insert(
                ['users_id' => Auth::user()->idutilisateurs,
                    'designation_poste'=>$data['poste'],
                    'entreprise'=>$data['entreprise'],
                    'lieu'=>$data['lieu'],
                    'description'=>$data['description'],
                    'date_debut'=>$data['datedebut'],
                    'date_fin'=>$data['datefin'],

                ]
            );
        }

        DB::table('utilisateurs')
            ->where('idutilisateurs',  Auth::user()->idutilisateurs)
            ->update(['first_connexion' => 1]);
    }

    /**
     * Validation rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [];
    }
}

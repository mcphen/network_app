<?php

namespace App\Steps\User;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ycs77\LaravelWizard\Step;
use App\Users;

class LocationStep extends Step
{
    /**
     * The step slug.
     *
     * @var string
     */
    protected $slug = 'location';

    public $titre = "Où êtes vous actuellement?";

    /**
     * The step show label text.
     *
     * @var string
     */
    protected $label = 'Localisation';

    /**
     * The step form view path.
     *
     * @var string
     */
    protected $view = 'steps.user.location';

    /**
     * Set the step model instance or the relationships instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function setModel(Request $request)
    {
        $this->model = Users::find(1);
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
        $data = Arr::only($data, ['name','pays']);
        DB::table('localisation')->insert(
            ['users_id' => Auth::user()->idutilisateurs,
                'ville'=>$data['name'],
                'pays_id'=>$data['pays']
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
            'name' => 'required',
            'pays' => 'required'
        ];
    }
}

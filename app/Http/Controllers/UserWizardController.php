<?php

namespace App\Http\Controllers;

use App\Steps\User\LocationStep;
use App\Steps\User\FormationStep;
use App\Steps\User\ExperienceStep;
use Ycs77\LaravelWizard\Http\Controllers\WizardController;

class UserWizardController extends WizardController
{
    /**
     * The wizard name.
     *
     * @var string
     */
    protected $wizardName = 'user';

    /**
     * The wizard title.
     *
     * @var string
     */
    protected $wizardTitle = 'Faites vos premiers pas';

    /**
     * The wizard options.
     *
     * Available options reference from Ycs77\LaravelWizard\Wizard::$optionsKeys.
     *
     * @var array
     */
    protected $wizardOptions = [];

    /**
     * The wizard steps instance.
     *
     * @var array
     */
    protected $steps = [
        LocationStep::class,
        FormationStep::class,
        ExperienceStep::class,
    ];
}

<?php
namespace App\Controller;

use Aura\Intl\Exception;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use App\Form\StepForm;

use App\Utils\Mobile_Detect;

class AdminsController extends AppController
{
    public $uses = array('/Entity/AnswerRecord');

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->detector =  new Mobile_Detect;
        $env_suffix = 'pc';
        if ( $this->detector->isMobile() && !$this->detector->isTablet() ) {
            $env_suffix = 'sp';

        }else if( $this->detector->isTablet() ){
            $env_suffix = 'pc';
        }else{
            $env_suffix = 'pc';
        }


        $this->set("is_tablet",false);
        if($this->detector->isTablet()){
            $this->set("is_tablet",true);
        }
        $this->set("env_suffix","_".$env_suffix);
        $this->set("env_mode",$env_suffix);
        $this->viewBuilder()->setLayout("answers_".$env_suffix);

        $session = $this->request->getSession();
        $session_data = $session->read();
        if(empty($session_data['form_meta'])){
            $uid = sha1( uniqid( mt_rand() , true ) );
            $session->write('form_meta.uid' ,$uid);
        }

        $this->set('title','Smart Recruiting');
    }


    public function beforeRender(Event $event) {
        parent::beforeRender($event);
    }


    public function admin(){
        $sims = $this->AnswerRecord->find('all');
        $this->set(array('sims'=> $sims));
        $this->render('/Features/sim');   


    }


}

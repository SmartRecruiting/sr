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

class AnswersController extends AppController
{
    public $min_step = 1;
    public $max_step = 5;
    public $param_key_list = [
        'step1'=>['has_lisence'],
        'step2'=>['work_style','term_wish'],
        'step3'=>['address_prefecture','zip_code','address_city'],
        'step4'=>['name','birthday_year','birthday_month'],
        'step5'=>['tel','email'],
    ];
    public $detector;


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


    public function formApi(){
        $this->autoRender = false ;
        $this->response->type('json');
        $jsonData = array('noresult');

        if(!empty($_REQUEST['m']) && $_REQUEST['m'] == 'zipcode'){
            if(!empty($_REQUEST['s']) && preg_match("/^[0-9]+$/",$_REQUEST['s'])){
                $this->loadModel('Zipcodes');
                $zipcode = $this->Zipcodes->find("all",array('conditions'=>array('zipcode'=>$_REQUEST['s'])))->first() ;
                if($zipcode){
                    $jsonData= array('result'=>$zipcode);

                }
            }
        }else if(!empty($_REQUEST['m']) && $_REQUEST['m'] == 'pref'){
            if(!empty($_REQUEST['s']) && preg_match("/^(北海道|青森県|岩手県|宮城県|秋田県|山形県|福島県|茨城県|栃木県|群馬県|埼玉県|千葉県|東京都|神奈川県|新潟県|富山県|石川県|福井県|山梨県|長野県|岐阜県|静岡県|愛知県|三重県|滋賀県|京都府|大阪府|兵庫県|奈良県|和歌山県|鳥取県|島根県|岡山県|広島県|山口県|徳島県|香川県|愛媛県|高知県|福岡県|佐賀県|長崎県|熊本県|大分県|宮崎県|鹿児島県|沖縄県)$/",$_REQUEST['s'])){
                $this->loadModel('Zipcodes');
                $cities = $this->Zipcodes->find("all",array('conditions'=>array('state'=>$_REQUEST['s']),'group'=>'state , city','order'=>'city')) ;
                if($cities){
                    $jsonData= array('result'=>$cities);

                }
            }
        }else if(!empty($_REQUEST['m']) && $_REQUEST['m'] == 'stepin'){
            if(!empty($_REQUEST['s'])){
                $res = $this->stepIn($_REQUEST['s']);
                if($res){
                    $jsonData= array('result'=>true);

                }
            }
        }
        return  $this->response->withStringBody(json_encode($jsonData));
    }

    public function form(){
        $this->set('bg_image','bg_image');
        $session = $this->request->getSession();;
        $session_data = $session->read();
        $form = new StepForm();
        $this->set('form',$form);
        $this->set('scripts','<script src="/js/form.js"></script>');


        if ($this->request->is('post')) {

            ///($this->request->getData());
            ///var_dump($form->execute($this->request->getData()));
            ///var_dump($form);
            if ($form->execute($this->request->getData())) {
                $this->loadModel('FormAnswers');
                $this->loadModel('AnswerRecords');


                $this->FormAnswers->getConnection()->begin();

                $form_answer = $this->FormAnswers->newEntity();
                try {
                    $save_param = ['uid'=>$session_data['form_meta']['uid']];
                    $form_answer = $this->FormAnswers->patchEntity($form_answer, $save_param);
                    if ($result=$this->FormAnswers->save($form_answer)) {
                        $form_answer_id = $result->id;
                        $reqData = $this->request->getData();
                        foreach($reqData as $k => $value){

                            $save_record = $this->AnswerRecords->newEntity();
                            $save_param = ['form_answer_id'=>$form_answer_id, 'answer_code'=>$k, 'answer_value'=>$value];
                            $save_record = $this->FormAnswers->patchEntity($save_record, $save_param);
                            $result = $this->AnswerRecords->save($save_record);
                            if($result){

                            }else{
                                throw new Exception(Configure::read("M.ERROR.INVALID"));
                            }
                        }

                        // ステータス
                        $save_record = $this->AnswerRecords->newEntity();
                        $save_status = ['form_answer_id'=>$form_answer_id, 'answer_code'=>'status', 'answer_value'=>0];
                        $save_record = $this->FormAnswers->patchEntity($save_record, $save_status);
                        $this->AnswerRecords->save($save_record);

                        // コメント
                        $save_record = $this->AnswerRecords->newEntity();
                        $save_status = ['form_answer_id'=>$form_answer_id, 'answer_code'=>'comment', 'answer_value'=>""];
                        $save_record = $this->FormAnswers->patchEntity($save_record, $save_status);
                        $this->AnswerRecords->save($save_record);

                        // 日時
                        $now = date('Y-m-d H:i:s');
                        $save_record = $this->AnswerRecords->newEntity();
                        $save_status = ['form_answer_id'=>$form_answer_id, 'answer_code'=>'datetime', 'answer_value'=>$now];
                        $save_record = $this->FormAnswers->patchEntity($save_record, $save_status);
                        $this->AnswerRecords->save($save_record);

                        $this->FormAnswers->getConnection()->commit();
                        $this->stepIn('complete');

                        if(!empty($reqData['email'])){
                            mb_language("Japanese");
                            mb_internal_encoding("UTF-8");

                            $email = $reqData['email'];
                            $subject = "Smart Recruiting（非公開求人情報）へのお申し込みを受け付けました"; // 題名
                            $body ='';
                            $body = $reqData['name'].'様

ご入力ありがとうございました。
Smart Recruiting（非公開求人情報）へのお申し込みを受け付けました。
下記の電話番号より速やかにお電話させて頂きます。
（夜間の場合には翌朝以降にご連絡させて頂きます。）

03-3272-0606

=== ご入力頂いた情報 ===
';
                        foreach($reqData as $k => $value){
                            if(!empty($value) && !empty($form->labels[$k])){
                             $body .= $form->labels[$k] . ' : '.$value."\n";
                            }
                        }

$body .='
=====================

何卒よろしくお願い致します。


Smart Recruiting 
contact@smartrecruiting.jp
03-3272-0606'
; // 本文
                            $to = $email;
                            $bcc_to = 'contact@smartrecruiting.jp';
                            $sys_from = 'contact@smartrecruiting.jp';
                            $header = "From: $sys_from\nReply-To: $sys_from\n";

                            $mail_send_res = mb_send_mail($to, $subject, $body, $header);
                            $mail_send_res2 = mb_send_mail($bcc_to, '[管理通知]'.$subject, $body, $header);

                        }

                        $uid = sha1( uniqid( mt_rand() , true ) );
                        $session->write('form_meta.uid' ,$uid);
                        $this->redirect('/complete');
                        return;
                    }


                }catch(Exception $e){
                    $this->FormAnswers->getConnection()->rollback();
                    $this->Flash->error(__('データの送信に失敗しました'));
                }
            }
        }
    }


    public function complete(){
        $this->set('bg_image','bg_image');
        $this->loadModel('FormAnswers');
        $this->loadModel('AnswerRecords');

        $session = $this->request->getSession();
        $session_data = $session->read();

        $this->set('scripts','<script src="/js/complete.js"></script>');
    }


    public function terms(){

    }
    public function privacy(){

    }
    public function company(){

    }


    public function stepIn($step){
        $this->autoRender = false ;

        $session = $this->request->getSession();
        $session_data = $session->read();

        if(!empty($step)){
            $this->loadModel('StepProcessings');
            $save_param = ['uid'=>$session_data['form_meta']['uid']];
            $processing = $this->StepProcessings->find()->where(['uid ' =>$session_data['form_meta']['uid']])->first();
            if(empty($processing)){
                $processing = $this->StepProcessings->newEntity();
            }
            $save_param = ['uid'=>$session_data['form_meta']['uid']];
            $save_param['step_status'] = $step;
            $save_param['modified'] = date("Y-m-d H:i:s");
            $processing = $this->StepProcessings->patchEntity($processing, $save_param);

            if ($result=$this->StepProcessings->save($processing)) {
                return true;
            }
        }
        return false;
    }

    private function checkParameterHaving(){
        $session = $this->request->getSession();
        $session_data = $session->read();
        if(empty($session_data['AnswerForm'])){
            return false;
        }
        $checkKeys = [];
        foreach($this->param_key_list as $step => $step_keys) {
            foreach($step_keys as $idx => $step_key) {
                $checkKeys[] = $step_key;
            }
        }
        $answer_form_keys = array_keys($session_data['AnswerForm']);

        sort($checkKeys);
        sort($answer_form_keys);

        //pr($checkKeys);
        //pr($answer_form_keys);
        if($checkKeys == $answer_form_keys) {
            return true;
        }
        return false;
    }

}

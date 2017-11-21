

<?php
$fields = $form->getFields();
///var_dump($fields);
echo '<script>
var q_fields = '.json_encode($fields).';

</script>';
?>

<div id="main_container_content"  class="step_1">

    <?= $this->Flash->render() ?>

    <?php echo $this->Form->create($form , array('type'=>'post', 'id'=>'form1')); ?>
    <div class="form_steps form_step_1">
        <div id="main_container_stepper">
            <img src="/img/shared/banner_step_1<?php echo $env_suffix?>.png">
        </div>

        <div class="form_q_has_license">

            <div class="question_header">
                <p>
                    <span class="q_icon_circle_red"><span class="q_icon_required">必須</span></span>
                    <span class="q_text">どの資格をお持ちですか？</span>
                    <span class="q_text_helper">（複数選択可）</span>
                </p>
            </div>

            <div class="forms">
                <div class="selection">

                    <?php

                    echo $this->Form->input('has_license', array('type' => 'hidden','name' => 'has_license', 'default' => 0,));
                    echo $this -> Form -> control('has_license', ['hiddenField' => false,"label"=>"訪問看護師","class"=>"has_license", "type"=>"checkbox", "id" => "has_license_1", "value" => "看護師", "required"=>true ] );
                    echo $this -> Form -> control('has_license', ['hiddenField' => false, "label"=>"准看護師","class"=>"has_license", "type"=>"checkbox", "id" => "has_license_2", "value" => "准看護師", "required"=>true ] );
                    echo $this -> Form -> control('has_license', ['hiddenField' => false, "label"=>"保健師","class"=>"has_license", "type"=>"checkbox", "id" => "has_license_3", "value" => "保健師", "required"=>true ] );
                   // echo $this -> Form -> control('has_license', ['hiddenField' => false, "label"=>"その他","class"=>"has_license", "type"=>"checkbox", "id" => "has_license_4", "value" => "その他", "required"=>true ] );
                    echo $this -> Form -> control('has_license', ['hiddenField' => false, "label"=>"助産師","class"=>"has_license", "type"=>"checkbox", "id" => "has_license_5", "value" => "助産師", "required"=>true] );



                    ?>
                </div>
            </div>

            <div class="error_block hidden">
                <p>保有資格を１つ以上ご選択ください</p>
            </div>
        </div>

    </div>



    <div class="form_steps hidden form_step_2" >
        <div id="main_container_stepper">
            <img src="/img/shared/banner_step_2<?php echo $env_suffix?>.png">
        </div>

        <div class="step_header">
            <h2>ご希望の働き方・転職の希望時期を教えてください</h2>
        </div>

        <div class="form_q_work_style">
            <div class="question_header">
                <p>
                    <span class="q_icon_circle_red"><span class="q_icon_required">必須</span></span>
                    <span class="q_text">働き方</span>
                    <span class="q_text_helper">（１つ選択）</span>
                </p>
            </div>

            <div class="forms">
                <div class="selection">

                    <?php
                    echo $this->Form->control('work_style', ['label'=>false, 'type'=>'radio', 'escape'=>false,
                            'options'=>[
                                '常勤（日勤のみ）'=>'常勤<br><i class="min">（日勤のみ）</i>',
                                '常勤（夜勤含む）'=>'常勤<br><i class="min">（夜勤含む）</i>',
                                'こだわらない'=>'こだわらない',
                                '非常勤'=>'非常勤',
                                '派遣'=>'派遣'
                            ] ]
                    );
                    ?>

                </div>
            </div>

            <div class="error_block hidden">
                <p>就業形態を１つご選択ください</p>
            </div>

        </div>


        <div class="form_q_term_wish">
            <div class="question_header">
                <p>
                    <span class="q_icon_circle_blue"><span class="q_icon_nonrequired">任意</span></span>
                    <span class="q_text">希望時期</span>
                    <span class="q_text_helper">（１つ選択）</span>
                </p>
            </div>

            <div class="forms">
                <div class="selection">

                    <?php
                    echo $this->Form->control('term_wish', ['label'=>false, 'type'=>'radio', 'escape'=>false,
                        'options'=>[
                            '3か月以内'=>'3か月以内',
                            '6か月以内'=>'6か月以内',
                            '9か月以内'=>'9か月以内',
                            '12か月以内'=>'12か月以内',
                            '良い求人次第いつでも'=>'<i class="min">良い求人次第</i><br>いつでも',
                            ] ]
                    );

                    ?>

                </div>
            </div>


        </div>

    </div>


    <div class="form_steps hidden form_step_3">
        <div id="main_container_stepper">
            <img src="/img/shared/banner_step_3<?php echo $env_suffix?>.png">
        </div>

        <div class="step_header">
            <h2>お住まいはどちらですか？</h2>
        </div>

        <div class="form_q_zip_code">

            <div class="question_header">
                <p>
                    <span class="q_icon_circle_blue"><span class="q_icon_nonrequired">任意</span></span>
                    <span class="q_text">郵便番号</span>
                    <span class="q_text_helper">（住所自動入力）</span>
                </p>
            </div>

            <div class="forms">

                    <?php
                    echo $this->Form->control('zip_code',['label'=>false,'type'=>'text','placeholder'=>'例 : 0000000',  'required'=>false]  );

                    ?>

            </div>

            <div class="error_block hidden">
                <p>該当する郵便番号が見つかりませんでした</p>
            </div>
        </div>


        <div class="form_q_address_prefecture">

            <div class="question_header">
                <p>
                    <span class="q_icon_circle_red"><span class="q_icon_required">必須</span></span>
                    <span class="q_text">都道府県</span>
                </p>
            </div>

            <div class="forms">

                <?php
                echo $this->Form->control('address_prefecture' ,['label'=>false, 'type'=>'select', 'options'=>[''=>'選択してください','北海道'=> '北海道', '青森県'=> '青森県', '岩手県'=> '岩手県', '宮城県'=> '宮城県', '秋田県'=> '秋田県', '山形県'=> '山形県', '福島県'=> '福島県', '茨城県'=> '茨城県', '栃木県'=> '栃木県', '群馬県'=> '群馬県', '埼玉県'=> '埼玉県', '千葉県'=> '千葉県', '東京都'=> '東京都', '神奈川県'=> '神奈川県', '新潟県'=> '新潟県', '富山県'=> '富山県', '石川県'=> '石川県', '福井県'=> '福井県', '山梨県'=> '山梨県', '長野県'=> '長野県', '岐阜県'=> '岐阜県', '静岡県'=> '静岡県', '愛知県'=> '愛知県', '三重県'=> '三重県', '滋賀県'=> '滋賀県', '京都府'=> '京都府', '大阪府'=> '大阪府', '兵庫県'=> '兵庫県', '奈良県'=> '奈良県', '和歌山県'=> '和歌山県', '鳥取県'=> '鳥取県', '島根県'=> '島根県', '岡山県'=> '岡山県', '広島県'=> '広島県', '山口県'=> '山口県', '徳島県'=> '徳島県', '香川県'=> '香川県', '愛媛県'=> '愛媛県', '高知県'=> '高知県', '福岡県'=> '福岡県', '佐賀県'=> '佐賀県', '長崎県'=> '長崎県', '熊本県'=> '熊本県', '大分県'=> '大分県', '宮崎県'=> '宮崎県', '鹿児島県'=> '鹿児島県', '沖縄県'=>'沖縄県'] ]);
                ?>

            </div>

            <div class="error_block hidden">
                <p>都道府県を選択してください</p>
            </div>
        </div>



        <div class="form_q_address_city">

            <div class="question_header">
                <p>
                    <span class="q_icon_circle_red"><span class="q_icon_required">必須</span></span>
                    <span class="q_text">市区町村</span>
                </p>
            </div>

            <div class="forms">

                <?php
                echo $this->Form->control('address_city',['label'=>false,'type'=>'select', 'options'=>[''=>'選択してください',] ]  );                ?>

            </div>

            <div class="error_block hidden">
                <p>市区町村を選択してください</p>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

    <div class="form_steps hidden form_step_4">
        <div id="main_container_stepper">
            <img src="/img/shared/banner_step_4<?php echo $env_suffix?>.png">
        </div>

        <div class="step_header">
            <h2>お名前・生年月を入力してください<br class="sp_show"><span class="min">（公開されません）</span></h2>
        </div>

        <div class="form_q_name">

            <div class="question_header">
                <p>
                    <span class="q_icon_circle_red"><span class="q_icon_required">必須</span></span>
                    <span class="q_text">お名前</span>
                </p>
            </div>

            <div class="forms">

                <?php
                echo $this->Form->control('name',['label'=>false,'type'=>'text','placeholder'=>'例 : 山田花子',  'required'=>true]  );
                ?>

            </div>

            <div class="error_block hidden">
                <p>お名前を入力してください</p>
            </div>
        </div>

        <div class="form_q_birthday">


            <div class="question_header">
                <p>
                    <span class="q_icon_circle_red"><span class="q_icon_required">必須</span></span>
                    <span class="q_text">生年月</span>
                </p>
            </div>

            <div class="form_q_birthday_year">

                <div class="forms">

                    <?php
                    $options = array(''=>'生まれ年');
                    for($i=1937; $i<=(date("Y")-18);$i++){
                        $showa = $i-(1989-64);
                        $heisei = $i-(1988);
                        $nen = '昭和'.$showa.'年';;
                        if($i==1989){
                            $nen = '昭和'.$showa.'・平成1年';
                        }else if($i>1989){
                            $nen = '平成'.$heisei.'年';
                        }
                        $options[$i] = $i."年/".$nen;
                    }
                    echo $this->Form->control('birthday_year' ,['label'=>false, 'type'=>'select', 'options'=>$options ]);

                    ?>

                </div>


            </div>



            <div class="form_q_birthday_month">


                <div class="forms">

                    <?php
                    $options = ['選択してください'];
                    for($i=1; $i<=12;$i++){
                        $options[$i] = sprintf("%02d月",$i);
                    }
                    echo $this->Form->control('birthday_month',['label'=>false,'type'=>'select', 'options'=>$options]  );
                    ?>

                </div>

            </div>

            <div class="clearfix"></div>

            <div class="error_block hidden">
                <p>生年月を選択してください</p>
            </div>
        </div>


    </div>



    <div class="form_steps hidden form_step_5">
        <div id="main_container_stepper">
            <img src="/img/shared/banner_step_5<?php echo $env_suffix?>.png">
        </div>

        <div class="step_header">
            <h2>ご連絡先を入力してください<br class="sp_show"> <span class="min">（公開されません）</span></h2>
        </div>

        <div class="form_q_tel">

            <div class="question_header">
                <p>
                    <span class="q_icon_circle_red"><span class="q_icon_required">必須</span></span>
                    <span class="q_text">電話番号</span>
                </p>
            </div>

            <div class="forms">

                <?php
                echo $this->Form->control('tel',['label'=>false,'type'=>'text','placeholder'=>'例 : 09012341234',  'required'=>true]  );
                ?>

            </div>

            <div class="error_block hidden">
                <p>電話番号を入力してください</p>
            </div>
        </div>
        <div class="form_q_email">

            <div class="question_header">
                <p>
                    <span class="q_icon_circle_blue"><span class="q_icon_nonrequired">任意</span></span>
                    <span class="q_text">メールアドレス</span>
                </p>
            </div>

            <div class="forms">

                <?php
                echo $this->Form->control('email',['label'=>false,'type'=>'text','placeholder'=>'例 : abc@abc.ne.jp',  'required'=>true]  );
                ?>

            </div>

            <div class="error_block hidden">
                <p>メールアドレスを正しく入力してください</p>
            </div>
        </div>



    </div>

    <div class="form_buttons">
        <a href="javascript:void(0);" id="bt_back" class="hidden" ><img src="/img/shared/bt_back<?php echo $env_suffix?>.png"></a>

        <a href="javascript:void(0);" id="bt_next" ><img src="/img/shared/bt_next.png"></a>

        <div class="clearfix"></div>
    </div>

<?php  echo $this->Form->end(); ?>

</div>

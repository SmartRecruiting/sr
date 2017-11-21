
<div id="main_container_content">

    <?= $this->Flash->render() ?>

    <div class="complete">

        <div class="step_header">
            <h2>ご入力ありがとうございました。<br>
            Smart Recruitingにご登録いただき、<br>
            誠にありがとうございます。</h2>
        </div>

        <div class="complete_message">
            <div class="white_box">
                <p>下記の電話番号よりお電話差し上げます。</p>
                <div class="blue_box">
                    <p>03-3272-0606</p>
                </div>
                <p>専任担当者の携帯電話より直接お電話<br>
                    差し上げる場合もございますのでご了承ください。</p>
            </div>
        </div>

        <div class="mgt20 text-center <?php if($is_tablet){ } else {echo 'sp_show';} ?>">
            <a href="javascript:void(0);" id="bt_line"><img src="/img/shared/bt_line.png"> </a>
        </div>

        <div class="mg20 text-center">
            <a href="/form"><img src="/img/shared/bt_back_top.png"> </a>
        </div>
    </div>

</div>

<div id="line_modal" class="<?php if($is_tablet){ } else {echo 'sp_show';} ?>">
    <div id="line_modal_close">
        <a href="javascript:void(0);" >x</a>
    </div>
    <div id="line_modal_wrapper">
        <h2><img src="/img/shared/line_modal_title_1.png"></h2>
        <div class="line_modal_contents">
            <div>
                <p>LINEアプリがインストールされた端末で<br>
                    <span>ID検索</span>するか、<span>友だち追加</span>をクリック、<br>
                    または<span>QRコード</span>を読み取ります。</p>
            </div>
            <div class="line_modal_content_box">
                <div class="content_header">
                    ID
                </div>
                <div class="content_body">
                    @uvt6010l
                </div>
            </div>
            <div class="line_modal_content_box">
                <div class="content_header">
                    友達追加
                </div>
                <div class="content_body">
                    <a href="http://line.me/ti/p/%40uvt6010l"><img src="/img/shared/bt_line_friend.png"></a>
                </div>
            </div>
            <div class="line_modal_content_box">
                <div class="content_header">
                    QRコード
                </div>
                <div class="content_body">
                    <img src="/img/shared/line_qr.png">
                </div>
            </div>

            <div class="text-center mg20">
                <img src="/img/shared/arrow_down.png">

                <p>LINEが起動するので、[追加]をタップします。</p>
            </div>

            <div class="text-center">
                <img src="/img/shared/line_modal_iphone_1.png">

            </div>
            <div class="pd20"></div>
        </div>
        <h2><img src="/img/shared/line_modal_title_2.png"></h2>
        <div class="line_modal_contents">
            <div>
                <p>LINEトークから質問ができます！<br>
                    後日、Smart Recruiting担当者が回答します。</p>
            </div>

            <div class="text-center">
                <img src="/img/shared/line_modal_iphone_2.png">

            </div>

            <div class="line_modal_footer">
                <p>※メールとLINEは、返信までに少しお時間をいただくことがあります。すぐにでも聞きたい！そんな方はお電話（03-3272-0606）もお気軽にどうぞ。</p>
                <p>※質問メールへは必ず返信しますが、パソコンメールアドレスから返信しますので、ドメイン指定されている方は「@smartrecruiting.jp」を受信できるように設定をお願いします！</p>

            </div>

            </div>
    </div>

</div>

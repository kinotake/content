<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body>
    <div class="header">
        <h1 class="header_text">お問い合わせフォーム</h1>
    </div>
    <div class="main_content">
        <p class="sentence">こちらは○○に対するお問い合わせフォームです。</p>
        <form action="/confirm" method="POST">
        @csrf
            <div class="contact-form__inner">
                <div class="name_group">
                    <label class="name_label" for="name">氏名<span class="contact-form_required">必須</span></label>
                    <input class="contact_form_input_name" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="山田 太郎">
                </div>
                <div class="contact-form__error-message">
                    @if ($errors->has('name'))
                        <p class="error_message_name">{{$errors->first('name')}}</p>
                    @endif
                </div>
                <div class="mail_group">
                    <label class="mail_label" for="email">メールアドレス<span class="contact-form_required">必須</span></label>
                    <input class="contact_form_input_mail" type="email" name="email" id="email" value="{{ old('email') }}"placeholder="mail@example.com">
                </div>
                <div class="contact-form__error-message">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="service_group">
                    <label class="service_label">サービス<span class="contact-form_required">必須</span></label>
                    <select class="service_select" name="service" id="service" id="selectBox" onchange="showContent()">
                        @if (@isset($old_service))
                            @if($old_service == "レンタルサーバー")
                                <option value="レンタルサーバー" selected>レンタルサーバー</option>
                                <option value="VPS">VPS</option>
                                <option value="ゲームサーバー">ゲームサーバー</option>
                            @elseif($old_service == "VPS")
                                <option value="レンタルサーバー">レンタルサーバー</option>
                                <option value="VPS" selected>VPS</option>
                                <option value="ゲームサーバー">ゲームサーバー</option>
                            @elseif($old_service == "ゲームサーバー")
                                <option value="レンタルサーバー">レンタルサーバー</option>
                                <option value="VPS">VPS</option>
                                <option value="ゲームサーバー" selected>ゲームサーバー</option>
                            @endif
                        @else
                            <option value="レンタルサーバー">レンタルサーバー</option>
                            <option value="VPS">VPS</option>
                            <option value="ゲームサーバー">ゲームサーバー</option>
                        @endif
                    </select>
                </div>
                <div class="category_group">
                    <div class="category_inputs" id="rental_content">
                        <label class="category_label" for="category">カテゴリー<span class="contact-form_required">必須</span></label>
                        <label class="category_input_group">
                            <input class="category_input_first" name="category" type="radio" id="category" value="料金について">
                            <span class="category_input">料金について</span>
                        </label></br>
                        <label class="category_input_group">
                            <input class="category_input_second" name="category" type="radio" id="category" value="ドメインについて">
                            <span class="category_input">ドメインについて</span>
                        </label></br>
                        <label class="category_input_group">
                            <input class="category_input_third" name="category" type="radio" id="category" value="WordPressについて">
                            <span class="category_input">WordPressについて</span>
                        </label>
                    </div>
                    <div class="category_inputs"  id="vps_content" style="display:none;">
                        <label class="category_label" for="category">カテゴリー<span class="contact-form_required">必須</span></label>
                        <label class="category_input_group">
                            <input class="category_input_first" name="category" type="radio" id="category" value="データベースについて">
                            <span class="category_input">データベースについて</span>
                        </label></br>
                        <label class="category_input_group">
                            <input class="category_input_second" name="category" type="radio" id="category" value="WAFについて">
                            <span class="category_input">WAFについて</span>
                        </label></br>
                        <label class="category_input_group">
                            <input class="category_input_third" name="category" type="radio" id="category" value="オブジェクトストレージについて">
                            <span class="category_input">オブジェクトストレージについて</span>
                        </label>
                    </div>
                    <div class="category_inputs" id="game_content" style="display:none;">
                        <label class="category_label" for="category">カテゴリー<span class="contact-form_required">必須</span></label>
                        <label class="category_input_group">
                            <input class="category_input_first" name="category" type="radio" id="category" value="使い方について">
                            <span class="category_input">使い方について</span>
                        </label></br>
                        <label class="category_input_group">
                            <input class="category_input_second" name="category" type="radio" id="category" value="テンプレートについて">
                            <span class="category_input">テンプレートについて</span>
                        </label></br>
                        <label class="category_input_group">
                            <input class="category_input_third" name="category" type="radio" id="category" value="バックアップについて">
                            <span class="category_input">バックアップについて</span>
                        </label>
                    </div>
                    <div class="contact-form__error-message">
                    @error('category')
                        {{ $message }}
                    @enderror
                    </div>
                </div>
                <div class="plan_group">
                    <div class="plan_checkboxes" id="rental_plan_content">
                        <div>
                            <label class="plan_label" for="plan">プラン</label>
                            <input type="checkbox" id="plan" value="12ヶ月" name="checkboxes[]" class="plan_input_first"><label for="scales">12ヶ月</label>
                        </div>
                        <div>
                            <input type="checkbox" id="plan" value="24ヶ月" name="checkboxes[]" class="plan_input_second"><label for="scales">24ヶ月</label>
                        </div>
                        <div>
                            <input type="checkbox" id="plan" value="36ヶ月" name="checkboxes[]" class="plan_input_third"><label for="scales">36ヶ月</label>
                        </div>
                    </div>
                    <div class="plan_checkboxes" id="vps_plan_content" style="display:none;">
                        <div>
                            <label class="plan_label" for="plan">プラン</label>
                            <input type="checkbox" id="plan" value="2GB" name="checkboxes[]" class="plan_input_first"><label for="scales">2GB</label>
                        </div>
                        <div>
                            <input type="checkbox" id="plan" value="4GB" name="checkboxes[]" class="plan_input_second"><label for="scales">4GB</label>
                        </div>
                        <div>
                            <input type="checkbox" id="plan" value="8GB" name="checkboxes[]" class="plan_input_third"><label for="scales">8GB</label>
                        </div>
                    </div>
                    <div class="plan_checkboxes" id="game_plan_content" style="display:none;">
                        <div>
                            <label class="plan_label" for="plan">プラン</label>
                            <input type="checkbox" id="plan" value="4人以下" name="checkboxes[]" class="plan_input_first"><label for="scales">4人以下</label>
                        </div>
                        <div>
                            <input type="checkbox" id="plan" value="5～10人以下" name="checkboxes[]" class="plan_input_second"><label for="scales">5～10人以下</label>
                        </div>
                        <div>
                            <input type="checkbox" id="plan" value="11人以上" name="checkboxes[]" class="plan_input_third"><label for="scales">11人以上</label>
                        </div>
                    </div>
                </div>
                <div class="text_group">
                    <label class="text_label" for="text">お問い合わせ内容<span class="contact-form_required">必須</span></label>
                    <div>
                        <textarea name="text" rows="10" cols="80" placeholder="お問い合わせ内容をご記入ください" name="text" id="text">{{ old('text') }}</textarea>
                    </div>
                </div>
                <div class="contact-form__error-message">
                    @if ($errors->has('text'))
                        <p class="error_message_text">{{$errors->first('text')}}</p>
                    @endif
                </div>
            </div>
            <div class="btn_content">
                <input class="contact_form_btn" type="submit" value="確認画面にすすむ">
            </div>
        </form>
    </div>
    <script>
        function showContent() {

        var selectedValue = document.getElementById("service").value;

        if (selectedValue=="レンタルサーバー")
        {

            var rental_div = document.getElementById('vps_content');
            rental_div.style.display = 'none';

            var rental_div = document.getElementById('vps_plan_content');
            rental_div.style.display = 'none';

            var rental_div = document.getElementById('game_content');
            rental_div.style.display = 'none';

            var rental_div = document.getElementById('game_plan_content');
            rental_div.style.display = 'none';

            var div = document.getElementById('rental_content');
            div.style.display = 'block';

            var div = document.getElementById('rental_plan_content');
            div.style.display = 'block';
        }
        if (selectedValue=="VPS") {

            var rental_div = document.getElementById('rental_content');
            rental_div.style.display = 'none';

            var div = document.getElementById('rental_plan_content');
            div.style.display = 'none';

            var rental_div = document.getElementById('game_content');
            rental_div.style.display = 'none';

            var rental_div = document.getElementById('game_plan_content');
            rental_div.style.display = 'none';

            var div = document.getElementById('vps_content');
            div.style.display = 'block';

            var rental_div = document.getElementById('vps_plan_content');
            rental_div.style.display = 'block';
        }
        if (selectedValue=="ゲームサーバー") {

            var rental_div = document.getElementById('rental_content');
            rental_div.style.display = 'none';

            var div = document.getElementById('rental_plan_content');
            div.style.display = 'none';

            var rental_div = document.getElementById('vps_content');
            rental_div.style.display = 'none';

            var rental_div = document.getElementById('vps_plan_content');
            rental_div.style.display = 'none';

            var div = document.getElementById('game_content');
            div.style.display = 'block';

            var rental_div = document.getElementById('game_plan_content');
            rental_div.style.display = 'block';
        }
        }
    </script>
</body>
</html>
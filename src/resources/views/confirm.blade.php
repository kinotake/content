<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/check.css') }}">
</head>
<body>
    <div class="header">
        <h1 class="header_text">お問い合わせフォーム</h1>
    </div>
    <p class="sentence">入力内容にお間違いないかご確認ください。</p>
    <form action="/thanks" method="post">
    @csrf
        @foreach ($input_datas as $input_data)
            <table class="contact-form__inner">
                <tr class="confirm-form_row">
                    <th class="confirm-form_label">氏名</th>
                    <td class="confirm-form_data">{{$input_data['name']}}</td>
                    <input type="hidden" name="name" value={{$input_data['name']}} id={{$input_data['name']}}>
                </tr>
                <tr class="confirm-form_row">
                    <th class="confirm-form_label">メールアドレス</th>
                    <td class="confirm-form_data">{{$input_data['email']}}</td>
                    <input type="hidden" name="email" value={{$input_data['email']}} id={{$input_data['email']}}>
                </tr>
                <tr class="confirm-form_row">
                    <th class="confirm-form_label">サービス</th>
                    <td class="confirm-form_data">{{$input_data['service']}}</td>
                    <input type="hidden" name="service" value={{$input_data['service']}} id={{$input_data['service']}}>
                </tr>
                <tr class="confirm-form_row">
                    <th class="confirm-form_label">カテゴリー</th>
                    <td class="confirm-form_data">{{$input_data['category']}}</td>
                </tr>
                <tr class="confirm-form_row">
                    <th class="confirm-form_label">プラン</th>
                    <td class="confirm-form_data">
                        @foreach ($plans as $plan)
                            {{$plan}}
                            @if ($count >1)
                            /
                            @endif
                        @endforeach
                    </td>
                </tr>
                <tr class="confirm-form_row">
                    <th class="confirm-form_label">お問い合わせ内容</th>
                    <td class="confirm-form_data">{{$input_data['text']}}</td>
                    <input type="hidden" name="text" value={{$input_data['text']}} id={{$input_data['text']}}>
                </tr>
            </table>
        @endforeach
        <div class="btn_contents">
            <button type="submit" name='back' value="back" class="form_btn_back">入力画面に戻る</button>
            <input class="form_btn_submit" type="submit" value="送信する" name="send">
        </div>
    </form>
</body>
</html>
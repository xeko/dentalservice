(function () {
    // ビジュアルエディタにプルダウンメニューの追加
    tinymce.PluginManager.add('my_mce_button', function (editor, url) {
        editor.addButton('my_mce_button', {
            text: 'Shortcode',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: 'Tab of Content',
                    onclick: function () {
                        editor.insertContent('[Tabs row=2]\n\
    <p style="padding-left: 30px;">[Tab title="Title..."]Content...[/Tab]</p>\n\
[/Tabs]');
                    }
                },
                {
                    text: 'Youtube動画',
                    onclick: function () {
                        editor.insertContent('<div class="ytube">ここにYoutubeのコードを入力してください</div>');
                    }
                },
                {
                    text: '関連記事カードリンク',
                    onclick: function () {
                        editor.insertContent('[clink url="ここに表示させたい記事URL"]');
                    }
                },
                {
                    text: 'レイアウト2c',
                    onclick: function () {
                        editor.insertContent('<div class="post_row"><div class="post_col post_col-2">ここに左カラムに表示させたい任意のテキストや画像タグを入力します。</div><div class="post_col post_col-2">ここに右カラムに表示させたい任意のテキストや画像タグを入力します。</div></div>');
                    }
                },
                {
                    text: 'レイアウト3c',
                    onclick: function () {
                        editor.insertContent('<div class="post_row"><div class="post_col post_col-3">ここに左カラムに表示させたい任意のテキストや画像タグを入力します。</div><div class="post_col post_col-3">ここに中央カラムに表示させたい任意のテキストや画像タグを入力します。</div><div class="post_col post_col-3">ここに右カラムに表示させたい任意のテキストや画像タグを入力してください。</div></div>');
                    }
                },
                {
                    text: 'H3見出しa',
                    onclick: function () {
                        editor.insertContent('<h3 class="style3a">H3見出しa</h3>');
                    }
                },
                {
                    text: 'H3見出しb',
                    onclick: function () {
                        editor.insertContent('<h3 class="style3b">H3見出しb</h3>');
                    }
                },
                {
                    text: 'H4見出しa',
                    onclick: function () {
                        editor.insertContent('<h4 class="style4a">H4見出しa</h4>');
                    }
                },
                {
                    text: 'H4見出しb',
                    onclick: function () {
                        editor.insertContent('<h4 class="style4b">H4見出しb</h4>');
                    }
                },
                {
                    text: 'H5見出しa',
                    onclick: function () {
                        editor.insertContent('<h5 class="style5a">H5見出しa</h5>');
                    }
                },
                {
                    text: 'H5見出しb',
                    onclick: function () {
                        editor.insertContent('<h5 class="style5b">H5見出しb</h5>');
                    }
                },
                {
                    text: '囲み枠a',
                    onclick: function () {
                        editor.insertContent('<p class="well">囲み枠a</p>');
                    }
                },
                {
                    text: '囲み枠b',
                    onclick: function () {
                        editor.insertContent('<p class="well2">囲み枠b</p>');
                    }
                },
                {
                    text: '囲み枠c',
                    onclick: function () {
                        editor.insertContent('<p class="wellc">囲み枠c</p>');
                    }
                },
                {
                    text: 'フラットボタン',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button">フラットボタン</a>');
                    }
                },
                {
                    text: 'フラットボタン-L',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button sz_l">フラットボタン-L</a>');
                    }
                },
                {
                    text: 'フラットボタン-S',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button sz_s">フラットボタン-S</a>');
                    }
                },
                {
                    text: 'フラットボタン-blue',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button blue">フラットボタン-blue</a>');
                    }
                },
                {
                    text: 'フラットボタン-green',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button green">フラットボタン-green</a>');
                    }
                },
                {
                    text: 'フラットボタン-red',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button red">フラットボタン-red</a>');
                    }
                },
                {
                    text: 'フラットボタン-yellow',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button yellow">フラットボタン-yellow</a>');
                    }
                },
                {
                    text: '角丸ボタン',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button rounded">角丸ボタン</a>');
                    }
                },
                {
                    text: '角丸ボタン-L',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button rounded sz_l">角丸ボタン-L</a>');
                    }
                },
                {
                    text: '角丸ボタン-S',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button rounded sz_s">角丸ボタン-S</a>');
                    }
                },
                {
                    text: 'ラウンドボタン',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button pill">ラウンドボタン</a>');
                    }
                },
                {
                    text: 'ラウンドボタン-L',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button pill sz_l">ラウンドボタン-L</a>');
                    }
                },
                {
                    text: 'ラウンドボタン-S',
                    onclick: function () {
                        editor.insertContent('<a href="#" class="q_button pill sz_s">ラウンドボタン-S</a>');
                    }
                },
                {
                    text: '広告',
                    onclick: function () {
                        editor.insertContent('[s_ad]');
                    }
                }
            ]
        });
    });
    // テキストエディタにボタンを追加
    // QTags.addButton('ID', 'エディタのボタンに表示する名前', '開始タグ', '終了タグ'); IDは重複しなければ何でも大丈夫です。終了タグが必要ない場合は空欄にしてください。
//    QTags.addButton('ytube', 'Youtube動画', '<div class="ytube">ここにYoutubeのコードを入力してください</div>' + '\n' + '\n', '');
//    QTags.addButton('relatedcardlink', '関連記事カードリンク', '[clink url="ここに表示させたい記事URL"]' + '\n' + '\n', '');
//    QTags.addButton('post_col-2', 'レイアウト2c', '<div class="post_row"><div class="post_col post_col-2">ここに左カラムに表示させたい任意のテキストや画像タグを入力します。</div><div class="post_col post_col-2">ここに右カラムに表示させたい任意のテキストや画像タグを入力します。</div></div>' + '\n' + '\n', '');
//    QTags.addButton('post_col-3', 'レイアウト3c', '<div class="post_row"><div class="post_col post_col-3">ここに左カラムに表示させたい任意のテキストや画像タグを入力します。</div><div class="post_col post_col-3">ここに中央カラムに表示させたい任意のテキストや画像タグを入力します。</div><div class="post_col post_col-3">ここに右カラムに表示させたい任意のテキストや画像タグを入力してください。</div></div>' + '\n' + '\n', '');
//    QTags.addButton('style3a', 'H3見出しa', '<h3 class="style3a">H3見出しa</h3>' + '\n' + '\n', '');
//    QTags.addButton('style3b', 'H3見出しb', '<h3 class="style3b">H3見出しb</h3>' + '\n' + '\n', '');
//    QTags.addButton('style4a', 'H4見出しa', '<h3 class="style4a">H4見出しa</h3>' + '\n' + '\n', '');
//    QTags.addButton('style4b', 'H4見出しb', '<h3 class="style4b">H4見出しb</h3>' + '\n' + '\n', '');
//    QTags.addButton('style5a', 'H5見出しa', '<h3 class="style5a">H5見出しa</h3>' + '\n' + '\n', '');
//    QTags.addButton('style5b', 'H5見出しb', '<h3 class="style5b">H5見出しb</h3>' + '\n' + '\n', '');
//    QTags.addButton('well', '囲み枠a', '<p class="well">囲み枠a</p>' + '\n' + '\n', '');
//    QTags.addButton('well2', '囲み枠b', '<p class="well2">囲み枠b</p>' + '\n' + '\n', '');
//    QTags.addButton('well3', '囲み枠c', '<p class="well3">囲み枠c</p>' + '\n' + '\n', '');
//    QTags.addButton('q_button', 'フラットボタン', '<a href="#" class="q_button">フラットボタン</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_l', 'フラットボタン-L', '<a href="#" class="q_button sz_l">フラットボタン-L</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_s', 'フラットボタン-S', '<a href="#" class="q_button sz_s">フラットボタン-S</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_blue', 'フラットボタン-blue', '<a href="#" class="q_button blue">フラットボタン-blue</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_green', 'フラットボタン-green', '<a href="#" class="q_button green">フラットボタン-green</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_red', 'フラットボタン-red', '<a href="#" class="q_button red">フラットボタン-red</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_yellow', 'フラットボタン-yellow', '<a href="#" class="q_button yellow">フラットボタン-yellow</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_rounded', '角丸ボタン', '<a href="#" class="q_button rounded">角丸ボタン</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_rounded_l', '角丸ボタン-L', '<a href="#" class="q_button rounded sz_l">角丸ボタン-L</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_rounded_s', '角丸ボタン-S', '<a href="#" class="q_button rounded sz_s">角丸ボタン-S</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_pill', 'ラウンドボタン', '<a href="#" class="q_button pill">ラウンドボタン</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_pill_l', 'ラウンドボタン-L', '<a href="#" class="q_button pill sz_l">ラウンドボタン-L</a>' + '\n' + '\n', '');
//    QTags.addButton('q_button_pill_s', 'ラウンドボタン-S', '<a href="#" class="q_button pill sz_s">ラウンドボタン-S</a>' + '\n' + '\n', '');
//    QTags.addButton('single_banner', '広告', '[s_ad]' + '\n' + '\n', '');
})();
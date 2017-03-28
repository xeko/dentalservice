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
                        editor.insertContent('[tabs]\n\
    <p style="padding-left: 30px;">[tab title="Title..."]Content...[/tab]</p>\n\
[/tabs]');
                    }
                },
                {
                    text: 'Feature List',
                    onclick: function () {
                        editor.insertContent('[feature item_per_row=4 bgcolor="#f7f3e8" border="#a0958b"]\n\
    <p style="padding-left: 30px;">[feature-item class="active" title="Title"]</p>\n\
    <p style="padding-left: 30px;">[feature-item class="inactive" title="Title"]</p>\n\
[/feature]');
                    }
                }                
            ]
        });
    });
})();
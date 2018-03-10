(function() {
    tinymce.PluginManager.add('mybutton', function(editor, url) {
        editor.addButton('mybutton', {
            title: "Add Content Restrictions",
            image: "../wp-content/themes/waysideathleticclub/assets/img/user-restrictions-icon.png",
            onclick: function() {
                editor.windowManager.open({
                    title: tinyMCE_object.button_title,
                    body: [{
                        type: 'textbox',
                        name: 'content',
                        text: 'Popup Content',
                        placeholder: 'Popup content goes here...'
                    }, {
                        type: 'listbox',
                        name: 'listbox',
                        tooltip: 'Some nice tooltip to use',
                        values: [{
                            text: '[loggedin]',
                            value: 'loggedin'
                        }, {
                            text: '[loggedout]',
                            value: 'loggedout'
                        }],
                        value: 'loggedin' // Sets the default
                    }, {
                        type: 'checkbox',
                        name: 'shopmanager',
                        text: 'Shop Manager',
                        checked: false
                    }, {
                        type: 'checkbox',
                        name: 'customer',
                        text: 'Customer',
                        checked: false
                    }, {
                        type: 'checkbox',
                        name: 'subscriber',
                        text: 'Subscriber',
                        checked: false
                    }, {
                        type: 'checkbox',
                        name: 'contributer',
                        text: 'Contributer',
                        checked: false
                    }, {
                        type: 'checkbox',
                        name: 'author',
                        text: 'Author',
                        checked: false
                    }, {
                        type: 'checkbox',
                        name: 'editor',
                        text: 'Editor',
                        checked: false
                    }, {
                        type: 'checkbox',
                        name: 'administrator',
                        text: 'Administrator',
                        checked: false
                    }],
                    onsubmit: function(e) {
                        editor.insertContent('[' + e.data.listbox + ' shopmanager="' + e.data.shopmanager + '" customer="' + e.data.customer + '" subscriber="' + e.data.subscriber + '" contributer="' + e.data.contributer + '" author="' + e.data.author + '" editor="' + e.data.editor + '" administrator="' + e.data.administrator + '" content="' + e.data.content + '" ]');
                    }
                });
            },
        });
    });

})();

// iterate over users
// for (var i = 0; i < userRoles.roles.length; i++) {
//     alert(userRoles.roles[i]);
// }
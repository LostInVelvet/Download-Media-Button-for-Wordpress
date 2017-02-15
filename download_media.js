jQuery(function($) {
    $(document).ready(function(){
            $('#insert-my-media').click(open_media_window);
        });

    function open_media_window() {
        if (this.window === undefined) {
        this.window = wp.media({
                title: 'Insert a media',
                library: {type: 'audio'},
                multiple: false,
                button: {text: 'Insert'}
            });

        var self = this; // Needed to retrieve our variable in the anonymous function below
        this.window.on('select', function() {
                var first = self.window.state().get('selection').first().toJSON();
                wp.media.editor.insert('[dl_media id="' + first.id + '" bg_color=#000 font_color=#fff font_size=12 text="DOWNLOAD SONG"]');
            });
    }

    this.window.open();
    return false;
    }
});
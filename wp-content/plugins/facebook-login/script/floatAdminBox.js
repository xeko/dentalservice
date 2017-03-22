jQuery(document).ready(function($) {
    if( $(".columns-2").length > 0 )
    {
        $('#side-sortables').hcSticky({
            noContainer: true,
            bottomLimiter: $("#wpfooter")
        });
    }
});
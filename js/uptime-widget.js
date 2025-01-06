jQuery(document).ready(function($) {
    $.ajax({
        url: uptimeWidgetAjax.ajax_url,
        method: 'POST',
        data: {
            action: 'get_uptime_robot_data'
        },
        success: function(response) {
            $('#uptime-robot-widget-content').html(response);
        },
        error: function() {
            $('#uptime-robot-widget-content').html('<div class="uptime-content"><p class="uptime">Failed to load site status.</p></div>');
        }
    });
});
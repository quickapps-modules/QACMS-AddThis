$(document).ready(function() {
    $('#ModuleSettingsAboveNodeStyle0').click(function() {
        $('.fieldset-toggle-container').eq(2).toggle();
    });

    $('#ModuleSettingsBelowNodeStyle0').click(function() {
        $('.fieldset-toggle-container').eq(3).toggle();
    });

    $('#ModuleSettingsAboveNodeStyleCustom').next().after($('div.above-custom-settings').html());
    $('div.above-custom-settings').remove();

    $('#ModuleSettingsBelowNodeStyleCustom').next().after($('div.below-custom-settings').html());
    $('div.below-custom-settings').remove();

    $('div.above-fieldset div.radio input:radio').click(function() {
        if ($(this).val() != 'custom') {
            $('#above-custom-settings').hide();
        } else {
            $('#above-custom-settings').show();
        }
    });

    $('div.below-fieldset div.radio input:radio').click(function() {
        if ($(this).val() != 'custom') {
            $('#below-custom-settings').hide();
        } else {
            $('#below-custom-settings').show();
        }
    });
});
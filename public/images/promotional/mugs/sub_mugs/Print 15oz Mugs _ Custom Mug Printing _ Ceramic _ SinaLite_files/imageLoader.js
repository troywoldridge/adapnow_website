define([
    'jquery'
], function ($) {
    'use strict';

    return {
        imageLoader: function(config, element) {

            $(element).on(config.targetEvent, function (event) {
                var container = $(this).find(config.containerSelector);
                if (container.length === 0) {
                    console.log('container not found');
                    return;
                }

                var childImg = $(container).find('img');
                if (childImg.length > 0) {
                    return;
                }

                var imageAttributes = ['src', 'width', 'height', 'alt'];
                var attribute = null;
                var html = '';

                for (var i = 0;i < imageAttributes.length;i++) {
                    attribute = imageAttributes[i];
                    html += attribute;
                    html += '="' + $(container).data(attribute) + '" ';
                }

                html = '<img ' + html + '/>';
                $(container).append(html);
            });

        }
    };

});
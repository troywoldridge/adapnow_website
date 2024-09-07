define([
    'jquery'
], function ($) {
    'use strict';

    return {
        categoryProducts: function(config, element) {

            window.pricingData = window.pricingData || {};

            window.pricingData.topmenu = {
                categoryDescriptions: [],
                keyPreffix: 'category_',
                getKey: function (categoryId) {
                    return this.keyPreffix + categoryId;
                },
                getDescription: function (categoryId) {
                    var key = this.getKey(categoryId);
                    if (this.categoryDescriptions[key] === undefined) {
                        return null;
                    }
                    return this.categoryDescriptions[key];
                },
                setDescription: function (categoryId, description) {
                    var key = this.getKey(categoryId);
                    this.categoryDescriptions[key] = description;
                },

                getDescriptionContainer: function (childItemElement) {
                    return $(childItemElement).parent().parent().parent().parent().find('div.main-category-description');
                }
            };

            $('li.category-child-item').on('mouseover', function (event) {
                var topmenu = window.pricingData.topmenu;
                var childItemData = $(this).data();

                var descriptionContainer = topmenu.getDescriptionContainer($(this));
                if (descriptionContainer.length === 0) {
                    console.log('description container not found');
                    return;
                }

                var mainCategoryData = $(descriptionContainer).parent().parent().data();

                // copy main category description to placeholder
                var savedDescription = topmenu.getDescription(mainCategoryData.categoryId);
                if (savedDescription === null) {
                    topmenu.setDescription(mainCategoryData.categoryId, $(descriptionContainer).html());
                    console.log('debug: topmenu.categoryDescriptions', topmenu.categoryDescriptions);
                }

                // set description container html based on child item data
                var descriptionHtml = '<div>' + childItemData.description +'</div>';
                $(descriptionContainer).html(descriptionHtml);
            });

            $('li.category-child-item').on('mouseout', function (event) {
                var topmenu = window.pricingData.topmenu;
                var descriptionContainer = topmenu.getDescriptionContainer($(this));
                if (descriptionContainer.length === 0) {
                    console.log('description container not found');
                    return;
                }

                var mainCategoryData = $(descriptionContainer).parent().parent().data();

                // restore main category description to placeholder
                $(descriptionContainer).html(topmenu.getDescription(mainCategoryData.categoryId));
            });

        }
    };

});
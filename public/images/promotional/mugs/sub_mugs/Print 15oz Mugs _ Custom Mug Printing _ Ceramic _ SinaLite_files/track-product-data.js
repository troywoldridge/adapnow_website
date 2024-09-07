define([
    'jquery',
    'Magento_Customer/js/customer-data'
    ], function($,customerData) {
        var getCustomerInfo = function () {
            return customerData.get('customer')();
        };
        var isLoggedIn = function () {
            var customerInfo = getCustomerInfo();
            return customerInfo && customerInfo.firstname;
        };

        return function(config, element) {     
            is_customer_logged_in =isLoggedIn()?1:0; 
            logged_in_customer_id = CUSTOMERID = getCustomerInfo() ? getCustomerInfo().customer_id:0;
            //Track data for production site only
            if(window.is_live && config.track_data =="1"){
                mixpanel.identify(logged_in_customer_id); 
                //Track Mixpanel data
                mixpanel.track(config.mixpanel_event,
                    {
                        "Product Name" : config.product_name,
                        "utm_source" : config.utm_source,
                        "utm_content" : config.utm_content,
                        "utm_medium" : config.utm_medium,
                        "utm_campaign" : config.utm_campaign,
                        "utm_term" : config.utm_term,
                        "Category Name" : parent_category_name,
                        "Page Title" : document.title,
                        "id": config.product_id
                });

                //Track google analytic data
                dataLayer.push({
                    'event':config.ga_event,
                    'ID': logged_in_customer_id , 
                    'ProductName': config.product_name, 
                    'ProductId': config.product_id,
                    'CategoryName': parent_category_name, 
                    'CategoryId': parent_category_id,
                    'dynx_itemid': config.product_id,
                    'dynx_itemid2': parent_category_id,
                    'ecomm_prodid': config.product_id
                });    
            }   

        }
});
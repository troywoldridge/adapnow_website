define(function()
{
    return function()
    {
        var hasQuickship = false;
        var isQuickship = false;
        if (! localStorage.getItem('mage-cache-storage') )
            return true;
        
        var json = JSON.parse(localStorage.getItem('mage-cache-storage'));

        if (!('cart' in json) || !('items' in json['cart']))
            return true;
        
        var cartitems = json['cart']['items'];

        if ( cartitems.length == 0)
            return true;

        for( var i in cartitems )
            if ( ["quick_ship_business_cards",'quick_ship_coroplast_signs'].includes(cartitems[i]['product_sku']) )
                hasQuickship = cartitems[i]['product_sku']; 

        if ( ["quick_ship_business_cards",'quick_ship_coroplast_signs'].includes(product.getProductData()['sku'] ) ) 
            isQuickship = product.getProductData()['sku'];        

        if ( hasQuickship != isQuickship )
            return false;

        return true;
    }
});
//This is custom validation script for validating pobox in street field of SHIPPING ADDRESS FORM CHECKOUT
define([
    'Magento_Ui/js/lib/validation/validator',
    'jquery',
     'jquery/ui',
     'jquery/validate',
    'mage/translate',
], function (validator,$) {
    "use strict";

    return function () {

        validator.addRule(
        'validate-street-part',function(v){
            var pattern = /^(((p[\s\.]?[o\s][\.]?)\s?)|(post\s?office\s?))((box|bin|b\.?)?\s?(num|number|#)?\s?\d+)/igm.test(v);

            if(!pattern){
                return true;
            }else{
                return false;
            }
        },
        $.mage.__("Please note that we cannot ship to PO Boxes. Please enter a physical address.")
        );
    };
});

/**
 * Current validation covers the below possibilities
 *  po 124
    pob 555
    p.o.b. 555
    po box 555
    pobox 555
    p.o. box 663
    P.O. Box #123
    P.O. Box 3456
    PO Box 1234
    PO Box Num 1234
    P O Box 4321
    Post Office Box 9999
    P.O. 1234
    P.O 1234
    PO BOX 1234
    PO# 1234
    PO #1234
    Po Box 7
    PO Box 2951
    P.O.Box No.24
    P. O. Box No. 2653
 *
 */

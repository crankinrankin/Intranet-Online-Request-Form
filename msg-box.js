/*
 * Ext JS Library 3.0 RC1
 * Copyright(c) 2006-2009, Ext JS, LLC.
 * licensing@extjs.com
 * 
 * http://extjs.com/license
 */

Ext.onReady(function(){
    

    Ext.get('mb4').on('click', function(e){
        Ext.MessageBox.show({
           title:'Which Site?',
           msg: 'Does this change pertain to the new (ecinteractive) site in any way?',
           buttons: Ext.MessageBox.YESNOCANCEL,
           fn: showResult,
           animEl: 'mb4',
           icon: Ext.MessageBox.QUESTION
       });
    });
	
    function showResult(btn){
        Ext.example.msg('Thank You', 'You clicked the {0} button', btn);
    };

    function showResultText(btn, text){
        Ext.example.msg('Button Click', 'You clicked the {0} button and entered the text "{1}".', btn, text);
    };
});
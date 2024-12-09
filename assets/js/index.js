jQuery(function ($) {
    // 自動カナ入力
    $(document).ready(
      function () {
        $.fn.autoKana('#your-name', '#your-name-kana', {
          katakana: true //trueでカタカナ、falseでひらがな（デフォルト）
        });
        $.fn.autoKana('#pres-name', '#pres-name-kana', {
            katakana: true //trueでカタカナ、falseでひらがな（デフォルト）
        });
        $.fn.autoKana('#bank_name', '#bank_name-kana', {
            katakana: true //trueでカタカナ、falseでひらがな（デフォルト）
        });
        $.fn.autoKana('#bank-child_name', '#bank-child_name-kana', {
            katakana: true //trueでカタカナ、falseでひらがな（デフォルト）
        });
        $.fn.autoKana('#bank-account_name', '#bank-account_name-kana', {
            katakana: true //trueでカタカナ、falseでひらがな（デフォルト）
        });
        $.fn.autoKana('#contract-manager_name', '#contract-manager_name-kana', {
            katakana: true //trueでカタカナ、falseでひらがな（デフォルト）
        });
        $.fn.autoKana('#store_name', '#store_name-kana', {
            katakana: true //trueでカタカナ、falseでひらがな（デフォルト）
        });
        $.fn.autoKana('#yago_name', '#yago_name-kana', {
            katakana: true //trueでカタカナ、falseでひらがな（デフォルト）
        });
        $.fn.autoKana('#manager-name', '#manager-name-kana', {
            katakana: true //trueでカタカナ、falseでひらがな（デフォルト）
        });
      });
  
    //郵便番号、住所自動入力
    $('#your-zip').keyup(function () {
      AjaxZip3.zip2addr(this, '', 'your-address01', 'your-address01'); // ここはname属性値を入力
    });  
	$('#building-zip').keyup(function () {
      AjaxZip3.zip2addr(this, '', 'building-address', 'building-address'); 
    }); 
	$('#company-zip').keyup(function () {
      AjaxZip3.zip2addr(this, '', 'company-address', 'company-address'); 
    }); 
	$('#your-domicile-zip').keyup(function () {
      AjaxZip3.zip2addr(this, '', 'your-domicile-address', 'your-domicile-address'); 
    }); 
    
  });
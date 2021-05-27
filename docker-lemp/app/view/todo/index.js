$(function() {
 
    // チェックボックスをチェックしたら発動
    $('input[name="check"]').change(function() {
   
      // もしチェックが入ったら
      if ($(this).prop('checked')) {
   
        // value値を出力
        $('#p01').text($(this).val());
   
      } else {
   
        // テキストをリセット
        $('#p01').text('');
      }
   
    });
  });
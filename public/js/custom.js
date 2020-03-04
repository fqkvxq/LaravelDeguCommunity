// ====================================================
// 画像アップロードしたときにファイル名を表示させる
// ====================================================
$(function() {
    $('input[type=file]').after('<span></span>');
  
    // アップロードするファイルを選択
    $('input[type=file]').change(function() {
      var file = $(this).prop('files')[0];
      $('.custom-file-label').html(file.name);
    });
  });
  
/** 
 * ファイルサイズの単位
 * @param {int} file_size 
 * @return {string}
 */
function getFiseSize(file_size)
{
var str;

// 単位
var unit = ['byte', 'KB', 'MB', 'GB', 'TB'];

for (var i = 0; i < unit.length; i++) {
if (file_size < 1024 || i == unit.length - 1) {
if (i == 0) {
    // カンマ付与
    var integer = file_size.toString().replace(/([0-9]{1,3})(?=(?:[0-9]{3})+$)/g, '$1,');
    str = integer +  unit[ i ];
} else {
    // 小数点第2位は切り捨て
    file_size = Math.floor(file_size * 100) / 100;
    // 整数と小数に分割
    var num = file_size.toString().split('.');
    // カンマ付与
    var integer = num[0].replace(/([0-9]{1,3})(?=(?:[0-9]{3})+$)/g, '$1,');
    if (num[1]) {
    file_size = integer + '.' + num[1];
    }
    str = file_size +  unit[ i ];
}
break;
}
file_size = file_size / 1024;
}

return str;
}
// ====================================================
// 
// ====================================================
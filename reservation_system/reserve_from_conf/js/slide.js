$(function () {
    const imgs = ['img1.jpg', 'img2.jpg', 'img3.jpg', 'img4.jpg'];  // 画像ファイル名
    let index = 0;  // インデックス番号
  
    // 初期画像の表示
    $('.img').attr('src', 'images/' + imgs[index]);
    
    // ボタンクリックイベント
    $('#changeBtnL').click(function(){
      // 最後の画像判定
      if(index < 1){
        index = imgs.length - 1;
      }else{
        index--;
      }
      // 画像の切り替え
      $('.img').attr('src', 'images/' + imgs[index]);
    });
    $('#changeBtnR').click(function(){
      // 最後の画像判定
      if(index == imgs.length - 1){
        index = 0;
      }else{
        index++;
      }
      // 画像の切り替え
      $('.img').attr('src', 'images/' + imgs[index]);
    });
  });
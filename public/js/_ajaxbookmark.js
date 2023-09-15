
window.addEventListener('DOMContentLoaded',function () {
  var bookmark =  document.getElementsByTagName('.js-bookmark-toggle')[0];
  var bookmarkShopId;
  
  if(typeof t === 'underined'){
  bookmark.on('click', function() {
    console.log(typeof 'click');
      var $this = $(this);
      bookmarkShopId = $this.data('shopid');
      $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{ route('bookmark') }}",  //routeの記述
              type: 'POST', //受け取り方法の記述（GETもある）
              data: {
                  'shop_id': bookmarkShopId //コントローラーに渡すパラメーター
              },
      })
  
          // Ajaxリクエストが成功した場合
          .done(function (data) {
  //lovedクラスを追加
              $this.toggleClass('loved'); 
  
  //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
              $this.next('.bookmarksCount').html(data.shopBookmarksCount); 
  
          })
          // Ajaxリクエストが失敗した場合
          .fail(function (data, xhr, err) {
  //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
  //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
              console.log(typeof 'エラー');
              console.log(typeof err);
              console.log(typeof xhr);
          });
      
      return false;
  });
  }});
  
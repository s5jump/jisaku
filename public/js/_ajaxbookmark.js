
$(function () {
  var bookmark = $('.js-bookmark-toggle');
  var bookmarkShopId;
  
  bookmark.on('click', function () {
    console.log('click');
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
              console.log('エラー');
              console.log(err);
              console.log(xhr);
          });
      
      return false;
  });
  });
  
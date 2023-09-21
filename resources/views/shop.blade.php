@extends('layouts.layout')
@section('content')
        <main class="py-4">
            <div class="row justify-content-around">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class='text-center'>店舗詳細</div>
                        </div>
                        <div class="card-body">
                        

                       

                        <div>
                        

                        @if($bookmark_model->bookmark_exist(Auth::user()->id,$shop->id))
                        <div class='text-center'>
                            <p class="favorite-marke">
                            <a class="js-bookmark-toggle " href="" data-shopid="{{ $shop->id }}">
                            <button type="submit" class="btn btn-success">ブックマーク解除</button>
                            </a>
                            <span class="bookmarksCount">{{$shop->bookmarks_count}}
                            
                            </span>
                            </p>
                            @else
                            <p class="favorite-marke">
                            <a class="js-bookmark-toggle" href="" data-shopid="{{ $shop->id }}">
                            <button type="submit" class="btn btn-success">ブックマークする</button>
                            </a>
                            <span class="bookmarksCount">{{$shop->bookmarks_count}}
                            </span>
                            </p>
                            @endif
                        </div>
                    
                            <div class="card-body">
                            
                            <label for='name'>店舗名：{{ $shop->name }}</label>
                            <br>
                            <label for='adress'>住所：{{ $shop->adress }}</label>
                            <br>
                            <label for='review' class='mt-2'>レビュー点：
                                 @if($shop->shopavg($shop->id))
                                
                                {{ $shop->shopavg($shop->id)->count_review }} 
                                
                             @else
                             ---
                             
                            @endif</label>
                            <br>
                            <label for='comment' class='mt-2'>コメント：{{ $shop->comment }}</label>
                            <br>
                            <label for='image' class='mt-2'>店舗写真：{{ $shop->image }}</label>
                            
                            
                            <br>
                            
                            
                           
                            <th scope='col'>
                            </th>
                          
                           
                            <th scope='col'>

                            </th>
                           

                            
                            <th scope='col'></th>
                               
                            
                            </label>
                            </div>
                            
                         
                            
                            
                        </div>
                    
                    </div>

                </div>
                
            </div>
        </main>
        @endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
$(function () {
  var bookmark =  $('.js-bookmark-toggle');
  var bookmarkShopId;
  
  bookmark.on('click', function() {
    
      var $this = $(this);
      bookmarkShopId = $this.data('shopid');
      $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: '/ajaxbookmark',  //routeの記述
              type: 'POST', //受け取り方法の記述（GETもある）
              data: {
                  'shop_id': bookmarkShopId //コントローラーに渡すパラメーター
              },
      })
  
          // Ajaxリクエストが成功した場合
          .done(function (data) {
  
           
            if(data.exist == null){
                $this.children('.btn-success').html('ブックマークする');
            }else{
                $this.children('.btn-success').html('ブックマーク解除');
            }
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
  
        </script>
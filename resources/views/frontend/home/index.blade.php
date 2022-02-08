@extends('frontend.layouts.app')


@section('content')

<head>
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
</head>
<div class="content">

  {{-- messes --}}

  <div class="container-fluid " id="list_feature" data-limit="5">

    {{-- AJAX DATA HERE  --}}

  </div>
  <!-- Data Loader -->
  <div class="auto-load text-center" style="margin-top: 50px">
    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
      y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
      <path fill="#000"
        d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50"
          to="360 50 50" repeatCount="indefinite" />
      </path>
    </svg>
  </div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- SaveData --}}
<script type="text/javascript">

  function addRow(ele) {
    var album_id = $(ele).attr('album-id');
    var url = $(ele).attr('data-url');
    var data = {
        'album_id': album_id,
      }

      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });

      $.ajax({
        type:"POST",
        url: url,
        data: data,
        dataType:"json",
        
        success: function (response){
          console.log('success');
          $('.fade').hide(); 
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
          $("#mess").fadeIn("slow").delay(2000).fadeOut("slow");
        },
        error: function(data) { 
          console.log('Error')
        }

      });
      // setTimeout(function() {
      //     $('#mess').fadeOut('slow');
      // }, 4000);
    }
    
</script>

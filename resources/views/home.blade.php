<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
</head>
<body>
<div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
    <input id="thumbnail" class="form-control" type="text" name="filepath">
</div>
<img id="holder" style="margin-top:15px;max-height:100px;">
<script>
    $('#lfm').filemanager('image', {prefix: 'fm'});
</script>
</body>
</html>

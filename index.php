<!DOCTYPE html>
<html>
<head>
    <title>ChatGPT連線程式</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center">ChatGPT</h1>
    <form class="form-inline"id="chat-form">
        <div class="form-group">
            <input type="text" class="form-control" id ="user-input" name="query" placeholder="請輸入您的問題">
        </div>
        <button type="submit" class="btn btn-primary">提交</button>
    </form>
    <div id="loading" style="display:none;">
        <img src="loading.gif" alt="Loading..." />
    </div>
    <div id="result" class="text-center"></div>
</div>
</body>
</html>

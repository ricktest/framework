<html>
    <head>
        <title><?=esc($title)?></title>
        <style>
            .content{
                width:100%;
            }
            .login{
                width:50%;
                text-align:center;
                line-height:10px;
                margin: auto;
            
            }
            .warp{
                border:1px black solid;
                letter-spacing: 5px;
                padding-bottom:50px;
                margin-top:100px;
            }
            p{
                color:red;
            
            }
        </style>
        <script src="<?=base_url('/js/jquery-3.6.0.js')?>"></script>
        
      
    </head>
    <body>
    <div class="content">
        <div class="login">
            <?= $this->renderSection('login') ?>
            <?= $this->renderSection('register') ?>
        </div>
    </div>
    </body>
</html>
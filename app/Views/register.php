<?= $this->extend('default') ?>
<?= $this->section('register') ?>
<script>
$(function(){ 
    function submitregister(){
        $.ajax({
            type: "POST",
            url: './register',
            data : $( '#registerForm').serialize(), 
            success: function (response) {
                console.log(response);
                var obj = jQuery.parseJSON(response);
                
                if(obj.erreo!=undefined){
                    JSON.parse(response, function (key, value) {
                        $( '#'+key).html(value);
                    });
                }else{
                    alert(obj.sus.msg);
                    document.location.href=obj.sus.link;
                }
            },
            error: function (thrownError) {
            console.log(thrownError);
            }
        });
    }
        $( "#register" ).click(function() {
            submitregister();
        });
}); 
</script>
<div class="warp">
    <h2>註冊</h2>
    <form id="registerForm" method="post">
        <span>名字</span><input type="text" name="name" value="<?=esc($name)?>"><p id="name"></p>
        <span>帳號</span><input type="text" name="acount" value="<?=esc($acount)?>"><p id="acount"></p>
        <span>密碼</span><input type="text" name="pwd"><p id="pwd"></p>
        <input type="button" value="註冊" id="register">
        <a href="./login"><input type="button" value="登入"></a>
        <p id="fail"></p>
    </form>
</div>
<?= $this->endSection() ?> 
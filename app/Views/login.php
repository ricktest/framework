<?= $this->extend('default') ?>
<?= $this->section('login') ?>
<script>
$(function(){ 
    
    function submitLoin(){
        $.ajax({
            type: "POST",
            url: './login',
            data : $( '#logintForm').serialize(), 
            success: function (response) {
                console.log(response);
                var obj = jQuery.parseJSON(response);
                
                if(obj.erreo!=undefined){
                    $("#acount").html(obj.erreo.acount);
                    $("#pwd").html(obj.erreo.pwd);
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
        $( "#lognbtn" ).click(function() {
            submitLoin();
        });
}); 
</script>
<div class="warp">
    <h2>登入</h2>
    <form id="logintForm">
        <span>帳號</span><input type="text" name="acount" value=""><p></p>
        <p id="acount"><?php /*$validation->getError('acount');*/?></p>
        <span>密碼</span><input type="text" name="pwd" ><p></p>
        <p id="pwd"><?php /*$validation->getError('pwd');*/?></p>
        <input type="button" value="登入" id="lognbtn">
        <a href="./register"><input type="button" value="註冊" id=""></a>
    </form>
</div>
<?= $this->endSection() ?>   



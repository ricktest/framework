<?= $this->extend('default') ?>
<?= $this->section('login') ?>
<div class="warp">
    <h2>登入</h2>
    <form action="./login" method="post">
        <span>帳號</span><input type="text" name="acount" value=""><p></p>
        <p><?=$validation->getError('acount');?></p>
        <span>密碼</span><input type="text" name="pwd" ><p></p>
        <p><?=$validation->getError('pwd');?></p>
        <input type="submit" value="登入">
        <a href="./register"><input type="button" value="註冊"></a>
    </form>
</div>
<?= $this->endSection() ?>   



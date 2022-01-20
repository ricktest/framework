<?= $this->extend('default') ?>
<?= $this->section('register') ?>
<div class="warp">
    <h2>註冊</h2>
    <form action="./register" method="post">
        <span>名字</span><input type="text" name="name" value="<?=esc($name)?>"><p><?=$validation->getError('name');?></p>
        <span>帳號</span><input type="text" name="acount" value="<?=esc($acount)?>"><p><?=$validation->getError('acount');?></p>
        <span>密碼</span><input type="text" name="pwd"><p><?=$validation->getError('pwd');?></p>
        <input type="submit" value="註冊">
        <a href="./login"><input type="button" value="登入"></a>
        <p></p>
    </form>
</div>
<?= $this->endSection() ?> 
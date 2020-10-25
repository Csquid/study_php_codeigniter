<!-- 로그인 버튼을 누르면 controller authentication 로 이동-->
<form action="/index.php/auth/login_check" method="post">
    <div class="floating-box">
        <div class="login-container">
            <div id="login-box-id">
                <label class="sr-only">user id</label>
                <input type="text" id="login-input-text-id" name="id" placeholder="아이디">
            </div>
            <div id="login-box-pw">
                <label class="sr-only">password</label>
                <input type="password" id="login-input-text-pw" name="password" placeholder="비밀번호">
            </div>
            <button id="login-button">Login</button>
        </div>
        <div id="login-save-box">
            <input type="checkbox" id="login-save">
            <label for="login-save">로그인 상태유지</label>
        </div>
        <div id="register-link-box">
            <a href='/index.php/auth/register'>회원가입</a>
        </div>
    </div>
</form>
<script>
    window.addEventListener('load', function() {
        // document.querySelector('#')
    })
</script>
<!-- 
<?php if($this->session->userdata('is_login')) {?>
<script>
    history.go(-2);
</script>
<?php }?>
<script> -->
    
</script>
<?php if($this->session->flashdata('error')) { ?>
<script>
    alert('<?=$this->session->flashdata('error') ?>');
</script>
<?php } ?>
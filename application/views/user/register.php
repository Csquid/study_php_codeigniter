<!-- 로그인 버튼을 누르면 controller authentication 로 이동-->
<form action="/index.php/auth/register_process" method="post">
    <div class="floating-box">
        <div class="register-container">
            <div class="input-box">
                <label class="sr-only">user id</label>
                <input type="text" id="register-text-id" name="id" placeholder="아이디를 입력해주세요." autocomplete="off">
            </div>
            <div class="input-box">
                <label class="sr-only">password</label>
                <input type="password" id="register-text-pw" name="password" placeholder="비밀번호를 입력해주세요.">
            </div>
            <div class="input-box">
                <label class="sr-only">name</label>
                <input type="text" id="register-text-name" name="name" placeholder="이름(실명)을 입력해주세요." autocomplete="off">
            </div>
            <div class="input-box">
                <label class="sr-only">birth</label>
                <input type="text" id="register-text-birth" name="birth" placeholder="생일을 입력해주세요." autocomplete="off">
            </div>
            <div class="input-box">
                <label class="sr-only">email</label>
                <input type="text" id="register-text-email" name="email" placeholder="이메일을 입력해주세요." autocomplete="off">
            </div>
            <button id="register-button" type="submit">가입하기</button>
        </div>
    </div>
</form>

<?php if($this->session->flashdata('error')) { ?>
<script>
    alert('<?=$this->session->flashdata('error') ?>');
</script>
<?php } ?>
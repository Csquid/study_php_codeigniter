<?php
	if((isset($_SESSION['is_login']) === FALSE)) {
		$this->session->set_userdata('is_login', false);
	}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEAD Title</title>
    <link rel='stylesheet' href='/static/css/pracdb.css'>
    <link rel="stylesheet" href="/static/css/user/login.css">
    <link rel="stylesheet" href="/static/css/user/register.css">
    <link rel="stylesheet" href="/static/css/head.css">

</head>

<header>
    <nav id="navigation">
        <div id="header-nav">
            <a href="/">Home</a>
            <a href="/index.php/board">게시판</a>
            <!-- 만약 로그인이 되지 않았다면  -->
            <?php  if($this->session->userdata['is_login'] === FALSE) { ?>

            <div class="float-right">
                <a id='nav-login-button' href='/index.php/auth/login'>Login</a>
            </div>

            <?php } else { ?>
            <!-- 만약 로그인이 되었다면 -->
            <div class="float-right">
                <a id='nav-logout-button' href='/index.php/auth/logout'>Logout</a>
            </div>

            <?php }?>

        </div>
    </nav>
</header>

<script>
window.addEventListener('load', function() {
    if (document.querySelector('#nav-login-button')) {
        document.querySelector('#nav-login-button').addEventListener('click', function(e) {
            // if (<?=$this->session->userdata['is_login']?>) {
            //     e.preventDefault();
            //     alert('이미 로그인 되셧습니다.');
            //     console.log('yes');
            // } else {
            //     console.log('no');
            // };
        })
    }
});
</script>
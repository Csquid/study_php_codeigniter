<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- 네이버 게시판 에디터 -->
    <script type="text/javascript" src="/static/board_editor/js/service/HuskyEZCreator.js" charset="utf-8"></script>

    <style>
        .board-container {
            width: 1200px;
            margin: auto;
            /* padding: 20px 0; */
        }

        .board-common {
            border: 1px solid #b5b5b5;
        }

        #board-title {
            width: 100%;
            height: 45px;
            padding: 10px;
            font-size: 18px;
            margin-bottom: 10px;
        }

        #popContent {
            width: auto;
            height: 550px;
        }

        .board-button {
            display: inline-block;
            padding: 10px 0px;
            margin-top: 20px;
        }

        .board-button a {
            padding: 5px 10px;
            border: 2px solid #333333;
        }

        .board-button-container {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="board-container">
        <h1>게시글 작성</h1>
        <hr>
        <input type="text" class="board-common" id="board-title" placeholder="제목을 입력해주세요.">
        <textarea id="popContent" name="popContent" style="display: none;"></textarea>
        <div class="board-button-container">
            <div class="board-button">
                <a href="#" class="create">
                    등록
                </a>
            </div>
            <div class="board-button">
                <a href="/index.php/board/" class="cancle">
                    작성 취소
                </a>
            </div>
        </div>
        <script>
            let oEditors = [];

            nhn.husky.EZCreator.createInIFrame({
                oAppRef: oEditors,
                elPlaceHolder: "popContent", //textarea ID
                sSkinURI: "/static/board_editor/SmartEditor2Skin.html", //skin경로
                fCreator: "createSEditor2",
                htParams: {
                    // 툴바 사용 여부
                    bUseToolbar: true,
                    // 입력창 크기 조절바 사용 여부
                    bUseVerticalResizer: true,
                    // 모드 탭(Editor | HTML | TEXT) 사용 여부
                    bUseModeChanger: true,
                }
            });
            document.querySelector('.board-button .create').addEventListener('click', function(e) {
                let data = oEditors.getById['popContent'].exec('UPDATE_CONTENTS_FIELD', []);
                let pop = document.querySelector('#popContent').value;
                alert(pop);
            });
        </script>
    </div>

</body>

</html>
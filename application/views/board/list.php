<link rel="stylesheet" href="/static/css/board/list.css">

<div class="board-container">
    <table>
        <tr>
            <th>번호</th>
            <th class="title">제목</th>
            <th>작성자</th>
            <th>작성일자</th>
            <th>조회수</th>
        </tr>
        <?php 
            foreach($board_list as $entry) {
        ?>
        <tr>
            <td> <?=$entry->board_id?> </td>
            <td> <?=$entry->title?> </td>
            <td> <?=$entry->writer?> </td>
            <td> <?=$entry->register_date_simple?> </td>
            <td> <?=$entry->hit?> </td>
        </tr>
        <?php
             }
        ?>
    </table>
    <?php if ($this->session->userdata('is_login')) { ?>
    <div id="board-create">
        <a href="/index.php/board/create">
            글쓰기
        </a>
    </div>
    <?php } ?>
    <div class="pagination-wrap">
        <ul class="pagination">
            <li class="item">
                <a href="">◀ 이전</a>
            </li>
            <li class="item on">
                <a href="">1</a>
            </li>
            <li class="item">
                <a href="">2</a>
            </li>
            <li class="item">
                <a href="">3</a>
            </li>
            <li class="item">
                <a href="">4</a>
            </li>
            <li class="item">
                <a href="">5</a>
            </li>
            <li class="item">
                <a href="">다음 ▶</a>
            </li>
        </ul>
    </div>
</div>
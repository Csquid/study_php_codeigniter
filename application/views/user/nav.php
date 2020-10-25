<div class='user-table-container'>
    <ul class='users-ul'>
        <li class="users-list">
            <a class="users-a-list" href='/co/index.php/user/read'>ALL</a>
        </li>
        <?php 
            foreach($users as $entry) 
            { 
        ?>
        <li class="users-list">
            <a class="users-a-list" href='/co/index.php/user/read/<?= $entry->member_id ?>'> <?= $entry->id ?> </a>
        </li>
        <?php 
            }  
        ?>
    </ul>
</div>
<div class='user-table-container'>
    <table>
        <tbody>
            <tr>
                <th> member_id   </th>
                <th> id          </th>
                <th> name        </th>
                <th> email       </th>
                <th> birth       </th>
                <th> role        </th>
            </tr>
            <?php 
                foreach($users as $entry) {
            ?>
            <tr>
                <td>    <?=$entry->member_id?>  </td>
                <td>    <?=$entry->id?>         </td>
                <td>    <?=$entry->name?>       </td>
                <td>    <?=$entry->email?>      </td>
                <td>    <?=$entry->birth?>      </td>
                <td>    <?=$entry->role?>       </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>
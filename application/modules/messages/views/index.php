<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Ahmed
 * Date: 5/13/12
 * Time: 7:40 PM
 * To change this template use File | Settings | File Templates.
 */
?>

<table id="inboxtable-b" summary="Received Messages">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Sender</th>
        <th scope="col">Subject</th>
        <th scope="col"></th>
        <th scope="col">Read</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <? foreach($messages as $message): ?>
        <? if($message->unread): ?>
                <tr>
                    <td><? echo '<img src="/Assets/Images-CSS/table-images/unread.png">' ?></td>
                    <? else: ?>
                    <td><? echo '<img src="/Assets/Images-CSS/table-images/read.png">' ?></td>
            <? endif; ?>
                    <td><? echo $message->sender ?></td>
                    <td colspan="2"><? echo $message->subject ?></td>
                    <td><a href = "<? echo $message->read_link ?>">Read</a></td>
                    <td><a href="<? echo $message->delete_link ?>">Delete</a></td>
                </tr>
    <? endforeach; ?>
    </tbody>
</table>
    <? if($nomessage): ?>
        <? echo "You have no messages in your inbox." ?>
    <? endif; ?>

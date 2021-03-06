<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Showtimes'), ['controller' => 'Showtimes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Showtime'), ['controller' => 'Showtimes', 'action' => 'add']) ?> </li>
    </ul>
</nav>

<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($room->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($room->capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($room->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($room->modified) ?></td>
        </tr>
    </table>


<h3>Monday</h3>
<?php foreach($Monday as $showtime):?>

<tr>
            <td><?= h( $showtime->movie->name . " " . $showtime->start->hour . "/" . $showtime->end->hour . "h") ?></td>
            
</tr>
<?php endforeach; ?>
<h3>Tuesday</h3>
<?php foreach($Tuesday as $showtime):?>

<tr>
            <td><?= h( $showtime->movie->name . " " . $showtime->start->hour . "/" . $showtime->end->hour . "h") ?></td>
            
</tr>
<?php endforeach; ?>
<h3>Wednesday</h3>
<?php foreach($Wednesday as $showtime):?>

<tr>
            <td><?= h( $showtime->movie->name . " " . $showtime->start->hour . "/" . $showtime->end->hour . "h") ?></td>
            
</tr>
<?php endforeach; ?>
<h3>Thursday</h3>
<?php foreach($Thursday as $showtime):?>

<tr>
            <td><?= h( $showtime->movie->name . " " . $showtime->start->hour . "/" . $showtime->end->hour . "h") ?></td>
            
</tr>
<?php endforeach; ?>
<h3>Friday</h3>
<?php foreach($Friday as $showtime):?>

<tr>
            <td><?= h( $showtime->movie->name . " " . $showtime->start->hour . "/" . $showtime->end->hour . "h") ?></td>
            
</tr>
<?php endforeach; ?>
<h3>Saturday</h3>
<?php foreach($Saturday as $showtime):?>

<tr>
            <td><?= h( $showtime->movie->name . " " . $showtime->start->hour . "/" . $showtime->end->hour . "h") ?></td>
            
</tr>
<?php endforeach; ?>
<h3>Sunday</h3>
<?php foreach($Sunday as $showtime):?>

<tr>
            <td><?= h( $showtime->movie->name . " " . $showtime->start->hour . "/" . $showtime->end->hour . "h") ?></td>
            
</tr>
<?php endforeach; ?>

</div>




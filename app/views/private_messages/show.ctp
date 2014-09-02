<?php
/**
 * Tatoeba Project, free collaborative creation of multilingual corpuses project
 * Copyright (C) 2009 Etienne Deparis <etienne.deparis@umaneti.net>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 *
 * @category PHP
 * @package  Tatoeba
 * @author   HO Ngoc Phuong Trang <tranglich@gmail.com>
 * @license  Affero General Public License
 * @link     http://tatoeba.org
 */

if (empty($title)) {
    $messageTitle = __('[no subject]', true);
} else {
    $messageTitle = $title;
}
$this->set('title_for_layout', __('Private messages', true) 
    .' - ' 
    . sprintf(
        __('%s from %s', true),
        $messageTitle, $author['username']
    )
);

echo $this->element('pmmenu');
?>
<div id="main_content">
    <div class="module">
    <h2><?php echo $messageTitle; ?></h2>

    <?php
    $messages->displayMessage(
        $message,
        $author,
        null,
        $messageMenu
    );
    ?>
    
    <a name="reply"></a>
    <h2><?php __('Reply'); ?></h2>
    <?php
    if ($folder == 'Inbox') {
        $privateMessages->displayForm(
            $author['username'], 
            $messageTitle, 
            $message['text']
        );
    }
    ?>
    
    </div>
</div>

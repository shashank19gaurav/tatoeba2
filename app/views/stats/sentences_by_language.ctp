<?php
/**
 * Tatoeba Project, free collaborative creation of multilingual corpuses project
 * Copyright (C) 2010  HO Ngoc Phuong Trang <tranglich@gmail.com>
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
 
$this->set('title_for_layout', $pages->formatTitle(__('Number of sentences per language', true)));

$max = $stats[0]['Language']['sentences'];
?>
<div id="annexe_content">
    <?php echo $this->element('audio_stats', array(
        'stats' => $audioStats,
        'cache' => array(
            'time'=> '+6 hours',
            'key'=> Configure::read('Config.language')
        )
    )); ?>
</div>

<div id="main_content">
<div class="module">
    <h2>
    <?php 
    echo format(__n('One sentence', '{n}&nbsp;sentences', $totalSentences, true),
                array('n' => $totalSentences));
    ?>
    </h2>
    
    <table class="languages-stats">
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th><?php __('Language'); ?></th>
        <th><?php __('Sentences'); ?></th>
    </tr>

    <?php
    $rank = 1;
    foreach ($stats as $stat) {
        $language = $stat['Language'];

        $langCode = $language['code'];
        $numSentences = $language['sentences'];
        if ($max == 0) {
            $percent = 0;
        } else {
            $percent = ($numSentences / $max) * 100;
        }
        $numSentencesDiv  = '<div class="bar" style="width:'.$percent.'%"></div>';
        $numSentencesDiv .= $numSentences;

        $languageIcon = $languages->icon(
            $langCode, array('width' => 30, 'height' => 20)
        );

        $langName = $languages->codeToNameAlone($langCode);
        if (empty($langCode)) {
            $langCode = 'unknown';
        }
        $languageLink = $html->link(
            $langName,
            array(
                "controller" => "sentences",
                "action" => "show_all_in",
                $langCode,
                'none',
                'none',
                'indifferent'
            )
        );

        echo '<tr>';

        echo $html->tag('td', $rank);
        echo $html->tag('td', $languageIcon);
        echo $html->tag('td', $langCode);
        echo $html->tag('td', $languageLink);
        echo $html->tag('td', $numSentencesDiv, array('class' => 'num-sentences'));

        echo '</tr>';

        $rank++;
    }
    ?>
    </table>
</div>
</div>

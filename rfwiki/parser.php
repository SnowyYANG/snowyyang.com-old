<?php
//<h3>标题3</h3>
//<p>段落</p>
//<table>
//<tr><th></th></tr>
//{{
//模板
//}{
//数据	数据
//}}
// </table>
function parse_template($text) {
    $lines = explode("\n", $text);
    $state = 0;
    foreach($lines as &$l) {
        if ($state === 1) {
            if ($l === '}{') $state = 2;
            else $template .= $l;
            $l = '';
        }
        else if ($state === 2) {
            if ($l === '}}') {
                $state = 0;
                $l = '';
            }
            else {
                $data = explode("\t", $l);
                if ($template === '') $l = '<tr><td>'.implode('</td><td>', $data).'</td></tr>';
                else $l = str_replace(['{0}','{1}','{2}','{3}','{4}','{5}','{6}','{7}','{8}','{9}','{A}','{B}','{C}'], $data, $template);
            }
        }
        else if ($l === '{{') {
            $state = 1;
            $template = '';
            $l = '';
        }
    }
    return implode($lines);
}

function parse_link($text) {
    $text = str_replace('<a href="/', '<a href="'.SITE.'/', $text);
    $text = str_replace('<img src="/', '<img src="'.IMG.'/', $text);
    return $text;
}

function fulltext($html) {
    $html = preg_replace("/[ \t]+/", ' ', $html);
    $html = str_replace('</td><td>', ' ', $html);
    return preg_replace('/<.+?>/', '', $html);
}
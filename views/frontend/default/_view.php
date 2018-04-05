<?php
/**
 * Project: yii2-blog for internal using
 * Author: akiraz2
 * Copyright (c) 2018.
 */

use yii\helpers\Html;
use yii\helpers\StringHelper;
?>


<div class="post">
    <div class="title">
        <?= Html::a(Html::encode($data->title), $data->url); ?>
    </div>
    <div class="nav">
        <i class="icon-date"></i><?= Yii::$app->formatter->asDate($data->created_at); ?>
        <i class="icon-edit"></i><?= 'By ' . $data->user->username; ?>
        <i class="icon-cat"></i><?= '<a href="'. Yii::$app->getUrlManager()->createUrl(['/post/category/','id'=>$data->category->id]) .'">' . $data->category->title . '</a>'; ?>
        <i class="icon-comment"></i><?= Html::a("评论{$data->commentsCount}条",$data->url.'#comments'); ?>
        <i class="icon-smiley"></i>阅读<?= $data->click; ?>次
        <i class="icon-views"></i><?= implode(' ', $data->tagLinks); ?>
    </div>
    <div class="content">
        <?php
        $parser = new \cebe\markdown\GithubMarkdown();
        echo $parser->parse($data->content);
        ?>
    </div>
</div>
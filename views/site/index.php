<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
require_once '/home/ren/.config/composer/vendor/autoload.php';
use Dota2Api\Api;
Api::init('53B38B533EBC6CCAF4F07F3A534E1CDA', array('localhost', 'root', 'admin', 'yii', ''));
?>
<div class="site-index">
<div>
<?php
    use app\models\Stats;
    //dps query
    $players_dps_rank = Stats::find()
                                    ->select(['player_name', 'create_deadly_damages'])
                                    ->orderBy(['create_deadly_damages' => SORT_DESC])
                                    ->limit(20)
                                    ->asArray()
                                    ->all();

    //control query
    $players_control_rank = Stats::find()
                                            ->select(['player_name', 'create_deadly_stiff_control'])
                                            ->orderBy(['create_deadly_stiff_control' => SORT_DESC])
                                            ->limit(20)
                                            ->asArray()
                                            ->all();

    //hero query
    $heroes_damage_rank = Stats::find()
                                            ->select(['hero_name', 'create_deadly_damages'])
                                            ->orderBy(['create_deadly_damages' => SORT_DESC])
                                            ->limit(20)
                                            ->asArray()
                                            ->all();

    //print_r($player_dps_rank)

?>
</div>

    <div class="jumbotron" style="background-color: #ffffff;">
        <img src="../image/ti6.png" style="max-width: 1024px; border-radius: 10px"> 
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-4">
                <h2 style="text-align: center">Ti6选手输出天梯</h2>

                <ul class="list-group">
                    <?php foreach($players_dps_rank as $player_dps_rank) {?>
                        <li class="list-group-item"><a href="#"><?php echo $player_dps_rank['player_name'];?>致死伤害量：<?php echo $player_dps_rank['create_deadly_damages'];?></a></li>
                        <?php }?>
                </ul>

                <p style="text-align: center"><a class="btn btn-default" href="http://www.yiiframework.com/doc/">See More &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2 style="text-align: center">Ti6选手控制天梯</h2>

                <ul class="list-group">
                    <?php foreach($players_control_rank as $player_control_rank) {?>
                        <li class="list-group-item"><a href="#"><?php echo $player_control_rank['player_name'];?>控制时长：<?php echo round($player_control_rank['create_deadly_stiff_control'], 2);?></a></li>
                        <?php }?>
                    
                </ul>

                <p style="text-align: center"><a class="btn btn-default" href="http://www.yiiframework.com/doc/">See More &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2 style="text-align: center">Ti6英雄输出天梯</h2>

                <ul class="list-group">
                    <?php foreach($heroes_damage_rank as $hero_damage_rank) {?>
                        <li class="list-group-item"><a href="#"><?php echo $hero_damage_rank['hero_name'];?>伤害量：<?php echo $hero_damage_rank['create_deadly_damages'];?></a></li>
                        <?php }?>
                    
                </ul>

                <p style="text-align: center"><a class="btn btn-default" href="http://www.yiiframework.com/doc/">See More &raquo;</a></p>
            </div>
        </div>

    </div>
</div>

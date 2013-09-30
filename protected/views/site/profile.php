
<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/my-custom.css');


$this->breadcrumbs=array(
    'Site'=>array('index'),
    'Profile',
);

$this->widget('bootstrap.widgets.TbNav', array(
    'type' => TbHtml::NAV_TYPE_TABS,
    'id' => 'profile_tabs',
    'items' => array(
        array('label' => 'Settings', 'name'=>'#settings', 'url' => '#settings', 'active' => true),
        array('label' => 'Messages', 'name'=>'#messages','url' => '#messages',),
        array('label' => 'Dashboard', 'name'=>'#dashboard','url' => '#dashboard',),
    ),
)); ?>

<div id="tab_content" class="tab-content">

    <div class="tab-pane fade active in" id="settings">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </div>
    <div class="tab-pane fade" id="messages">
        <div class="widget stacked">

            <div class="widget-header">
                <i class="icon-signal"></i>
                <h3>Chart</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">
                <div id="area-chart" class="chart-holder" style="padding: 0px; position: relative;"><canvas class="base" width="531" height="250"></canvas><canvas class="overlay" width="531" height="250" style="position: absolute; left: 0px; top: 0px;"></canvas><div class="tickLabels" style="font-size:smaller"><div class="xAxis x1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:center;left:4px;top:228px;width:48px">0</div><div class="tickLabel" style="position:absolute;text-align:center;left:54px;top:228px;width:48px">10</div><div class="tickLabel" style="position:absolute;text-align:center;left:104px;top:228px;width:48px">20</div><div class="tickLabel" style="position:absolute;text-align:center;left:154px;top:228px;width:48px">30</div><div class="tickLabel" style="position:absolute;text-align:center;left:204px;top:228px;width:48px">40</div><div class="tickLabel" style="position:absolute;text-align:center;left:254px;top:228px;width:48px">50</div><div class="tickLabel" style="position:absolute;text-align:center;left:303px;top:228px;width:48px">60</div><div class="tickLabel" style="position:absolute;text-align:center;left:353px;top:228px;width:48px">70</div><div class="tickLabel" style="position:absolute;text-align:center;left:403px;top:228px;width:48px">80</div><div class="tickLabel" style="position:absolute;text-align:center;left:453px;top:228px;width:48px">90</div><div class="tickLabel" style="position:absolute;text-align:center;left:503px;top:228px;width:48px">100</div></div><div class="yAxis y1Axis" style="color:#545454"><div class="tickLabel" style="position:absolute;text-align:right;top:210px;right:510px;width:21px">0</div><div class="tickLabel" style="position:absolute;text-align:right;top:167px;right:510px;width:21px">20</div><div class="tickLabel" style="position:absolute;text-align:right;top:123px;right:510px;width:21px">40</div><div class="tickLabel" style="position:absolute;text-align:right;top:80px;right:510px;width:21px">60</div><div class="tickLabel" style="position:absolute;text-align:right;top:36px;right:510px;width:21px">80</div><div class="tickLabel" style="position:absolute;text-align:right;top:-7px;right:510px;width:21px">100</div></div></div></div>
            </div> <!-- /widget-content -->

        </div>
    </div>
    <div class="tab-pane fade" id="dashboard">
        <div class="widget stacked widget-table action-table">

            <div class="widget-header">
                <i class="icon-th-list"></i>
                <h3>Table</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Engine</th>
                        <th>Browser</th>
                        <th class="td-actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn btn-xs btn-primary">
                                <i class="btn-icon-only icon-ok"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn btn-xs btn-primary">
                                <i class="btn-icon-only icon-ok"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn btn-xs btn-primary">
                                <i class="btn-icon-only icon-ok"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn btn-xs btn-primary">
                                <i class="btn-icon-only icon-ok"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn btn-xs btn-primary">
                                <i class="btn-icon-only icon-ok"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5</td>
                        <td class="td-actions">
                            <a href="javascript:;" class="btn btn-xs btn-primary">
                                <i class="btn-icon-only icon-ok"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div> <!-- /widget-content -->

        </div>
    </div>

</div>

<script>
    $('#profile_tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
</script>
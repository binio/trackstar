
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

    <div class="tab-pane fade active in span6" id="settings">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </div>
    <div class="tab-pane fade span12" id="messages">
        <div class="widget-content">
            <div class="span3 cc1">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            </div>
            <div class="span3 cc1">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            </div>
            <div class="span3 cc1">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
            </div>
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
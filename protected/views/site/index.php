<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="row">
    <div class="span4">You may change the content of this page by modifying the following two filesYou may change the content of this page by modifying the following two filesYou may change the content of this page by modifying the following two files</div>
    <div class="span4">You may change the content of this page by modifying the following two filesYou may change the content of this page by modifying the following two filesYou may change the content of this page by modifying the following two files</div>
    <div class="span4">You may change the content of this page by modifying the following two filesYou may change the content of this page by modifying the following two filesYou may change the content of this page by modifying the following two files</div>
</div>
<?php
$this->widget('bootstrap.widgets.TbNav', array(
'type' => TbHtml::NAV_TYPE_TABS,
'id' => 'profile_tabs',
'items' => array(
array('label' => 'Rekolekcje', 'name'=>'#settings', 'url' => '#settings', 'active' => true),
array('label' => 'Kazania', 'name'=>'#messages','url' => '#messages',),
array('label' => 'Konferencje', 'name'=>'#dashboard','url' => '#dashboard',),
array('label' => 'Świadectwa wiary', 'name'=>'#testimony','url' => '#testimony',),
),
)); ?>

<div id="tab_content" class="tab-content">

    <div class="tab-pane fade active in span16" id="settings">
        <div class="widget-content">
            <!-- ROW 1-->
            <div class="span4 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt" >
                    <?php  $this->widget('ext.Yiitube', array('v' => '81110177', 'player'=>'vimeo','size'=>'vsmall')); ?>
                </div>
            </div>
            <div class="span4 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt">
                    <?php  $this->widget('ext.Yiitube', array('v' => '81492814', 'player'=>'vimeo', 'size'=>'vsmall')); ?>
                </div>
            </div>
            <div class="span4 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt">
                    <?php  $this->widget('ext.Yiitube', array('v' => '81281304', 'player'=>'vimeo', 'size'=>'vsmall')); ?>
                </div>
            </div>

            <!-- ROW 2-->
            <div class="span4 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt" >
                    <?php  $this->widget('ext.Yiitube', array('v' => '80357111', 'player'=>'vimeo','size'=>'vsmall')); ?>
                </div>
            </div>
            <div class="span4 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt">
                    <?php  $this->widget('ext.Yiitube', array('v' => '80730986', 'player'=>'vimeo', 'size'=>'vsmall')); ?>
                </div>
            </div>
            <div class="span4 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt">
                    <?php  $this->widget('ext.Yiitube', array('v' => '79598960', 'player'=>'vimeo', 'size'=>'vsmall')); ?>
                </div>
            </div>

            <!-- ROW 3-->
            <div class="span4 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt" >
                    <?php  $this->widget('ext.Yiitube', array('v' => '-e61nMgZarQ', 'player'=>'youtube','size'=>'vsmall')); ?>
                </div>
            </div>
            <div class="span4 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt">
                    <?php  $this->widget('ext.Yiitube', array('v' => '8euLuelwYCI', 'player'=>'youtube', 'size'=>'vsmall')); ?>
                </div>
            </div>
            <div class="span4 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt">
                    <?php  $this->widget('ext.Yiitube', array('v' => '81281304', 'player'=>'vimeo', 'size'=>'vsmall')); ?>
                </div>
            </div>
        </div>

    </div>
    <div class="tab-pane fade span12" id="messages">
        <div class="widget-content">

            <div class="span3 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </div>
            </div>
            <div class="span3 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </div>
            </div>
            <div class="span3 ccmrt">
                <div class="header-mrt"><i class="icon-th-list"></i> header</div>
                <div class="content-mrt">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                </div>
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

<?php
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
    <div class="tab-pane fade" id="messages">456</div>
    <div class="tab-pane fade" id="dashboard">789</div>

</div>

<script>
    $('#profile_tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })
</script>
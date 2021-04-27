<?php
/* Smarty version 3.1.33, created on 2019-08-01 01:14:57
  from '/home/tourcode/public_html/billing/ui/theme/ibilling/about.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d42755154a8e5_59239161',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0918f02087f990fb1019c46edcbaf86c05bf6ddc' => 
    array (
      0 => '/home/tourcode/public_html/billing/ui/theme/ibilling/about.tpl',
      1 => 1564636490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d42755154a8e5_59239161 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4000681245d427551549928_59550823', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/admin.tpl");
}
/* {block "content"} */
class Block_4000681245d427551549928_59550823 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4000681245d427551549928_59550823',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <div id="updateProgressbar" class="progress" style="display: none;">
                <div class="progress progress-striped active">
                    <div class="progress-bar" id="ib_progressing" role="progressbar" data-transitiongoal="10"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

      Coming soon

        </div>


    </div>


<?php
}
}
/* {/block "content"} */
}

<?php
/* Smarty version 3.1.33, created on 2019-08-05 07:52:03
  from '/home/tourcode/public_html/billing/ui/theme/ibilling/terminal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d48186308bae7_10880973',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c2ea9f6345cc529866c8dd0467f6d38bcb7d798' => 
    array (
      0 => '/home/tourcode/public_html/billing/ui/theme/ibilling/terminal.tpl',
      1 => 1551384836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d48186308bae7_10880973 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9243618915d481863088a68_42978674', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/admin.tpl");
}
/* {block "content"} */
class Block_9243618915d481863088a68_42978674 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9243618915d481863088a68_42978674',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">

            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Terminal'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <div id="terminal">

                        <div id="output"></div>

                        <div id="command">
                            <div id="prompt">&gt;</div>
                            <input type="text" autocapitalize="off">
                        </div>

                    </div>

                </div>
            </div>



        </div>
    </div>


<?php
}
}
/* {/block "content"} */
}

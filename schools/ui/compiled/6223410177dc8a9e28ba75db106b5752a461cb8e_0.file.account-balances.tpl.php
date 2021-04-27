<?php
/* Smarty version 3.1.33, created on 2019-08-05 04:29:51
  from '/home/tourcode/public_html/billing/ui/theme/ibilling/account-balances.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d47e8ff766672_63106941',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6223410177dc8a9e28ba75db106b5752a461cb8e' => 
    array (
      0 => '/home/tourcode/public_html/billing/ui/theme/ibilling/account-balances.tpl',
      1 => 1551384838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d47e8ff766672_63106941 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15423979375d47e8ff75a250_72382409', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/admin.tpl");
}
/* {block "content"} */
class Block_15423979375d47e8ff75a250_72382409 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_15423979375d47e8ff75a250_72382409',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Financial Balances'];?>
</h5>

                </div>
                <div class="ibox-content">

                    <table class="table table-striped table-bordered">
                        <th><?php echo $_smarty_tpl->tpl_vars['_L']->value['Account'];?>
</th>
                        <th class="text-right"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Balance'];?>
</th>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['d']->value, 'ds');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ds']->value) {
?>
                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['ds']->value['account'];?>
</td>
                                <td class="text-right"><span <?php if ($_smarty_tpl->tpl_vars['ds']->value['balance'] < 0) {?>class="text-red"<?php }?>><?php echo ib_money_format($_smarty_tpl->tpl_vars['ds']->value['balance'],$_smarty_tpl->tpl_vars['_c']->value);?>
</span> </td>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                        <tr>
                            <td><strong><?php echo $_smarty_tpl->tpl_vars['_L']->value['Total'];?>
:</strong></td>
                            <td class="text-right"><strong><span <?php if ($_smarty_tpl->tpl_vars['tbal']->value < 0) {?>class="text-red"<?php }?>><?php echo $_smarty_tpl->tpl_vars['tbal']->value;?>
</span></strong></td>
                        </tr>
                    </table>

                </div>
            </div>



        </div>



    </div>


<?php
}
}
/* {/block "content"} */
}

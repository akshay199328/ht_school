<?php
/* Smarty version 3.1.33, created on 2019-08-05 03:00:21
  from '/home/tourcode/public_html/billing/ui/theme/ibilling/orders_add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d47d405bf4804_75365672',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'adfc508c6edc2c5feed41fa9b0cd9fc7b80fedfc' => 
    array (
      0 => '/home/tourcode/public_html/billing/ui/theme/ibilling/orders_add.tpl',
      1 => 1551384836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d47d405bf4804_75365672 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2351632425d47d405bdd940_07157667', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/admin.tpl");
}
/* {block "content"} */
class Block_2351632425d47d405bdd940_07157667 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2351632425d47d405bdd940_07157667',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="wrapper wrapper-content">
        <div class="row">

            <div class="col-md-8">



                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $_smarty_tpl->tpl_vars['_L']->value['Add New Order'];?>
</h5>



                    </div>
                    <div class="ibox-content" id="ibox_form">


                        <form class="form-horizontal" id="ib_form">

                            <div class="row">
                                <div class="col-md-12 col-sm-12">

                                    <div class="form-group"><label class="col-md-4 control-label" for="pid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Product_Service'];?>
</label>

                                        <div class="col-lg-8">

                                            <select id="pid" name="pid" class="form-control">
                                                <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select'];?>
...</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['p']->value, 'ps');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['ps']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['ps']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['ps']->value['name'];?>
</option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-md-4 control-label" for="cid"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Customer'];?>
 </label>

                                        <div class="col-lg-8">

                                            <select id="cid" name="cid" class="form-control">
                                                <option value=""><?php echo $_smarty_tpl->tpl_vars['_L']->value['Select'];?>
...</option>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['c']->value, 'cs');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['cs']->value) {
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['cs']->value['id'];?>
"
                                                            <?php if ($_smarty_tpl->tpl_vars['p_cid']->value == ($_smarty_tpl->tpl_vars['cs']->value['id'])) {?>selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cs']->value['account'];?>
 <?php if ($_smarty_tpl->tpl_vars['cs']->value['email'] != '') {?>- <?php echo $_smarty_tpl->tpl_vars['cs']->value['email'];
}?></option>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                            </select>

                                        </div>
                                    </div>



                                    <div class="form-group"><label class="col-md-4 control-label" for="status"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Status'];?>
</label>

                                        <div class="col-lg-8">

                                            <select id="status" name="status" class="form-control">

                                                <option value="Pending"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Pending'];?>
</option>
                                                <option value="Active"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Active'];?>
</option>


                                            </select>

                                        </div>
                                    </div>


                                    <div class="form-group"><label class="col-md-4 control-label" for="price"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Price'];?>
</label>

                                        <div class="col-lg-4 col-md-4 col-sm-8"><input type="text" id="price" name="price" class="form-control amount">

                                        </div>
                                    </div>


                                    <div class="form-group"><label class="col-md-4 control-label" for="payterm"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Billing Cycle'];?>
</label>

                                        <div class="col-lg-8">

                                            <select id="billing_cycle" name="billing_cycle" class="form-control">

                                                <option value="Free Account"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Free'];?>
</option>
                                                <option value="One Time" selected><?php echo $_smarty_tpl->tpl_vars['_L']->value['One Time'];?>
</option>
                                                <option value="week1"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Week'];?>
</option>
                                                <option value="weeks2"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Weeks_2'];?>
</option>
                                                <option value="Monthly"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Monthly'];?>
</option>
                                                <option value="Quarterly"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Quarterly'];?>
</option>
                                                <option value="Semi-Annually"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Semi-Annually'];?>
</option>
                                                <option value="Annually"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Annually'];?>
</option>
                                                <option value="Biennially"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Biennially'];?>
</option>
                                                <option value="Triennially"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Triennially'];?>
</option>

                                            </select>

                                        </div>
                                    </div>




                                    <div class="form-group"><label class="col-md-4 control-label" for="generate_invoice"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Generate Invoice'];?>
</label>

                                        <div class="col-lg-8">


                                            <input type="checkbox" checked data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="generate_invoice" name="generate_invoice" value="Yes">


                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-md-4 control-label" for="send_email"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Send Email'];?>
</label>

                                        <div class="col-lg-8">


                                            <input type="checkbox" checked data-toggle="toggle" data-size="small" data-on="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Yes'];?>
" data-off="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No'];?>
" id="send_email" name="send_email" value="Yes">


                                        </div>
                                    </div>


                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-lg-8">

                                            <button class="md-btn md-btn-primary waves-effect waves-light" type="submit" id="submit"><i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['_L']->value['Submit'];?>
</button> | <a href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
orders/list/"><?php echo $_smarty_tpl->tpl_vars['_L']->value['Or Cancel'];?>
</a>


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <input type="hidden" id="_lan_btn_save" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['Save'];?>
">

    <input type="hidden" id="_lan_no_results_found" value="<?php echo $_smarty_tpl->tpl_vars['_L']->value['No results found'];?>
">


<?php
}
}
/* {/block "content"} */
}

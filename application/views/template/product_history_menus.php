
<br />
<div class="row" style="margin-left: 2px;">


    <div class="col-lg-2">
        <input type="text" class="form-control date-picker" value="<?php echo date('m'); ?>/1/<?php echo date('Y'); ?>" />
    </div>
    <div class="col-lg-2">
        <input type="text" class="form-control date-picker" value="<?php echo date('m/d/Y'); ?>"/>
    </div>

    <div class="col-lg-3 col-lg-offset-5">
        <div class="title-action pull-right" style="margin-right: 1%;">
            <a href="Products/transaction/export-product-history?id=<?php echo $product_id; ?>" target="_blank" class="btn btn-success" style="text-transform:none;font-family: tahoma;" ><i class="fa fa-file-excel-o"></i> Export Product History to Excel </a>



        </div>
    </div>

</div>


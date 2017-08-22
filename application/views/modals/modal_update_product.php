<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Product</h3>

      <form method="POST" id="form-update-product">
        <input type="hidden" name="id" value="<?php echo $dataProduct->id; ?>">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="fa fa-pencil-square-o"></i>
          </span>
          <input type="text" class="form-control" placeholder="Product Code" name="product_code" aria-describedby="sizing-addon2" value="<?php echo $dataProduct->product_code; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="fa fa-cutlery"></i>
          </span>
          <input type="text" class="form-control" placeholder="Product Name" name="product_name" aria-describedby="sizing-addon2" value="<?php echo $dataProduct->product_name; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="fa fa-glass"></i>
          </span>
          <select name="id_category" class="form-control select1"  aria-describedby="sizing-addon1">
            <?php
            foreach ($dataCategory as $category) {
              ?>
              <option value="<?php echo $category->id; ?>" <?php if($category->id == $dataProduct->id_category){echo "selected='selected'";} ?>><?php echo $category->category_name; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="fa fa-usd"></i>
          </span>
          <input type="text" class="form-control" placeholder="Price" name="price" aria-describedby="sizing-addon2" value="<?php echo $dataProduct->price; ?>">
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon1">
            <i class="fa fa-align-justify"></i>
          </span>
          <textarea class="form-control" id="myTextarea" rows="3" placeholder="Description" name="description"><?php echo $dataProduct->description; ?></textarea>
        </div>

<script>
function myTextarea() {
    document.getElementById("myTextarea").value = "<?php echo $dataProduct->description; ?>";
}
</script>

        <!-- <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon1" value="<?php echo $dataProduct->picture; ?>">
            <i class="fa fa-picture-o"></i>
          </span>
          <input type="file" class="form-control" placeholder="Picture" name="picture" aria-describedby="sizing-addon1">
        </div> -->
        <div class="input-group form-group" style="display: inline-block;">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="glyphicon glyphicon-tag"></i>
          </span>
          <span class="input-group-addon">
              <input type="radio" name="id_publish" value="1" id="on" class="minimal" <?php if($dataProduct->id_publish == 1){echo "checked='checked'";} ?>>
          <label for="on">On</label>
            </span>
            <span class="input-group-addon">
              <input type="radio" name="id_publish" value="2" id="off" class="minimal" <?php if($dataProduct->id_publish == 2){echo "checked='checked'";} ?>> 
          <label for="off">Off</label>
            </span>
        </div>

        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Category</h3>

  <form id="form-tambah-category" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-pencil-square-o"></i>
      </span>
      <input type="text" class="form-control" placeholder="Category Code" name="category_code" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-glass"></i>
      </span>
      <input type="text" class="form-control" placeholder="Category Name" name="category_name" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="sizing-addon1">
      <i class="fa fa-power-off"></i>
      </span>
      <span class="input-group-addon">
          <input type="radio" name="id_publish" value="1" id="on" class="minimal">
      <label for="on">On</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="id_publish" value="2" id="off" class="minimal"> 
      <label for="off">Off</label>
        </span>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>

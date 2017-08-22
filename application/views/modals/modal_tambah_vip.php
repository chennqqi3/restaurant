<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Vip</h3>

  <form id="form-tambah-vip" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-pencil-square-o"></i>
      </span>
      <input type="text" class="form-control" placeholder="Code Vip" name="code" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-address-card"></i>
      </span>
      <input type="text" class="form-control" placeholder="Name Vip" name="name" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-phone"></i>
      </span>
      <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-envelope"></i>
      </span>
      <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-calendar"></i>
      </span>
<style>
.datepicker{z-index:1151;}
</style>
      <input type="text" id="datepicker" class="form-control" placeholder="YYYY/MM/DD" name="expired" aria-describedby="sizing-addon2">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>
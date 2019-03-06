<div class="row">
    <div class="col-lg-12">           
        <h2>Products CRUD           
            <div class="pull-right">
               <a class="btn btn-primary" href="<?php echo base_url('product/create') ?>"> Create New Product</a>
            </div>
        </h2>
     </div>
</div>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $d) { ?>      
      <tr>
        <td><?php echo $d->title; ?></td>
        <td><?php echo $d->description; ?></td>          
        <td>
          <a class="btn btn-info" href="<?php echo base_url('product/edit/'.$d->id) ?>"> Edit</a>
          <a class="btn btn-danger" href="<?php echo base_url('product/delete/'.$d->id) ?>"> Delete</a>
        </td>     
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
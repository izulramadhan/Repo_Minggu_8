<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view("admin/_partials/head.php") ?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" >

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php $this->load->view("admin/_partials/topbar.php") ?>
        <!-- End of Topbar -->

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Price</th>
										<th>Photo</th>
										<th>Description</th>
										<th>Tanggal</th>
										<th>User</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($aktifitas as $aktifitas): ?>
									<tr>
										<td width="150">
											<?php echo $aktifitas->name ?>
										</td>
										<td>
											<?php echo $aktifitas->price ?>
										</td>
										<td>
											<img src="<?php echo base_url('gambar/'.$aktifitas->image) ?>" width="64" />
										</td>
										<td class="small">
											<?php echo substr($aktifitas->description, 0, 120) ?>...</td>
											<td>
											<?php echo $aktifitas->tgl_hapus ?>
										</td>
										<td>
											<?php echo $aktifitas->user ?>
										</td>
										<td>
											<?php echo "Dihapus" ?>
										</td>
										<td width="250">
											<a onclick="deleteConfirm('<?php echo base_url('admin/aktifitas/delete/'.$aktifitas->product_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php $this->load->view("admin/_partials/scrolltop.php") ?>

  <!-- Logout Modal-->
  <?php $this->load->view("admin/_partials/modal.php") ?>

  <!-- Javascript-->
  <?php $this->load->view("admin/_partials/js.php") ?>

  <script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>
</body>

</html>
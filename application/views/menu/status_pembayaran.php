<?php if ($this->session->flashdata('flash')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Status pembayaran
                <strong>berhasil</strong>
                <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($user_pembayaran as $l) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $l['nama']; ?></td>
                            <td><?= $l['email']; ?></td>
                            <td><?= date('d F Y', $l['tanggal']); ?></td>
                            <td><?= $l['status']; ?></td>
                            <td>
                                <a onclick="sudahBayar()" class="btn btn-success btn-circle">
                                    ACC
                                </a>
                                <a href="<?= base_url(); ?>Menu/edit_pembayaran/<?= $l['id']; ?>" class="btn btn-warning btn-circle">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </a>
                                <a href="<?= base_url(); ?>Menu/hapus_user/<?= $l['id']; ?>" class="btn btn-danger btn-circle" onclick="return confirm('Apa anda yakin?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function sudahBayar() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Apa kamu yakin?',
            text: "Memberikan akses undangan kepada user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Berikan Akses',
            cancelButtonText: 'Kembali',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Berhasil!',
                    'Akses undangan berhasil diberikan kepada user.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Kembali',
                    'Akses tidak diberikan kepada user :)',
                    'error'
                )
            }
        })
    }
</script>